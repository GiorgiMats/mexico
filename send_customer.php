<?php
// Specify the header for JSON response
header('Content-Type: application/json');

// Prevent CORS errors by allowing all origins (Consider tightening this for production)
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, OPTIONS");

// Handle pre-flight requests for CORS
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit; // Just exit with 200 OK and the above headers for pre-flight requests
}

$tokenUrl = "https://api.staging.credy.eu/v3/token";
$clientID = "mx_digital_way"; // Replace with your actual client ID
$clientSecret = "5dc6f804-c9f7-4ca7-8021-91bc9bbf308a"; // Replace with your actual client secret

// Fetch the bearer token from the /v3/token endpoint
function fetchBearerToken($url, $clientID, $clientSecret) {
    $data = array(
        'grant_type' => 'client_credentials',
        'client_id' => $clientID,
        'client_secret' => $clientSecret,
    );

    $options = array(
        'http' => array(
            'header' => "Content-Type: application/x-www-form-urlencoded",
            'method' => 'GET',
            'content' => http_build_query($data),
        ),
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        return null; // Handle error appropriately
    }

    $response = json_decode($result, true);
    return $response['access_token'] ?? null;
}

function forwardCustomerData($customerData, $token) {
    $url = "https://api.staging.credy.eu/v3/customers";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($customerData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "Authorization: Bearer {$token}",
    ]);

    $result = curl_exec($ch);
    $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($result === FALSE || $httpStatusCode >= 400) {
        // cURL error or server returned an error status
        $error = curl_error($ch);
        $response = $result ? $result : $error; // If there's a result, it's the error body; otherwise, use curl error
        curl_close($ch);
        return [
            'error' => true,
            'http_status' => $httpStatusCode,
            'message' => 'Request failed',
            'response' => json_decode($response, true) // Attempt to decode JSON response, if any
        ];
    }

    curl_close($ch);
    return json_decode($result, true); // Decode JSON response
}

function forwardLeadData($leadData, $customerUuid, $token) {
    $url = "https://api.staging.credy.eu/v3/leads?customer={$customerUuid}";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($leadData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "Authorization: Bearer {$token}",
        // "Customer: {$customerUuid}",
        // "Accept-Language: es-MX" // Set language for error messages, adjust as needed
    ]);

    $result = curl_exec($ch);
    $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($result === FALSE || $httpStatusCode >= 400) {
        // Handle HTTP error status
        $error = curl_error($ch);
        $response = $result ? $result : $error;
        curl_close($ch);
        return [
            'error' => true,
            'http_status' => $httpStatusCode,
            'message' => 'Lead submission failed',
            'response' => json_decode($response, true)
        ];
    }
    
    curl_close($ch);
    return json_decode($result, true); // Decode JSON response
}


$token = fetchBearerToken($tokenUrl,$clientID,$clientSecret);
if ($token === null) {
    echo json_encode(['error' => 'Failed to fetch bearer token']);
    exit;
}

// Assuming form data is sent via POST and you're expecting specific fields
$customerData = [
    'first_name' => $_POST['first_name'] ?? '',
    'last_name' => $_POST['last_name'] ?? '',
    'second_last_name' => $_POST['second_last_name'] ?? '',
    'gender' => $_POST['gender'] ?? '',
    'birth_date' => $_POST['birth_date'] ?? '',
    'personal_id' => $_POST['personal_id'] ?? '',
    'tax_id_number' => $_POST['tax_id_number'] ?? '',
    'marital_status' => $_POST['marital_status'] ?? '',
    'bank_account' => $_POST['bank_account'] ?? '',
    'nationality' => $_POST['nationality'] ?? '',
    'dependant_count' => $_POST['dependant_count'] ?? '',
    'email' => $_POST['email'] ?? '',
    'phone' => $_POST['phone'] ?? '',
    'phone_plan' => $_POST['phone_plan'] ?? '',
    'address' => [
        'postal_code' => $_POST['postal_code'] ?? '',
        'city' => $_POST['city'] ?? '',
        'street' => $_POST['street'] ?? '',
        'house_number' => $_POST['house_number'] ?? '',
        'region' => $_POST['region'] ?? '',
        'county' => $_POST['county'] ?? '',
        'district' => $_POST['district'] ?? '',
        'colony' => $_POST['colony'] ?? '',
        'postal_index' => $_POST['postal_index'] ?? '',
    ],
    'housing_type' => $_POST['housing_type'] ?? '',
    'occupation' => $_POST['occupation'] ?? '',
    'neto_income' => $_POST['neto_income'] ?? '',
    'remuneration_deadline' => $_POST['remuneration_deadline'] ?? '',
    'employed_since' => $_GET['employed_since'] ?? '',
    'employer' => $_POST['employer'] ?? '',
    'credit_score' => $_POST['credit_score'] ?? '',
    'has_loan' => $_POST['has_loan'] ?? '',
    'debt_amount' => $_POST['debt_amount'] ?? '',
    'car' => $_POST['car'] ?? '',
    'agreements' => [
        'data_proccessing_policy' => $_POST['policy'] ?? '',
        'terms_of_service' => $_POST['terms'] ?? '',  
    ],
];

