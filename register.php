<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Form</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="register-styles.css">
</head>

<body>

    <header class="header">
        <div class="header-container">
            <a href="#">
                <img src="img/main-logo.svg" alt="" class="logo">
            </a>


    </header>


    <div class="form-container">
        <form id="customers-form" action="send_customer.php" method="post">
            <!-- first-step -->
            <div class="steps-div" id="first-one">
                <h1 class="register-h1">First step 1/3</h1>
                <h2 class="register-h2">Personal information</h2>
                <div class="first-step">
                    <div class="first-name margin-div">
                        <label for="first_name">Nombre</label>
                        <input type="text" name="first_name" id="first_name" required maxlength="255"
                            onfocusout="validateInput('first_name')" placeholder="Enter name">
                    </div>

                    <div class="last-name margin-div">
                        <label for="last_name">Apellido</label>
                        <input type="text" name="last_name" id="last_name" onfocusout="validateInput('last_name')"
                            required placeholder="Enter name">
                    </div>

                    <div class="second-lastname margin-div">
                        <label for="second_last_name">Segundo apellido</label>
                        <input type="text" name="second_last_name" id="second_last_name"
                            onfocusout="validateInput('second_last_name')" required maxlength="255"
                            placeholder="Enter name">
                    </div>
                </div>


                <div class="flex-div">

                    <div class="margin-div">


                        <label for="birth_date">birth_date</label>
                        <div class="date-flex">
                            <p>
                                <select class="form-input date-select" onclick="checkForInput('dateDay')" id="dateDay"
                                    name="birth_day" required>
                                    <option value="" disabled selected>Día</option>
                                </select>
                            </p>
                            <p>
                                <select class="form-input date-select" id="dateMonth"
                                    onclick="checkForInput('dateMonth')" name="birth_month" required>
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

                    </div>


                    <div class="margin-div">
                        <span>Genero</span>

                        <div class="gender-div">
                            <div class="male-div">
                                <input type="radio" id="male" name="gender" value="MALE">
                                <label for="male">Male</label>
                            </div>

                            <div class="female-div">
                                <input type="radio" id="female" name="gender" value="FEMALE">
                                <label for="female">Female</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="first-step">
                    <div class="margin-div">
                        <label for="personal_id">personal id</label>
                        <input type="text" onfocusout="validateInput('personal_id')" name="personal_id" id="personal_id"
                            pattern="^[A-Z]{1}[AEIOUX]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$"
                            placeholder="Enter name">

                    </div>


                    <div class="margin-div">

                        <label for="tax_id_number">tax id number</label>
                        <input type="text" name="tax_id_number" id="tax_id_number"
                            onfocusout="validateInput('tax_id_number')" required
                            pattern="^[A-Z]{1}[AEIOUX]{1}[A-Z]{2}[0-9]{2}(?:0[1-9]|1[0-2])(?:0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Za-z0-9]{3}$"
                            placeholder="Enter name">

                    </div>

                    <div class="margin-div">

                        <label for="marital_status">marital status</label>


                        <div class="custom-select">
                            <select id="marital_status" name="rmarital_status" required>
                                <option onclick="removeSelectRed('select-selected')" value="Seleccione uno"
                                    class="select-one" id="select-one">
                                    Seleccione uno</option>
                                <option onclick="removeSelectRed('select-selected')" value="SINGLE"
                                    class="option-hover">single</option>
                                <option onclick="removeSelectRed('select-selected')" value="MARRIED"
                                    class="option-hover">Consolidar prestamos existentes
                                </option>
                                <option onclick="removeSelectRed('select-selected')" value="DIVORCED">
                                    single</option>
                                <option onclick="removeSelectRed('select-selected')" value="WITH_PARTNER"
                                    class="option-hover">
                                    Reparar el coche</option>
                                <option onclick="removeSelectRed('select-selected')" value="WIDOW" class="option-hover">
                                    Pago de alquiler</option>

                            </select>
                        </div>

                    </div>

                </div>

                <div class="first-step">
                    <div class="margin-div">
                        <label for="bank_account">bank account</label>
                        <input type="number" name="bank_account" id="bank_account"
                            onfocusout="validateInput('bank_account')" minlength="18" maxlength="18"
                            placeholder="Enter name">

                    </div>

                    <div class="margin-div">

                        <label for="nationality">nationality</label>

                        <div class="custom-select">
                            <select id="nationality" name="nationality" required>
                                <option onclick="removeSelectRed('select-selected')" value="Seleccione uno"
                                    class="select-one" id="select-one">
                                    Seleccione uno</option>
                                <option onclick="removeSelectRed('select-selected')" value="MX" class="option-hover">MX
                                </option>
                                <option onclick="removeSelectRed('select-selected')" value="ES" class="option-hover">ES
                                </option>
                                <option onclick="removeSelectRed('select-selected')" value="AL">
                                    AL</option>
                                <option onclick="removeSelectRed('select-selected')" value="AR" class="option-hover">
                                    AR</option>
                                <option onclick="removeSelectRed('select-selected')" value="BR" class="option-hover">
                                    BR</option>
                                <option onclick="removeSelectRed('select-selected')" value="BU" class="option-hover">
                                    BU</option>
                                <option onclick="removeSelectRed('select-selected')" value="RU" class="option-hover">
                                    RU</option>

                            </select>
                        </div>
                    </div>

                    <div class="margin-div">

                        <label for="dependant_count">dependant count</label>

                        <div class="custom-select">
                            <select id="dependant_count" name="dependant_count" required>
                                <option onclick="removeSelectRed('select-selected')" value="Seleccione uno"
                                    class="select-one" id="select-one">
                                    Seleccione uno</option>
                                <option onclick="removeSelectRed('select-selected')" value="1" class="option-hover">1
                                </option>
                                <option onclick="removeSelectRed('select-selected')" value="2" class="option-hover">2
                                </option>
                                <option onclick="removeSelectRed('select-selected')" value="3">
                                    3</option>
                                <option onclick="removeSelectRed('select-selected')" value="4" class="option-hover">
                                    4</option>
                                <option onclick="removeSelectRed('select-selected')" value="5" class="option-hover">
                                    5</option>
                                <option onclick="removeSelectRed('select-selected')" value="6" class="option-hover">
                                    6</option>
                                <option onclick="removeSelectRed('select-selected')" value="7" class="option-hover">
                                    7</option>
                                <option onclick="removeSelectRed('select-selected')" value="8" class="option-hover">
                                    8</option>
                                <option onclick="removeSelectRed('select-selected')" value="9" class="option-hover">
                                    9</option>
                                <option onclick="removeSelectRed('select-selected')" value="10" class="option-hover">
                                    10</option>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="first-step">
                    <div class="margin-div">
                        <label for="email">email</label>


                        <input type="email" class="form-input" onfocusout="validateInput('email')" id="email"
                            name="email" maxlength="40" required placeholder="Enter name">
                    </div>

                    <div class="margin-div">
                        <label for="phone">phone</label>
                        <input type="tel" class="form-input tel-padding" id="phone" name="phone" maxlength="13"
                            required />
                    </div>

                    <div class="margin-div">
                        <label for="phone_plan">phone plan</label>



                        <div class="custom-select">
                            <select id="dependant_count" name="dependant_count" required>
                                <option onclick="removeSelectRed('select-selected')" value="Seleccione uno"
                                    class="select-one" id="select-one">
                                    Seleccione uno</option>
                                <option onclick="removeSelectRed('select-selected')" value="PREPAID"
                                    class="option-hover">PREPAID</option>
                                <option onclick="removeSelectRed('select-selected')" value="CONTRACT"
                                    class="option-hover">CONTRACT
                                </option>


                            </select>
                        </div>
                    </div>
                </div>

            </div>

            <!-- second step -->

            <div class="steps-div" id="second-one">
                <h1 class="register-h1">Second step 2/3</h1>
                <h2 class="register-h2">Adress</h2>

                <div class="first-step">

                    <div class="margin-div">
                        <label for="postal_code">postal_code</label>
                        <input type="text" name="postal_code" onfocusout="validateInput('postal_code')" id="postal_code"
                            pattern="^[0-9]{5}$" required maxlength="45">
                    </div>
                    <div class="margin-div">
                        <label for="city">city</label>
                        <input type="text" name="city" onfocusout="validateInput('city')" id="city" maxlength="45">
                    </div>
                    <div class="margin-div">
                        <label for="street">street</label>
                        <input type="text" name="street" onfocusout="validateInput('street')" id="street"
                            maxlength="45">
                    </div>
                </div>

                <div class="first-step">
                    <div class="margin-div">
                        <label for="house_number">house_number</label>
                        <input type="text" name="house_number" onfocusout="validateInput('house_number')"
                            id="house_number" maxlength="45">
                    </div>
                    <div class="margin-div">
                        <label for="region">region</label>
                        <input type="text" name="region" id="region" maxlength="45">
                    </div>
                    <div class="margin-div">
                        <label for="county">city</label>
                        <input type="text" name="county" id="county" maxlength="45">
                    </div>
                </div>

                <div class="first-step">
                    <div class="margin-div">
                        <label for="district">district</label>
                        <input type="text" name="district" id="district" maxlength="45">
                    </div>
                    <div class="margin-div">
                        <label for="housing_type">housing type</label>

                        <div class="custom-select">
                            <select id="housing_type" name="housing_type" required>
                                <option onclick="removeSelectRed('select-selected')" value="Seleccione uno"
                                    class="select-one" id="select-one">
                                    Seleccione uno</option>
                                <option onclick="removeSelectRed('select-selected')" value="RENTED_ROOM"
                                    class="option-hover">RENTED_ROOM</option>
                                <option onclick="removeSelectRed('select-selected')" value="RENTED_APARTMENT_OR_HOUSE"
                                    class="option-hover">RENTED_APARTMENT_OR_HOUSE
                                </option>
                                <option onclick="removeSelectRed('select-selected')" value="OWN_HOUSE_OR_APARTMENT">
                                    OWN_HOUSE_OR_APARTMENT</option>
                                <option onclick="removeSelectRed('select-selected')" value="WITH_PARENTS"
                                    class="option-hover">
                                    WITH_PARENTS</option>


                            </select>
                        </div>
                    </div>
                </div>


                <div class="button-div">
                    <button class="register-next">
                        <p>Next </p><img src="img/arrow-register.svg" alt="">
                    </button>
                </div>

            </div>
            <!-- end -->


            <!-- third step -->


            <div class="steps-div" id="third-step">
                <h1 class="register-h1">Third step 3/3</h1>
                <h2 class="register-h2">Adress</h2>
                <div class="first-step">
                    <div class="margin-div">
                        <label for="occupation">occupation</label>


                        <div class="custom-select">
                            <select id="occupation" name="occupation" required>
                                <option onclick="removeSelectRed('select-selected')" value="Seleccione uno"
                                    class="select-one" id="select-one">
                                    Seleccione uno</option>
                                <option onclick="removeSelectRed('select-selected')" value="EMPLOYED_INDEFINITE_PERIOD"
                                    class="option-hover">EMPLOYED_INDEFINITE_PERIOD</option>
                                <option onclick="removeSelectRed('select-selected')" value="SELF_EMPLOYED"
                                    class="option-hover">SELF_EMPLOYED
                                </option>
                                <option onclick="removeSelectRed('select-selected')" value="PENSIONER1">
                                    PENSIONER1</option>
                                <option onclick="removeSelectRed('select-selected')" value="STUDENT"
                                    class="option-hover">
                                    STUDENT</option>
                                <option onclick="removeSelectRed('select-selected')" value="UNEMPLOYED"
                                    class="option-hover">
                                    UNEMPLOYED</option>
                                <option onclick="removeSelectRed('select-selected')" value="FREELANCER"
                                    class="option-hover">
                                    FREELANCER</option>
                                <option onclick="removeSelectRed('select-selected')" value="OWN_BUSINESS"
                                    class="option-hover">
                                    OWN_BUSINESS</option>
                                <option onclick="removeSelectRed('select-selected')" value="MATERNITY_LEAVE"
                                    class="option-hover">
                                    MATERNITY_LEAVE</option>


                            </select>
                        </div>

                    </div>
                    <div class="margin-div">
                        <label for="neto_income">neto_income</label>
                        <input type="text" name="neto_income" id="neto_income">
                    </div>
                    <div class="margin-div">
                        <label for="remuneration_deadline">remuneration deadline</label>
                        <input type="text" id="remuneration_deadline"
                            onfocusout="validateInput('remuneration_deadline')" name="remuneration_deadline"
                            pattern="^([12][0-9]{3}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01]))$">
                    </div>
                </div>

                <div class="first-step" id="dissapeare">
                    <div class="margin-div">
                        <label for="employed_since">Emplyoed since</label>
                    <input type="text" name="employed_since" id="employed_since">
                    </div>
                    <div class="margin-div">
                        <label for="employed_since">Employed</label>
                    <input type="text" name="employer" id="employer">
                    </div>
                </div>

                <div class="first-step">
                    <div class="margin-div">
                        <label for="credit_score">credit score</label>

                        <div class="custom-select">
                            <select id="credit_score" name="credit_score" required>
                                <option onclick="removeSelectRed('select-selected')" value="Seleccione uno"
                                    class="select-one" id="select-one">
                                    Seleccione uno</option>
                                <option onclick="removeSelectRed('select-selected')" value="REXCELLENT_700_TO_850"
                                    class="option-hover">EXCELLENT_700_TO_850</option>
                                <option onclick="removeSelectRed('select-selected')" value="STABLE_550_TO_650"
                                    class="option-hover">STABLE_550_TO_650
                                </option>
                                <option onclick="removeSelectRed('select-selected')" value="STABLE_550_TO_650">
                                    STABLE_550_TO_650</option>
                                <option onclick="removeSelectRed('select-selected')" value="LOW_300_TO_550"
                                    class="option-hover">
                                    LOW_300_TO_550</option>
                                <option onclick="removeSelectRed('select-selected')" value="WITH_PARENTS"
                                    class="option-hover">
                                    DONT_KNOW</option>
                                <option onclick="removeSelectRed('select-selected')" value="WITH_PARENTS"
                                    class="option-hover">
                                    NO_CREDIT_HISTORY</option>


                            </select>
                        </div>
                    </div>



                    <div class="margin-div">
                        <label for="has_loan">has loan</label>

                        <div class="custom-select">
                            <select id="has_loan" name="has_loan" required>
                                <option onclick="removeSelectRed('select-selected')" value="Seleccione uno"
                                    class="select-one" id="select-one">
                                    Seleccione uno</option>
                                <option onclick="removeSelectRed('select-selected')" value="no" class="option-hover">No
                                </option>
                                <option onclick="removeSelectRed('select-selected')" value="yes" class="option-hover">
                                    Yes
                                </option>


                            </select>
                        </div>
                    </div>
                    <div class="margin-div">
                        <label for="car">car</label>

                        <div class="custom-select">
                            <select id="car" name="car" required>
                                <option onclick="removeSelectRed('select-selected')" value="Seleccione uno"
                                    class="select-one" id="select-one">
                                    Seleccione uno</option>
                                <option onclick="removeSelectRed('select-selected')" value="no" class="option-hover">No
                                </option>
                                <option onclick="removeSelectRed('select-selected')" value="yes" class="option-hover">
                                    Yes
                                </option>


                            </select>
                        </div>
                    </div>
                </div>

                <div class="first-step" id="dissapeare2">
                    <div class="margin-div">
                        <label for="debt_amount">debt_amount</label>
                    <input type="text" name="debt_amount" id="debt_amount">
                    </div>
                    <div class="margin-div">
                        <label for="has_credit_card">has_credit_card</label>
                    <input type="text" name="has_credit_card" id="has_credit_card">
                    </div>
                </div>

                <div class="terms-div">

                    <div class="terms-box">


                        <input type="checkbox" name="policy" id="policy">
                        <label for="policy">By clicking the Athe Terms and Conditions , and Privacy Policy .</label>

                    </div>

                    <div class="terms-box">

                        <input type="checkbox" name="terms" id="terms">
                        <label for="terms">By clicking the Athe Terms and Conditions , and Privacy Policy .</label>
                    </div>
                </div>
                <button type="button" onclick="validateForm('customers-form')" class="submit-green">Get the money</button>
            </div>
    </div>



    </div>

    <!-- third step -->

   
    </form>
    </div>

    <script src="./register-scripts.js"></script>
    <script src="./dates.js"></script>
</body>

</html>