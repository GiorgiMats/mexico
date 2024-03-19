<?php
session_start();
require 'functions.php';

if (!isset($_SESSION['token'], $_SESSION['customerUuid'])) {
    die("Customer data is not set. Please submit customer data first.");
}

// $leadData = [
//     // Populate this array with data collected from the lead form
//     "loan_sum" => $_POST['loan_sum'],
//     "loan_period" => $_POST['loan_period'],
//     // Add other fields as needed
// ];

$leadData = [
    'loan_sum' => $_POST['loan_sum'] ?? '',
    'loan_period' => $_POST['loan_period'] ?? '',
    'ip_address' => $_POST['ip_address'] ?? '',
    'loan_purpose' => $_POST['loan_purpose'] ?? '',
    'customer' => [
        'agreements' => [
            'terms_of_service' => 1,
            'data_proccessing_policy' => 1,
        ],
    ],
];

$customerUuid = $_SESSION['customerUuid'];
$token = $_SESSION['token'];

$responseData = forwardLeadData($leadData, $customerUuid, $token);
if (isset($responseData['uuid'])) {
    // Success, redirect or inform the user
    $leadUuid = $responseData['uuid'];
    header("Location: https://www.credy.com.mx/loading/?lead={$leadUuid}");
} else {
    echo "Failed to submit lead data";
}