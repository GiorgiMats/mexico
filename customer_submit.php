<?php
session_start();
require 'functions.php';

$customerData = [
  "first_name"=> "Enos",
  "second_first_name"=> "Augurio",
  "last_name"=> "Leones",
  "second_last_name"=> "Liz",
  "gender"=> "MALE",
  "birth_date"=> "1989-05-23",
  "personal_id"=> "JECS660715MNERNN73",
  "tax_id_number"=> "CACX030424GKY",
  "marital_status"=> "MARRIED",
  "bank_account"=> "032180000118359719",
  "nationality"=> "MX",
  "dependant_count"=> 0,
  "bad_credit_history"=> true,
  "email"=> "martelle.judit@mailinator.com",
  "phone"=> "+52 871 253 7087",
  "phone_plan"=> "PREPAID",
  "address" => [
    "postal_code"=> "38627",
    "city"=> "La Camella",
    "street"=> "Ruela Armenta",
    "house_number"=> "1",
    "flat_number"=> 4,
    "region"=> "Customer region",
    "county"=> "Customer county",
    "district"=> "Customer district",
    "colony"=> "Customer colony"
  ],
  "housing_type"=> "RENTED_ROOM",
  "occupation"=> "EMPLOYED_INDEFINITE_PERIOD",
  "neto_income"=> 1500,
  "monthly_expenses"=> 900,
  "remuneration_deadline"=> "2024-04-05",
  "employed_since"=> "2021-02-18",
  "employer"=> "Carrera PLC",
  "credit_score"=> "EXCELLENT_700_TO_850",
  "has_loan"=> true,
  "debt_amount"=> 1000,
  "has_credit_card"=> true,
  "car"=> "YES",
  "agreements" => [
    "terms_of_service"=> true,
    "data_proccessing_policy"=> true
    ]
];

$token = fetchBearerToken($tokenUrl, $clientID, $clientSecret);
if ($token === null) {
    die("Error fetching token");
}

$responseData = forwardCustomerData($customerData, $token);
if (isset($responseData['uuid'])) {
    $_SESSION['token'] = $token;
    $_SESSION['customerUuid'] = $responseData['uuid'];
    header('Location: lead_form.php'); // Redirect to the lead form page
} else {
    echo "Failed to submit customer data";
}
