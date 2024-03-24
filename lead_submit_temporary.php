<?php 
// lead_submit_temporary.php
session_start();
function getUserIpAddress() {
  if(!empty($_SERVER['HTTP_CLIENT_IP'])) {   
    return $_SERVER['HTTP_CLIENT_IP'];   
}   
//if user is from the proxy   
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   
    return $_SERVER['HTTP_X_FORWARDED_FOR'];   
}   
//if user is from the remote address   
else{   
    return $_SERVER['REMOTE_ADDR'];   
} 
}



// Assuming you have a form that submits to this script for lead data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Store the submitted lead data in the session temporarily
    $_SESSION['leadData'] = [
        'loan_sum' => $_POST['loan_sum'] ?? 0,
        'loan_period' => $_POST['loan_period'] ?? 0,
        'ip_address' => getUserIpAddress(),
        'loan_purpose' => $_POST['loan_purpose'] ?? '',
        'terms_of_service' => 'on',
        'data_proccessing_policy' => 'on',
    ];

    // Redirect to the customer data form
    header('Location: registro-prestamo#datos-personales');
    exit;
}