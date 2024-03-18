<?php
$tokenUrl = "https://api.credy.eu/v3/token";
$clientID = "mx_digital_way";
$clientSecret = "9dcc9308-9036-4412-b44e-13253b811137";

function fetchBearerToken($url, $clientID, $clientSecret) {
    $data = [
        'grant_type' => 'client_credentials',
        'client_id' => $clientID,
        'client_secret' => $clientSecret,
    ];

    $options = [
        'http' => [
            'header' => "Content-Type: application/x-www-form-urlencoded",
            'method' => 'POST',
            'content' => http_build_query($data),
        ],
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        return ['error' => true, 'message' => 'Failed to fetch token'];
    }

    $response = json_decode($result, true);
    return $response['access_token'] ?? ['error' => true, 'message' => 'Token not found in response'];
}

function forwardCustomerData($customerData, $token) {
    $url = "https://api.credy.eu/v3/customers";
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
        $errorResponse = curl_error($ch);
        curl_close($ch);
        return ['error' => true, 'message' => 'Failed to submit customer data', 'details' => $errorResponse];
    }

    curl_close($ch);
    return json_decode($result, true);
}

function forwardLeadData($leadData, $customerUuid, $token) {
    $url = "https://api.credy.eu/v3/leads?customer={$customerUuid}";
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

    $leadResponse = json_decode($result, true);
    $leadUuid = $leadResponse['uuid'] ?? null;

    curl_close($ch);

    if ($leadUuid) {
        // Redirect user to the specified URL with the lead UUID
        $redirectUrl = "https://www.credy.com.mx/loading/?lead={$leadUuid}";
        header("Location: $redirectUrl");
        exit;
    }

    return ['error' => true, 'message' => 'Lead UUID not found in response'];
}