<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Lead Data</title>
</head>
<body>
    <form action="lead_submit.php" method="post">
    <label for="loan_purpose">loan_purpose</label>
        <select name="loan_purpose" id="loan_purpose">
            <option value="disabled">disabled</option>
            <option value="PURCHASE_OF_FOOD">PURCHASE_OF_FOOD</option>
            <option value="BUYING_ELECTRONICS">BUYING_ELECTRONICS</option>
            <option value="CREATE_CREDIT_HISTORY">CREATE_CREDIT_HISTORY</option>
            <option value="SCHOOL_EXPENSES">SCHOOL_EXPENSES</option>
            <option value="UNFORESEEN_EXPENSE">UNFORESEEN_EXPENSE</option>
            <option value="MEDICAL_EXPENSES">MEDICAL_EXPENSES</option>
            <option value="MAINTENANCE_OR_REPAIR_OF_HOUSE">MAINTENANCE_OR_REPAIR_OF_HOUSE</option>
            <option value="PAY_ANOTHER_LOAN">PAY_ANOTHER_LOAN</option>
            <option value="PAYMENT_OF_SERVICES">PAYMENT_OF_SERVICES</option>
            <option value="FOR_MY_BUSINESS">FOR_MY_BUSINESS</option>
            <option value="TRAVEL">TRAVEL</option>
            <option value="OTHER">OTHER</option>
        </select>
        <!-- Include input fields for lead data here -->
        <input type="number" name="loan_sum" placeholder="Loan Sum" required>
        <input type="number" name="loan_period" placeholder="Loan Period" required>
        <!-- Add other fields as needed -->
        <button type="submit">Submit Lead</button>
    </form>
</body>
</html>
