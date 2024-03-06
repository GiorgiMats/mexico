<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form id="customers-form" action="send_customer.php" method="post">
    <label for="first_name">Nombre</label>
        <input type="text" name="first_name" id="first_name" required maxlength="255" onfocusout="validateInput('first_name')">
        <label for="last_name">Apellido</label>
        <input type="text" name="last_name" id="last_name" onfocusout="validateInput('last_name')" required>
        <label for="second_last_name">Segundo apellido</label>
        <input type="text" name="second_last_name" id="second_last_name" onfocusout="validateInput('second_last_name')" required maxlength="255">

        <label for="birth_date">birth_date</label>
        <div class="date-flex">
            <p>
              <select class="form-input date-select" onclick="checkForInput('dateDay')" id="dateDay"
                name="birth_day" required>
                <option value="" disabled selected>Día</option>
              </select>
            </p>
            <p>
              <select class="form-input date-select" id="dateMonth" onclick="checkForInput('dateMonth')"
                name="birth_month" required>
                <option value="" disabled selected>Mes</option>
              </select>
            </p>
            <p>
              <select class="form-input date-select" id="dateYear" onclick="checkForInput('dateYear')"
                name="birth_year" required>
                <option value="" disabled selected>Año</option>
              </select>
            </p>
          </div>

        <div class="gender-div">
            <span>Genero</span>
            <label for="male">Male:</label>
            <input type="radio" id="male" name="gender" value="MALE">
            <br>
            <label for="female">Female:</label>
            <input type="radio" id="female" name="gender" value="FEMALE">
        </div>
        <label for="personal_id">personal id</label>
        <input type="text" onfocusout="validateInput('personal_id')" name="personal_id" id="personal_id" pattern="^[A-Z]{1}[AEIOUX]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$">
        
        <label for="tax_id_number">tax id number</label>
        <input type="text" name="tax_id_number" id="tax_id_number" onfocusout="validateInput('tax_id_number')" required pattern="^[A-Z]{1}[AEIOUX]{1}[A-Z]{2}[0-9]{2}(?:0[1-9]|1[0-2])(?:0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Za-z0-9]{3}$">

        <label for="marital_status">marital status</label>
        <select name="marital_status" id="marital_status">
            <option value="disabled">select ones</option>
            <option value="SINGLE">SINGLE</option>
            <option value="MARRIED">MARRIED</option>
            <option value="DIVORCED">DIVORCED</option>
            <option value="WITH_PARTNER">WITH_PARTNER</option>
            <option value="WIDOW">WIDOW</option>
        </select>

        <label for="bank_account">bank account</label>
        <input type="number" name="bank_account" id="bank_account" onfocusout="validateInput('bank_account')" minlength="18" maxlength="18">

        <label for="nationality">nationality</label>
        <select name="nationality" id="nationality">
            <option value="ES">ES</option>
            <option value="MX">MX</option>
            <option value="AL">AL</option>
            <option value="AR">AR</option>
            <option value="BR">BR</option>
            <option value="BU">BU</option>
            <option value="RU">RU</option>
        </select>

        <label for="dependant_count">dependant count</label>
        <select name="dependant_count" id="dependant_count">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>

        <label for="email">email</label>

        <input type="email" class="form-input" onfocusout="validateInput('email')" id="email" name="email"
                  maxlength="40" required />

        <label for="phone">phone</label>
        <input type="tel" class="form-input tel-padding" id="phone" name="phone" maxlength="13" required />

        <label for="phone_plan">phone plan</label>
        <select name="phone_plan" id="phone_plan">
           <option value=" PREPAID">PREPAID</option>
           <option value=" CONTRACT">CONTRACT</option> 
        </select>
        <div class="adress-div">
        <h2>adress</h2>
        <label for="postal_code">postal_code</label>
        <input type="text" name="postal_code" onfocusout="validateInput('postal_code')" id="postal_code" pattern="^[0-9]{5}$" required maxlength="45">
        <label for="city">city</label>
        <input type="text" name="city" onfocusout="validateInput('city')" id="city" maxlength="45">
        <label for="street">street</label>
        <input type="text" name="street" onfocusout="validateInput('street')" id="street" maxlength="45">
        <label for="house_number">house_number</label>
        <input type="text" name="house_number" onfocusout="validateInput('house_number')" id="house_number" maxlength="45">
        <label for="region">region</label>
        <input type="text" name="region" id="region" maxlength="45">
        <label for="county">city</label>
        <input type="text" name="county" id="county" maxlength="45">
        <label for="district">district</label>
        <input type="text" name="district" id="district" maxlength="45">
    </div>


    <label for="housing_type">housing type</label>
    <select name="housing_type" id="housing_type">
        <option value="disabled">disabled</option>
        <option value="RENTED_ROOM">RENTED_ROOM</option>
        <option value="RENTED_APARTMENT_OR_HOUSE">APARTMENT_OR_HOUSE</option>
        <option value="OWN_HOUSE_OR_APARTMENT">OWN_HOUSE_OR_APARTMENT</option>
        <option value="WITH_PARENTS">WITH_PARENTS</option>
    </select>

    <label for="occupation">occupation</label>
    <select name="occupation" id="occupation">
        <option value="disabled">disabled</option>
        <option value="EMPLOYED_INDEFINITE_PERIOD">EMPLOYED_INDEFINITE_PERIOD</option>
        <option value="SELF_EMPLOYED">SELF_EMPLOYED</option>
        <option value="PENSIONER1">PENSIONER1</option>
        <option value="STUDENT">STUDENT</option>
        <option value="UNEMPLOYED">UNEMPLOYED</option>
        <option value="FREELANCER">FREELANCER</option>
        <option value="OWN_BUSINESS">OWN_BUSINESS</option>
        <option value="MATERNITY_LEAVE">MATERNITY_LEAVE</option>
    </select>

      <label for="neto_income">neto_income</label>
      <input type="text" name="neto_income" id="neto_income">
    <label for="remuneration_deadline">remuneration deadline</label>
      <input type="text" id="remuneration_deadline" onfocusout="validateInput('remuneration_deadline')" name="remuneration_deadline" pattern="^([12][0-9]{3}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01]))$">
    <label for=""></label>

    <label for="credit_score">credit score</label>
    <select name="credit_score" id="credit_score">

        <option value="EXCELLENT_700_TO_850">EXCELLENT_700_TO_850</option>
        <option value="GOOD_650_TO_700">GOOD_650_TO_700</option>
        <option value="STABLE_550_TO_650">STABLE_550_TO_650</option>
        <option value="LOW_300_TO_550">LOW_300_TO_550</option>
        <option value="DONT_KNOW">DONT_KNOW</option>
        <option value="NO_CREDIT_HISTORY">NO_CREDIT_HISTORY</option>
    </select>

    <label for="has_loan">has loan</label>
        <select name="has_loan" id="has_loan">
            <option value="yes">yes</option>
            <option value="no">no</option>
        </select>
    </select>

    <label for="car">car</label>
    <select name="car" id="car">
        <option value="yes">yes</option>
        <option value="no">no</option>
    </select>
</select>
    <label for="policy">policy</label>
    <input type="checkbox" name="policy" id="policy">
    <label for="terms">terms</label>
    <input type="checkbox" name="terms" id="terms">

        <button type="button" onclick="validateForm('customers-form')">Submit</button>
    </form>

    <script src="./scripts.js"></script>
    <script src="./dates.js"></script>
</body>
</html>