$responseData = forwardCustomerData($customerData, $token);
// Sample lead data, replace with actual data as needed
$leadData = [
    'loan_sum' => $_POST['loan_sum'] ?? '',
    'loan_period' => $_POST['loan_period'] ?? '',
    'ip_address' => $_POST['ip_address'] ?? '',
    'loan_purpose' => $_POST['loan_purpose'] ?? '',
];

// $customerDataTest = [
//     "first_name"=> "Enos",
//     "second_first_name"=> "Augurio",
//     "last_name"=> "Leones",
//     "second_last_name"=> "Liz",
//     "gender"=> "MALE",
//     "birth_date"=> "1989-05-23",
//     "personal_id"=> "JECS660715MNERNN73",
//     "tax_id_number"=> "CACX030424GKY",
//     "marital_status"=> "MARRIED",
//     "bank_account"=> "032180000118359719",
//     "nationality"=> "MX",
//     "dependant_count"=> 0,
//     "bad_credit_history"=> true,
//     "email"=> "martelle.judit@mailinator.com",
//     "phone"=> "+52 871 253 7087",
//     "phone_plan"=> "PREPAID",
//     "address" => [
//       "postal_code"=> "38627",
//       "city"=> "La Camella",
//       "street"=> "Ruela Armenta",
//       "house_number"=> "1",
//       "flat_number"=> 4,
//       "region"=> "Customer region",
//       "county"=> "Customer county",
//       "district"=> "Customer district",
//       "colony"=> "Customer colony"
//     ],
//     "housing_type"=> "RENTED_ROOM",
//     "occupation"=> "EMPLOYED_INDEFINITE_PERIOD",
//     "neto_income"=> 1500,
//     "monthly_expenses"=> 900,
//     "remuneration_deadline"=> "2024-04-05",
//     "employed_since"=> "2021-02-18",
//     "employer"=> "Carrera PLC",
//     "credit_score"=> "EXCELLENT_700_TO_850",
//     "has_loan"=> true,
//     "debt_amount"=> 1000,
//     "has_credit_card"=> true,
//     "car"=> "YES",
//     "agreements" => [
//       "terms_of_service"=> true,
//       "data_proccessing_policy"=> true
//       ]
// ];

// Assuming $responseData contains the customer data response from the previous step
if (!isset($responseData['error'])) {
    $customerUuid = $responseData['uuid']; // Extract the customer uuid from the response
    $leadResponse = forwardLeadData($leadData, $customerUuid, $token);

    if (isset($leadResponse['uuid'])) {
        $leadUuid = $leadResponse['uuid'];
        echo "leadUuid " . $leadUuid;
        // Redirect the customer to your page with the leadUuid in the URL
        // header("Location: https://yourpage.com/some-path?uuid={$leadUuid}");
        // exit;
    } else {
        echo json_encode(['error' => 'Failed to submit lead data', 'details' => $leadResponse]);
    }
} else {
    echo json_encode(['error' => 'Failed to process customer data', 'details' => $responseData]);
}

// Check for errors or handle the response appropriately
if ($responseData === null) {
    echo json_encode(['error' => 'Failed to forward customer data']);
} 
// else {
//     echo json_encode($responseData);
// }