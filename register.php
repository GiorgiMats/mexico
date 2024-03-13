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
            <div class="steps-div displaynone" id="stepsdiv1">
                <h1 class="register-h1">First step 1/3</h1>
                <h2 class="register-h2">Datos personales</h2>
                <div class="first-step">
                    <div class="first-name margin-div">
                        <label for="first_name">Nombre</label>
                        <input type="text" name="first_name" id="first_name" required maxlength="255"
                            onfocusout="validateInput('first_name')" placeholder="Ingrese su nombre">
                    </div>

                    <div class="last-name margin-div">
                        <label for="last_name">Apellido paterno</label>
                        <input type="text" name="last_name" id="last_name" onfocusout="validateInput('last_name')"
                            required placeholder="Ingrese su apellido paterno">
                    </div>

                    <div class="second-lastname margin-div">
                        <label for="second_last_name">Apellido materno</label>
                        <input type="text" name="second_last_name" id="second_last_name"
                            onfocusout="validateInput('second_last_name')" required maxlength="255"
                            placeholder="Ingrese su apellido materno">
                    </div>
                </div>

                <div class="flex-div">


                    <div class="margin-div">


                        <label for="birth_date">Fecha de nacimiento</label>

                        <div class="margin-div-new">
                            <div class="date-flex">
                                <p>
                                    <select class="form-input date-select" onclick="checkCustomSelect('dateDay')"
                                        id="dateDay" name="birth_day" required>
                                        <option class="select-one" value="" disabled selected>Día</option>
                                    </select>
                                </p>
                                <p>
                                    <select class="form-input date-select" id="dateMonth"
                                        onclick="checkCustomSelect('dateMonth')" name="birth_month" required>
                                        <option class="select-one" value="" disabled selected>Mes</option>
                                    </select>
                                </p>
                                <p>
                                    <select class="form-input date-select" id="dateYear"
                                        onclick="checkCustomSelect('dateYear')" name="birth_year" required>
                                        <option class="select-one" value="" disabled selected>Año</option>
                                    </select>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="flex-div">




                    <div class="margin-div">
                        <span>Género</span>

                        <div class="margin-div-new">

                            <div class="gender-div">
                                <div class="male-div">
                                    <input type="radio" id="male" name="gender" value="MALE">
                                    <label for="male" onclick="selectRadio()">Masculino</label>
                                </div>

                                <div class="female-div">
                                    <input type="radio" id="female" name="gender" value="FEMALE">
                                    <label for="female" onclick="selectRadio()">Feminino</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="first-step">
                    <div class="margin-div">
                        <label for="personal_id">CURP</label>
                        <input type="text" onfocusout="validateInput('personal_id')" name="personal_id" id="personal_id"
                            pattern="^[A-Z]{1}[AEIOUX]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$"
                            placeholder="Ingrese su CURP">

                    </div>


                    <div class="margin-div">

                        <label for="tax_id_number">RFC</label>
                        <input type="text" name="tax_id_number" id="tax_id_number"
                            onfocusout="validateInput('tax_id_number')" required
                            pattern="^[A-Z]{1}[AEIOUX]{1}[A-Z]{2}[0-9]{2}(?:0[1-9]|1[0-2])(?:0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Za-z0-9]{3}$"
                            placeholder="Ingrese su RFC">

                    </div>

                    <div class="margin-div">

                        <label for="marital_status">marital status</label>


                        <div class="custom-select" id="marital_status-div" onclick="checkSelect('marital_status-div')">
                            <select id="marital_status" name="rmarital_status" required>
                                <option value="Seleccione uno" class="select-one" id="select-one"
                                    onclick="checkSelect('marital_status-div')">
                                    Seleccione uno</option>
                                <option onclick="checkSelect('marital_status-div')" value="SINGLE" class="option-hover">
                                    single</option>
                                <option onclick="checkSelect('marital_status-div')" value="MARRIED"
                                    class="option-hover">Consolidar prestamos existentes
                                </option>
                                <option onclick="checkSelect('marital_status-div')" value="DIVORCED">
                                    single</option>
                                <option onclick="checkSelect('marital_status-div')" value="WITH_PARTNER"
                                    class="option-hover">
                                    Reparar el coche</option>
                                <option onclick="checkSelect('marital_status-div')" value="WIDOW" class="option-hover">
                                    Pago de alquiler</option>

                            </select>
                        </div>

                    </div>

                </div>

                <div class="first-step">
                    <div class="margin-div">
                        <label for="bank_account">bank account</label>
                        <input type="text" name=" bank_account" id="bank_account"
                            onfocusout="validateInput('bank_account')" minlength="18" maxlength="18"
                            placeholder="Ingrese su">

                    </div>

                    <div class="margin-div">

                        <label for="nationality">nationality</label>

                        <div class="custom-select" id="nationality-div" onclick="checkSelect('nationality-div')">
                            <select id="nationality" name="nationality" required>
                                <option value="Seleccione uno" class="select-one" id="select-one">
                                    Seleccione uno</option>
                                <option onclick="checkSelect('nationality-div')" value="MX" class="option-hover">MX
                                </option>
                                <option onclick="checkSelect('nationality-div')" value="ES" class="option-hover">ES
                                </option>
                                <option onclick="checkSelect('nationality-div')" value="AL">
                                    AL</option>
                                <option onclick="checkSelect('nationality-div')" value="AR" class="option-hover">
                                    AR</option>
                                <option onclick="checkSelect('nationality-div')" value="BR" class="option-hover">
                                    BR</option>
                                <option onclick="checkSelect('nationality-div')" value="BU" class="option-hover">
                                    BU</option>
                                <option onclick="checkSelect('nationality-div')" value="RU" class="option-hover">
                                    RU</option>

                            </select>
                        </div>
                    </div>

                    <div class="margin-div">

                        <label for="dependant_count">dependant count</label>

                        <div class="custom-select" id="dependant_count-div"
                            onclick="checkSelect('dependant_count-div')">
                            <select id="dependant_count" name="dependant_count" required>
                                <option onclick="checkSelect('dependant_count-div')" value="Seleccione uno"
                                    class="select-one" id="select-one">
                                    Seleccione uno</option>
                                <option onclick="checkSelect('dependant_count-div')" value="0" class="option-hover">0
                                </option>
                                <option onclick="checkSelect('dependant_count-div')" value="1" class="option-hover">1
                                </option>
                                <option onclick="checkSelect('dependant_count-div')" value="2" class="option-hover">2
                                </option>
                                <option onclick="checkSelect('dependant_count-div')" value="3">
                                    3</option>
                                <option onclick="checkSelect('dependant_count-div')" value="4" class="option-hover">
                                    4</option>
                                <option onclick="checkSelect('dependant_count-div')" value="5" class="option-hover">
                                    5</option>
                                <option onclick="checkSelect('dependant_count-div')" value="6" class="option-hover">
                                    6</option>
                                <option onclick="checkSelect('dependant_count-div')" value="7" class="option-hover">
                                    7</option>
                                <option onclick="checkSelect('dependant_count-div')" value="8" class="option-hover">
                                    8</option>
                                <option onclick="checkSelect('dependant_count-div')" value="9" class="option-hover">
                                    9</option>
                                <option onclick="checkSelect('dependant_count-div')" value="10" class="option-hover">
                                    10</option>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="first-step">
                    <div class="margin-div">
                        <label for="email">email</label>


                        <input type="email" class="form-input" onfocusout="validateInput('email')" id="email"
                            name="email" maxlength="40" required placeholder="Ingrese su">
                    </div>

                    <div class="margin-div">
                        <label for="phone">phone</label>
                        <input type="tel" class="form-input tel-padding" id="phone" name="phone"
                            onfocusout="validateInput('phone')" maxlength="16" required />
                    </div>

                    <div class="margin-div">
                        <label for="phone_plan">phone plan</label>



                        <div class="custom-select" id="phone_plan-div" onclick="checkSelect('phone_plan-div')">
                            <select id="phone_plan" name="phone_plan" required>
                                <option onclick="checkSelect('phone_plan-div')" value="Seleccione uno"
                                    class="select-one" id="select-one">
                                    Seleccione uno</option>
                                <option onclick="checkSelect('phone_plan-div')" value="PREPAID" class="option-hover">
                                    PREPAID</option>
                                <option onclick="checkSelect('phone_plan-div')" value="CONTRACT" class="option-hover">
                                    CONTRACT
                                </option>


                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end -->

            <!-- second step -->
            <div class="steps-div displaynone" id="stepsdiv2">
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
                        <input type="text" name="region" id="region" maxlength="45"
                            onfocusout="validateInput('region')">
                    </div>
                    <div class="margin-div">
                        <label for="county">county</label>
                        <input type="text" name="county" id="county" maxlength="45"
                            onfocusout="validateInput('county')">
                    </div>
                </div>

                <div class="first-step">
                    <div class="margin-div">
                        <label for="district">district</label>
                        <input type="text" name="district" id="district" maxlength="45"
                            onfocusout="validateInput('district')">
                    </div>

                    <div class="margin-div">
                        <label for="colony">colony</label>
                        <input type="text" name="colony" id="colony" maxlength="45"
                            onfocusout="validateInput('colony')">
                    </div>
                    <div class="margin-div">
                        <label for="housing_type">housing type</label>

                        <div class="custom-select" id="housing_type-div" onclick="checkSelect('housing_type-div')">
                            <select id="housing_type" name="housing_type" required>
                                <option onclick="checkSelect('housing_type-div')" value="Seleccione uno"
                                    class="select-one" id="select-one">
                                    Seleccione uno</option>
                                <option onclick="checkSelect('housing_type-div')" value="RENTED_ROOM"
                                    class="option-hover">RENTED_ROOM</option>
                                <option onclick="checkSelect('housing_type-div')" value="RENTED_APARTMENT_OR_HOUSE"
                                    class="option-hover">RENTED_APARTMENT_OR_HOUSE
                                </option>
                                <option onclick="checkSelect('housing_type-div')" value="OWN_HOUSE_OR_APARTMENT">
                                    OWN_HOUSE_OR_APARTMENT</option>
                                <option onclick="checkSelect('housing_type-div')" value="WITH_PARENTS"
                                    class="option-hover">
                                    WITH_PARENTS</option>


                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end -->

            <!-- third step -->
            <div class="steps-div" id="stepsdiv3">
                <h1 class="register-h1">Third step 3/3</h1>
                <h2 class="register-h2">Adress</h2>
                <div class="first-step">
                    <div class="margin-div">
                        <label for="occupation">Estado de Empleo</label>


                        <div class="custom-select" id="occupation-div" onclick="checkSelect('occupation-div')">
                            <select id="occupation" name="occupation" required>
                                <option onclick="checkSelect('occupation-div')" value="Seleccione uno"
                                    class="select-one" id="select-one">
                                    Seleccione uno</option>
                                <option onclick="checkSelect('occupation-div')" value="EMPLOYED_INDEFINITE_PERIOD"
                                    class="option-hover">EMPLOYED_INDEFINITE_PERIOD</option>
                                <option onclick="checkSelect('occupation-div')" value="SELF_EMPLOYED"
                                    class="option-hover">SELF_EMPLOYED
                                </option>
                                <option onclick="checkSelect('occupation-div')" value="PENSIONER1">
                                    PENSIONER1</option>
                                <option onclick="checkSelect('occupation-div')" value="STUDENT" class="option-hover">
                                    STUDENT</option>
                                <option onclick="checkSelect('occupation-div')" value="UNEMPLOYED" class="option-hover">
                                    UNEMPLOYED</option>
                                <option onclick="checkSelect('occupation-div')" value="FREELANCER" class="option-hover">
                                    FREELANCER</option>
                                <option onclick="checkSelect('occupation-div')" value="OWN_BUSINESS"
                                    class="option-hover">
                                    OWN_BUSINESS</option>
                                <option onclick="checkSelect('occupation-div')" value="MATERNITY_LEAVE"
                                    class="option-hover">
                                    MATERNITY_LEAVE</option>


                            </select>
                        </div>

                    </div>
                    <div class="margin-div">
                        <label for="neto_income">neto_income</label>
                        <input type="number" name="neto_income" id="neto_income"
                            onfocusout="validateInput('house_number')">
                    </div>
                    <div class="margin-div">
                        <label for="remuneration_deadline">remuneration deadline</label>

                        <div class="margin-div-new">
                            <div class="date-flex">
                                <p>
                                    <select class="form-input date-select"
                                        onclick="checkCustomSelect('remunerationDay')" id="remunerationDay"
                                        name="birth_day" required>
                                        <option class="select-one" value="" disabled selected>Día</option>
                                    </select>
                                </p>
                                <p>
                                    <select class="form-input date-select" id="remunerationMonth"
                                        onclick="checkCustomSelect('remunerationMonth')" name="birth_month" required>
                                        <option class="select-one" value="" disabled selected>Mes</option>
                                    </select>
                                </p>
                                <p>
                                    <select class="form-input date-select" id="remunerationYear"
                                        onclick="checkCustomSelect('remunerationYear')" name="birth_year" required>
                                        <option class="select-one" value="" disabled selected>Año</option>
                                    </select>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="first-step" id="dissapeare">
                    <div class="margin-div">
                        <label for="employed_since">Emplyoed since</label>
                        <div class="margin-div-new">
                            <div class="date-flex">
                                <p>
                                    <select class="form-input date-select" id="employedMonth"
                                        onclick="checkCustomSelect('employedMonth')" name="birth_month" required>
                                        <option class="select-one" value="" disabled selected>Mes</option>
                                    </select>
                                </p>
                                <p>
                                    <select class="form-input date-select" id="employedYear"
                                        onclick="checkCustomSelect('employedYear')" name="birth_year" required>
                                        <option class="select-one" value="" disabled selected>Año</option>
                                    </select>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="margin-div">
                        <label for="employed_since">Employer</label>
                        <input type="text" name="employer" id="employer" onfocusout="validateInput('employer')">
                    </div>
                </div>

                <div class="first-step">
                    <div class="margin-div">
                        <label for="credit_score">credit score</label>

                        <div class="custom-select" id="credit_score-div" onclick="checkSelect('credit_score-div')">
                            <select id="credit_score" name="credit_score" required>
                                <option onclick="checkSelect('credit_score-div')" value="Seleccione uno"
                                    class="select-one" id="select-one">
                                    Seleccione uno</option>
                                <option onclick="checkSelect('credit_score-div')" value="EXCELLENT_700_TO_850"
                                    class="option-hover">EXCELLENT_700_TO_850</option>
                                <option onclick="checkSelect('credit_score-div')" value="STABLE_550_TO_650"
                                    class="option-hover">STABLE_550_TO_650
                                </option>
                                <option onclick="checkSelect('credit_score-div')" value="STABLE_550_TO_650">
                                    STABLE_550_TO_650</option>
                                <option onclick="checkSelect('credit_score-div')" value="LOW_300_TO_550"
                                    class="option-hover">
                                    LOW_300_TO_550</option>
                                <option onclick="checkSelect('credit_score-div')" value="WITH_PARENTS"
                                    class="option-hover">
                                    DONT_KNOW</option>
                                <option onclick="checkSelect('credit_score-div')" value="WITH_PARENTS"
                                    class="option-hover">
                                    NO_CREDIT_HISTORY</option>


                            </select>
                        </div>
                    </div>



                    <div class="margin-div">
                        <label for="has_loan">has loan</label>

                        <div class="custom-select" id="has_loan-div" onclick="checkSelect('has_loan-div')">
                            <select id="has_loan" name="has_loan" required>
                                <option onclick="checkSelect('has_loan-div')" value="Seleccione uno" class="select-one"
                                    id="select-one">
                                    Seleccione uno</option>
                                <option onclick="checkSelect('has_loan-div')" value="0" class="option-hover">No
                                </option>
                                <option onclick="checkSelect('has_loan-div')" value="1" class="option-hover">
                                    Yes
                                </option>


                            </select>
                        </div>
                    </div>
                    <div class="margin-div">
                        <label for="car">car</label>

                        <div class="custom-select" id="car-div" onclick="checkSelect('car-div')">
                            <select id="car" name="car" required>
                                <option onclick="checkSelect('car-div')" value="Seleccione uno" class="select-one"
                                    id="select-one">
                                    Seleccione uno</option>
                                <option onclick="checkSelect('car-div')" value="no" class="option-hover">No
                                </option>
                                <option onclick="checkSelect('car-div')" value="yes" class="option-hover">
                                    Yes
                                </option>


                            </select>
                        </div>
                    </div>
                </div>

                <div class="first-step" id="dissapeare2">
                    <div class="margin-div">
                        <label for="debt_amount">debt_amount</label>
                        <input type="number" name="debt_amount" id="debt_amount"
                            onfocusout="validateInput('house_number')">
                    </div>
                    <div class="margin-div">
                        <label for="has_credit_card">has_credit_card</label>
                        <input type="text" name="has_credit_card" id="has_credit_card"
                            onfocusout="validateInput('house_number')">
                    </div>
                </div>

                <div class="terms-div">

                    <div class="terms-box">


                        <input type="checkbox" name="policy" id="policy" onclick="selectCheckbox('policy-p')">
                        <label for="policy" id="policy-p" onclick="selectCheckbox('policy-p')">By clicking the Athe
                            Terms and Conditions , and Privacy Policy
                            .</label>

                    </div>

                    <div class="terms-box">

                        <input type="checkbox" name="terms" id="terms" onclick="selectCheckbox('terms-p')">
                        <label for="terms" id="terms-p" onclick="selectCheckbox('terms-p')">By clicking the Athe Terms
                            and Conditions , and Privacy Policy
                            .</label>
                    </div>
                </div>
            </div>
            <!-- end -->
    </div>

    <div class="button-div">
        <button id="stepsbutton" type="button" class="register-next" onclick="nextStep(1)">
            <p>Next </p><img src="img/arrow-register.svg" alt="">
        </button>
    </div>



    </div>

    <!-- third step -->


    </form>
    </div>

    <script src="./register-scripts.js"></script>
    <script src="./dates.js"></script>
</body>

</html>