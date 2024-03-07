<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<!-- <link rel="stylesheet" href="styles.css"> -->
<link rel="stylesheet" href="form-styles.css">

<body>
    <form id="regForm"
        action="https://credito-mx.us14.list-manage.com/subscribe/post?u=e505c1e791200be2cadfb7a4b&id=b4bfe9aaf7&f_id=003d9de0f0"
        method="POST" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate">
        <h1>Register:</h1>
        <!-- One "tab" for each step in the form: -->
        <div class="tab">
            <h2>How much money do you need?</h2>
            <div class="form-heading-wrapper">
                <p>I want to receive:</p>
                <div class="money-value-new">
                    <span>2000</span>
                    <p class="credit-p2">$</p>
                </div>
            </div>
            <p><input class="range-input" type="range" min="0" max="10000000" value="100000" step="100000" /></p>
        </div>
        <div class="tab">
            <h2>What is the purpose of your loan?</h2>
            <div class="custom-select">
                <select id="mySelect" required>
                    <option value="Seleccione uno" class="select-one">Seleccione uno</option>
                    <option value="Pagar deudas de tarjeta de crédito" class="option-hover">Pagar deudas de tarjeta de
                        crédito</option>
                    <option value="Consolidar prestamos existentes" class="option-hover">Consolidar prestamos existentes
                    </option>
                    <option value="Gastos médicos" class="option-hover">Gastos médicos</option>
                    <option value="Reparar el coche" class="option-hover">Reparar el coche</option>
                    <option value="Pago de alquiler" class="option-hover">Pago de alquiler</option>
                    <option value="Reparar el hogar" class="option-hover">Reparar el hogar</option>
                    <option value="Viajes ,vacaciones" class="option-hover">Viajes ,vacaciones</option>
                    <option value="Otro" class="option-hover">Otro</option>
                </select>
            </div>
        </div>
        <div class="tab">
            <h2>Please provide us with your contact number</h2>
            <p><input type="tel" class="form-input" id="phone" name="PHONE" placeholder="999 99 99 99" maxlength="10"
                    required /></p>
        </div>
        <div class="tab">
            <h2>Please provide us with your email address</h2>
            <p><input type="email" class="form-input" id="mail" name="EMAIL" placeholder="primer@gmail.com"
                    maxlength="40" required /></p>
        </div>
        <div class="tab">
            <h2>Full Name</h2>
            <p><input placeholder="First name..." oninput="this.className = ''" name="FNAME"></p>
            <p><input placeholder="Last name..." oninput="this.className = ''" name="LNAME"></p>
        </div>
        <div class="tab">
            <h2>Which Gender are you?</h2>
            <p><input type="radio" value="woman" name="gender" onclick="nextPrev(1)"></p>
            <p><input type="radio" value="man" name="gender" onclick="nextPrev(1)"></p>
        </div>
        <div class="tab">
            <h2>Your Birthdate</h2>
            <p><input placeholder="dd" oninput="this.className = ''" name="MMERGE3[day]"></p>
            <p><input placeholder="mm" oninput="this.className = ''" name="MMERGE3[month]"></p>
            <p><input placeholder="yyyy" oninput="this.className = ''" name="MMERGE3[year]"></p>
        </div>
        <div class="tab">
            <h2>Click</h2>
            <p>By clicking on this section, you agree to the terms of the agreement. Processing of personal data</p>
        </div>
        <div>
            <div>
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>
  





    <script src="scripts.js"></script>
    <script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script>
    <script
        type="text/javascript">(function ($) { window.fnames = new Array(); window.ftypes = new Array(); fnames[0] = 'EMAIL'; ftypes[0] = 'email'; fnames[1] = 'FNAME'; ftypes[1] = 'text'; fnames[2] = 'LNAME'; ftypes[2] = 'text'; fnames[4] = 'PHONE'; ftypes[4] = 'phone'; fnames[3] = 'MMERGE3'; ftypes[3] = 'date'; fnames[5] = 'MMERGE5'; ftypes[5] = 'dropdown'; }(jQuery)); var $mcj = jQuery.noConflict(true);</script>

</body>

</html>