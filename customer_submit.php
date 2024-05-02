
<!DOCTYPE html>
<html lang="en">
<head>

 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-566HVSSQ');</script>
<!-- End Google Tag Manager --> 


</head>
<body>
   <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-566HVSSQ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->  
</body>
</html>


<?php
session_start();
require 'functions.php';

// Assuming $customerData is collected from the customer form submission
$token = fetchBearerToken($tokenUrl, $clientID, $clientSecret);
if ($token === null) {
    echo json_encode(['error' => 'Failed to fetch bearer token']);
    exit;
}
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
      'data_proccessing_policy' => true,
      'terms_of_service' => true,  
  ],
];
// Submit customer data
$responseData = forwardCustomerData($customerData, $token);
if (!isset($responseData['uuid'])) {
    echo var_dump($responseData);
    echo "Failed to submit customer data";
    exit;
}

$customerUuid = $responseData['uuid'];
// Check if there's stored lead data in the session
if (isset($_SESSION['leadData'])) {
    $leadData = $_SESSION['leadData']; // Retrieve lead data
    // var_dump($leadData);

    // Modify $leadData as necessary to match the API expectations

    // Submit lead data using the customer UUID
    $leadResponse = forwardLeadData($leadData, $customerUuid, $token);
    echo "leadResponse: " . var_dump($leadResponse);
    if (!isset($leadResponse['uuid'])) {
        echo "Failed to submit lead data";
        exit;
    }

    // Lead data submitted successfully, proceed as necessary
    echo "Customer and lead data submitted successfully.";

    // Clear the stored lead data from the session
    unset($_SESSION['leadData']);
} else {
    echo "Lead data not found in session.";
}