<?php
$tokenUrl = "https://api.staging.credy.eu/v3/token";
$clientID = "mx_digital_way";
$clientSecret = "5dc6f804-c9f7-4ca7-8021-91bc9bbf308a";

function fetchBearerToken($url, $clientID, $clientSecret) {
    $data = [
        'grant_type' => 'client_credentials',
        'client_id' => $clientID,
        'client_secret' => $clientSecret,
    ];

    $options = [
        'http' => [
            'header' => "Content-Type: application/x-www-form-urlencoded",
            'method' => 'POST', // Make sure this is POST
            'content' => http_build_query($data),
        ],
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        return null;
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
    if ($result === FALSE) {
        curl_close($ch);
        return ['error' => true, 'message' => 'Failed to submit customer data'];
    }

    curl_close($ch);
    return json_decode($result, true);
}

function forwardLeadData($leadData, $customerUuid, $token) {
    echo "customerUuid: " . $customerUuid;
    echo "  ";
    echo "token: " . $token;
    echo "  ";
    var_dump($leadData);
    $url = "https://api.staging.credy.eu/v3/leads?customer={$customerUuid}";
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($leadData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "Authorization: Bearer {$token}",
    ]);

    $result = curl_exec($ch);
    $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($result === FALSE || $httpStatusCode >= 400) {
        $errorResponse = curl_error($ch);
        $response = $result ? json_decode($result, true) : ['curl_error' => $errorResponse];
        curl_close($ch);
        return ['error' => true, 'message' => 'Failed to submit lead data', 'details' => $response];
    }

    curl_close($ch);
    return json_decode($result, true);
}