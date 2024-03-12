<?php
session_start();
if (isset($_SESSION['leadData'])) {
    $leadData = $_SESSION['leadData']; // Retrieve lead data
    // echo $leadData['loan_purpose'];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="register-styles-new.css">
    <title>MX Credito - Take a Credit</title>
</head>

<body>

    <!-- Section Loan Girl -->
    <div class="section-loan-girl">
        <div class="loan-girl-text">
            <h1>¡Obtén un préstamo en 3 minutos!</h1>
            <ul class="loans-menu-nav">
                <li class="lmn-item">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 6.99997L9 19L3.5 13.5L4.91 12.09L9 16.17L19.59 5.58997L21 6.99997Z"
                            fill="#FFFEA3" />
                    </svg>
                    <p>Hasta $30.000 en un click</p>
                </li>
                <li class="lmn-item">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 6.99997L9 19L3.5 13.5L4.91 12.09L9 16.17L19.59 5.58997L21 6.99997Z"
                            fill="#FFFEA3" />
                    </svg>
                    <p>Más de 30 ofertas de diferentes empresas</p>
                </li>
                <li class="lmn-item">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 6.99997L9 19L3.5 13.5L4.91 12.09L9 16.17L19.59 5.58997L21 6.99997Z"
                            fill="#FFFEA3" />
                    </svg>
                    <p>Los mejores préstamos rápidos sin papeleos</p>
                </li>
                <li class="lmn-item">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 6.99997L9 19L3.5 13.5L4.91 12.09L9 16.17L19.59 5.58997L21 6.99997Z"
                            fill="#FFFEA3" />
                    </svg>
                    <p>Los primeros clientes pueden obtener un préstamo al 0%</p>
                </li>
            </ul>
        </div>
    </div>
    <!-- Section Loan Girl END -->

    <div class="main-div">
        <div class="inside-main-div">
            <div class="inside-main-div-div">
                <header class="header">
                    <a href="#">
                        <img src="./img/main-logo.svg" alt="MX Credito">
                    </a>
                </header>
                <form id="customers-form" action="customer_submit.php" method="POST" class="section-register">
                    <div class="accordions">
                        <div class="accordion">
                            <label class="accordion__title" for="radio_1" onclick="changeCurrentStep(1)">
                                <input id="radio_1" type="radio" name="radio" checked="checked" /><span
                                    class="step-p">Paso 1/3:</span>
                                <span class="accordion-title-p">Datos personales</span>
                            </label>
                            <div class="accordion__text">
                                <div id="stepsdiv1" class="step-1-container step-container">
                                    <div class="step-item">
                                        <label for="first_name">Nombre</label>
                                        <input class="step-input" type="text" name="first_name" id="first_name" required
                                            maxlength="255" onfocusout="validateInput('first_name')"
                                            placeholder="Ingrese su nombre...">
                                    </div>
                                    <div class="step-item">
                                        <label for="last_name">Apellido paterno</label>
                                        <input class="step-input" type="text" name="last_name" id="last_name"
                                            onfocusout="validateInput('last_name')" required
                                            placeholder="Ingrese su apellido paterno...">
                                    </div>
                                    <div class="step-item">
                                        <label for="second_last_name">Apellido materno</label>
                                        <input class="step-input" type="text" name="second_last_name"
                                            id="second_last_name" onfocusout="validateInput('second_last_name')"
                                            required maxlength="255" placeholder="Ingrese su apellido materno...">
                                    </div>
                                    <div class="step-item">
                                        <label for="birth_day">Fecha de nacimiento</label>
                                        <div class="stepitem-inputs-container">
                                            <select class="form-input date-select"
                                                onclick="checkCustomSelect('dateDay')" id="dateDay" name="birth_day"
                                                required>
                                                <option class="select-one" value="" disabled selected>Día</option>
                                            </select>
                                            <select class="form-input date-select" id="dateMonth"
                                                onclick="checkCustomSelect('dateMonth')" name="birth_month" required>
                                                <option class="select-one" value="" disabled selected>Mes</option>
                                            </select>
                                            <select class="form-input date-select" id="dateYear"
                                                onclick="checkCustomSelect('dateYear')" name="birth_year" required>
                                                <option class="select-one" value="" disabled selected>Año</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="step-item">
                                        <label for="dependant_count">Personas a tu cargo</label>
                                        <div class="custom-select" id="dependant_count-div"
                                            onclick="checkSelect('dependant_count-div')">
                                            <select id="dependant_count" name="dependant_count" required>
                                                <option onclick="checkSelect('dependant_count-div')"
                                                    value="Seleccione uno" class="select-one" id="select-one">
                                                    Seleccione uno</option>
                                                <option onclick="checkSelect('dependant_count-div')" value="0"
                                                    class="option-hover">0
                                                </option>
                                                <option onclick="checkSelect('dependant_count-div')" value="1"
                                                    class="option-hover">1
                                                </option>
                                                <option onclick="checkSelect('dependant_count-div')" value="2"
                                                    class="option-hover">2
                                                </option>
                                                <option onclick="checkSelect('dependant_count-div')" value="3">
                                                    3</option>
                                                <option onclick="checkSelect('dependant_count-div')" value="4"
                                                    class="option-hover">
                                                    4</option>
                                                <option onclick="checkSelect('dependant_count-div')" value="5"
                                                    class="option-hover">
                                                    5</option>
                                                <option onclick="checkSelect('dependant_count-div')" value="6"
                                                    class="option-hover">
                                                    6</option>
                                                <option onclick="checkSelect('dependant_count-div')" value="7"
                                                    class="option-hover">
                                                    7</option>
                                                <option onclick="checkSelect('dependant_count-div')" value="8"
                                                    class="option-hover">
                                                    8</option>
                                                <option onclick="checkSelect('dependant_count-div')" value="9"
                                                    class="option-hover">
                                                    9</option>
                                                <option onclick="checkSelect('dependant_count-div')" value="10"
                                                    class="option-hover">
                                                    10</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="step-item">
                                        <label for="gender">Género</label>
                                        <div class="stepradio-inputs-container gender-div">
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
                                    <div class="step-item">
                                        <label for="nationality">Nacionalidad</label>
                                        <div class="custom-select" id="nationality-div"
                                            onclick="checkSelect('nationality-div')">
                                            <select id="nationality" name="nationality" required>
                                                <option value="Seleccione uno" class="select-one" id="select-one">
                                                    Seleccione uno</option>
                                                <option onclick="checkSelect('nationality-div')" value="MX"
                                                    class="option-hover">MX
                                                </option>
                                                <option onclick="checkSelect('nationality-div')" value="ES"
                                                    class="option-hover">ES
                                                </option>
                                                <option onclick="checkSelect('nationality-div')" value="AL">
                                                    AL</option>
                                                <option onclick="checkSelect('nationality-div')" value="AR"
                                                    class="option-hover">
                                                    AR</option>
                                                <option onclick="checkSelect('nationality-div')" value="BR"
                                                    class="option-hover">
                                                    BR</option>
                                                <option onclick="checkSelect('nationality-div')" value="BU"
                                                    class="option-hover">
                                                    BU</option>
                                                <option onclick="checkSelect('nationality-div')" value="RU"
                                                    class="option-hover">
                                                    RU</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="step-item">
                                        <label for="personal_id">CURP</label>
                                        <input class="step-input" type="text" onfocusout="validateInput('personal_id')"
                                            name="personal_id" id="personal_id"
                                            pattern="^[A-Z]{1}[AEIOUX]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$"
                                            placeholder="Ingrese su CURP...">
                                    </div>
                                    <div class="step-item">
                                        <label for="tax_id_number">RFC</label>
                                        <input class="step-input" type="text" name="tax_id_number" id="tax_id_number"
                                            onfocusout="validateInput('tax_id_number')" required
                                            pattern="^[A-Z]{1}[AEIOUX]{1}[A-Z]{2}[0-9]{2}(?:0[1-9]|1[0-2])(?:0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Za-z0-9]{3}$"
                                            placeholder="Ingrese su RFC...">
                                    </div>
                                    <div class="step-item">
                                        <label for="rmarital_status">Estado civil...</label>
                                        <div class="custom-select" id="marital_status-div"
                                            onclick="checkSelect('marital_status-div')">
                                            <select id="marital_status" name="rmarital_status" required>
                                                <option value="Seleccione uno" class="select-one" id="select-one"
                                                    onclick="checkSelect('marital_status-div')">
                                                    Seleccione uno</option>
                                                <option onclick="checkSelect('marital_status-div')" value="SINGLE"
                                                    class="option-hover">
                                                    Soltero/a</option>
                                                <option onclick="checkSelect('marital_status-div')" value="MARRIED"
                                                    class="option-hover">Casado/a
                                                </option>
                                                <option onclick="checkSelect('marital_status-div')" value="DIVORCED">
                                                    Divorciado/a</option>
                                                <option onclick="checkSelect('marital_status-div')" value="WITH_PARTNER"
                                                    class="option-hover">
                                                    Pareja de hecho</option>
                                                <option onclick="checkSelect('marital_status-div')" value="WIDOW"
                                                    class="option-hover">
                                                    Viudo/a</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="step-item">
                                        <label for="bank_account">CLABE account</label>
                                        <input class="step-input" type="text" name=" bank_account" id="bank_account"
                                            onfocusout="validateInput('bank_account')" minlength="18" maxlength="18"
                                            placeholder="CLABE account...">
                                    </div>
                                    <div class="step-item">
                                        <label for="email">Email</label>
                                        <input class="step-input" type="email" class="form-input"
                                            onfocusout="validateInput('email')" id="email" name="email" maxlength="40"
                                            required placeholder="Email...">
                                    </div>
                                    <div class="step-item">
                                        <label for="phone">Teléfono móvil</label>
                                        <input type="tel" class="step-input" class="form-input tel-padding" id="phone"
                                            name="phone" onfocusout="validateInput('phone')" maxlength="16" required
                                            placeholder="+52" />
                                    </div>
                                    <div class="step-item">
                                        <label for="phone_plan">Tipo de contrato</label>
                                        <div class="custom-select" id="phone_plan-div"
                                            onclick="checkSelect('phone_plan-div')">
                                            <select id="phone_plan" name="phone_plan" required>
                                                <option onclick="checkSelect('phone_plan-div')" value="Seleccione uno"
                                                    class="select-one" id="select-one">
                                                    Seleccione uno</option>
                                                <option onclick="checkSelect('phone_plan-div')" value="PREPAID"
                                                    class="option-hover">
                                                    Prepago</option>
                                                <option onclick="checkSelect('phone_plan-div')" value="CONTRACT"
                                                    class="option-hover">
                                                    Contrato
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="step-item sc-button-container">
                                        <div></div>
                                        <button type="button" class="btn-primary"
                                            onclick="nextStep(1)">Siguiente</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion">
                            <label class="accordion__title" for="radio_2" onclick="changeCurrentStep(2)">
                                <input id="radio_2" disabled type="radio" name="radio" /><span class="step-p">Paso
                                    2/3:</span>
                                <span class="accordion-title-p disabled-title" id="atitle2">Dirección</span>
                            </label>
                            <div class="accordion__text">
                                <div id="stepsdiv2" class="step-2-container step-container">
                                    <div class="step-item">
                                        <label for="housing_type">Tipo de vivienda</label>

                                        <div class="custom-select" id="housing_type-div"
                                            onclick="checkSelect('housing_type-div')">
                                            <select id="housing_type" name="housing_type" required>
                                                <option onclick="checkSelect('housing_type-div')" value="Seleccione uno"
                                                    class="select-one" id="select-one">
                                                    Seleccione uno</option>
                                                <option onclick="checkSelect('housing_type-div')" value="RENTED_ROOM"
                                                    class="option-hover">Habitación de alquiler</option>
                                                <option onclick="checkSelect('housing_type-div')"
                                                    value="RENTED_APARTMENT_OR_HOUSE" class="option-hover">
                                                    Casa o Apartamento de alquiler
                                                </option>
                                                <option onclick="checkSelect('housing_type-div')"
                                                    value="OWN_HOUSE_OR_APARTMENT">
                                                    Casa o apartamento propio</option>
                                                <option onclick="checkSelect('housing_type-div')" value="WITH_PARENTS"
                                                    class="option-hover">
                                                    Domicilio familiar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="step-item">
                                        <label for="postal_code">Código postal</label>
                                        <input type="text" class="step-input" name="postal_code"
                                            onfocusout="validateInput('postal_code')" id="postal_code"
                                            pattern="^[0-9]{5}$" required maxlength="45"
                                            placeholder="Ingrese código postal...">
                                    </div>
                                    <div class="step-item">
                                        <label for="city">Ciudad</label>
                                        <input class="step-input" type="text" name="city"
                                            onfocusout="validateInput('city')" id="city" maxlength="45"
                                            placeholder="Ingrese ciudad">
                                    </div>
                                    <div class="step-item">
                                        <label for="street">
                                            Dirección
                                        </label>
                                        <input class="step-input" type="text" name="street"
                                            onfocusout="validateInput('street')" id="street" maxlength="45"
                                            placeholder="Ingrese dirección...">
                                    </div>
                                    <div class="step-item">
                                        <label for="house_number"> Número exterior
                                        </label>
                                        <input class="step-input" type="text" name="house_number"
                                            onfocusout="validateInput('house_number')" id="house_number" maxlength="45"
                                            placeholder="Ingrese número exterior...">
                                    </div>
                                    <div class="step-item">
                                        <label for="region">Estado</label>
                                        <input class="step-input" type="text" name="region" id="region" maxlength="45"
                                            onfocusout="validateInput('region')" placeholder="Ingrese estado">
                                    </div>
                                    <div class="step-item">
                                        <label for="county">
                                            Delegacion/Municipio
                                        </label>
                                        <input class="step-input" type="text" name="county" id="county" maxlength="45"
                                            onfocusout="validateInput('county')" placeholder="Ingrese país...">
                                    </div>
                                    <div class="step-item">
                                        <label for="district">Distrito</label>
                                        <input class="step-input" type="text" name="district" id="district"
                                            maxlength="45" onfocusout="validateInput('district')"
                                            placeholder="Ingrese distrito...">
                                    </div>
                                    <div class="step-item sc-button-container">
                                        <div></div>
                                        <button type="button" class="btn-primary"
                                            onclick="nextStep(1)">Siguiente</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion">
                            <label class="accordion__title" for="radio_3">
                                <input id="radio_3" disabled type="radio" name="radio" /><span class="step-p">Paso
                                    2/3:</span>
                                <span class="accordion-title-p disabled-title" id="atitle3">Tipo de empleo</span>
                            </label>
                            <div class="accordion__text">
                                <div id="stepsdiv3" class="step-2-container step-container">
                                    <div class="step-item">
                                        <label for="occupation">occupation</label>
                                        <div class="custom-select" id="occupation-div"
                                            onclick="checkSelect('occupation-div')">
                                            <select id="occupation" name="occupation" required>
                                                <option onclick="checkSelect('occupation-div')" value="Seleccione uno"
                                                    class="select-one" id="select-one">
                                                    Seleccione uno</option>
                                                <option onclick="checkSelect('occupation-div')"
                                                    value="EMPLOYED_INDEFINITE_PERIOD" class="option-hover">
                                                    Empleado</option>
                                                <option onclick="checkSelect('occupation-div')" value="SELF_EMPLOYED"
                                                    class="option-hover">Negocio propio
                                                </option>
                                                <option onclick="checkSelect('occupation-div')" value="OWN_BUSINESS"
                                                    class="option-hover">
                                                    Ama de casa</option>
                                                <option onclick="checkSelect('occupation-div')" value="PENSIONER1">
                                                    Jubilado/Pensionista</option>
                                                <option onclick="checkSelect('occupation-div')" value="STUDENT"
                                                    class="option-hover">
                                                    Estudiante</option>
                                                <option onclick="checkSelect('occupation-div')" value="UNEMPLOYED"
                                                    class="option-hover">
                                                    Desempleado</option>
                                                <option onclick="checkSelect('occupation-div')" value="FREELANCER"
                                                    class="option-hover">
                                                    Freelancer</option>
                                                <option onclick="checkSelect('occupation-div')" value="MATERNITY_LEAVE"
                                                    class="option-hover">
                                                    Licencia de maternidad</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="step-item">
                                        <label for="credit_score">
                                            Historial Crediticio
                                        </label>
                                        <div class="custom-select" id="credit_score-div"
                                            onclick="checkSelect('credit_score-div')">
                                            <select id="credit_score" name="credit_score" required>
                                                <option onclick="checkSelect('credit_score-div')" value="Seleccione uno"
                                                    class="select-one" id="select-one">
                                                    Seleccione uno</option>
                                                <option onclick="checkSelect('credit_score-div')"
                                                    value="EXCELLENT_700_TO_850" class="option-hover">
                                                    Excelente (700 a 850)
                                                </option>
                                                <option onclick="checkSelect('credit_score-div')"
                                                    value="STABLE_550_TO_650" class="option-hover">Bueno (650 a 700)
                                                </option>
                                                <option onclick="checkSelect('credit_score-div')"
                                                    value="STABLE_550_TO_650">
                                                    Regular (550 a 650)</option>
                                                <option onclick="checkSelect('credit_score-div')" value="LOW_300_TO_550"
                                                    class="option-hover">
                                                    Bajo (300 a 550)</option>
                                                <option onclick="checkSelect('credit_score-div')" value="WITH_PARENTS"
                                                    class="option-hover">
                                                    No sé</option>
                                                <option onclick="checkSelect('credit_score-div')" value="WITH_PARENTS"
                                                    class="option-hover">
                                                    No tengo historial crediticio</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="step-item">
                                        <label for="neto_income">Sueldo neto $</label>
                                        <input class="step-input" type="number" name="neto_income" id="neto_income"
                                            onfocusout="validateInput('neto_income')" placeholder="Sueldo neto...">
                                    </div>
                                    <div class="step-item">
                                        <label for="remuneration_deadline">Fecha límite del próximo sueldo</label>
                                        <div class="stepitem-inputs-container">
                                            <select class="form-input date-select"
                                                onclick="checkCustomSelect('remunerationDay')" id="remunerationDay"
                                                name="remuneration_day" required>
                                                <option class="select-one" value="" disabled selected>Día</option>
                                            </select>
                                            <select class="form-input date-select" id="remunerationMonth"
                                                onclick="checkCustomSelect('remunerationMonth')"
                                                name="remuneration_month" required>
                                                <option class="select-one" value="" disabled selected>Mes</option>
                                            </select>
                                            <select class="form-input date-select" id="remunerationYear"
                                                onclick="checkCustomSelect('remunerationYear')" name="remuneration_year"
                                                required>
                                                <option class="select-one" value="" disabled selected>Año</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="step-item displaynone" id="employed_since_step_item">
                                        <label for="employed_since">Emplyoed since</label>
                                        <div class="stepitem-inputs-container">
                                            <select class="form-input date-select" id="employedMonth"
                                                onclick="checkCustomSelect('employedMonth')" name="employed_month"
                                                required>
                                                <option class="select-one" value="" disabled selected>Mes</option>
                                            </select>
                                            <select class="form-input date-select" id="employedYear"
                                                onclick="checkCustomSelect('employedYear')" name="employed_year"
                                                required>
                                                <option class="select-one" value="" disabled selected>Año</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="step-item displaynone" id="employer_step_item">
                                        <label for="employer">Empresa</label>
                                        <input class="step-input" type="text" name="employer" id="employer"
                                            onfocusout="validateInput('employer')" placeholder="Empresa...">
                                    </div>
                                    <div class="step-item">
                                        <label for="has_loan">¿Ya cuentas con un préstamo?</label>
                                        <div class="custom-select" id="has_loan-div"
                                            onclick="checkSelect('has_loan-div')">
                                            <select id="has_loan" name="has_loan" required>
                                                <option onclick="checkSelect('has_loan-div')" value="Seleccione uno"
                                                    class="select-one" id="select-one">
                                                    Seleccione uno</option>
                                                <option onclick="checkSelect('has_loan-div')" value="0"
                                                    class="option-hover">No
                                                </option>
                                                <option onclick="checkSelect('has_loan-div')" value="1"
                                                    class="option-hover">
                                                    Yes
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="step-item displaynone" id="debt_amount_step_item">
                                        <label for="debt_amount">¿Cuál es el monto de la deuda? $</label>
                                        <input class="step-input" type="number" name="debt_amount" id="debt_amount"
                                            onfocusout="validateInput('debt_amount')" placeholder="Llene este campo...">
                                    </div>
                                    <div class="step-item">
                                        <label for="car">¿Tienes un auto a tu nombre?</label>
                                        <div class="custom-select" id="car-div" onclick="checkSelect('car-div')">
                                            <select id="car" name="car" required>
                                                <option onclick="checkSelect('car-div')" value="Seleccione uno"
                                                    class="select-one" id="select-one">
                                                    Seleccione uno</option>
                                                <option onclick="checkSelect('car-div')" value="no"
                                                    class="option-hover">No
                                                </option>
                                                <option onclick="checkSelect('car-div')" value="yes"
                                                    class="option-hover">
                                                    Si
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="step-item displaynone" id="hascard_step_item">
                                        <label for="has_credit_card">¿Tienes tarjeta de crédito?</label>
                                        <div class="custom-select" id="has_credit_card-div"
                                            onclick="checkSelect('has_credit_card-div')">
                                            <select id="has_credit_card" name="has_credit_card" required>
                                                <option onclick="checkSelect('has_credit_card-div')"
                                                    value="Seleccione uno" class="select-one" id="select-one">
                                                    Seleccione uno</option>
                                                <option onclick="checkSelect('has_credit_card-div')" value="0"
                                                    class="option-hover">No
                                                </option>
                                                <option onclick="checkSelect('has_credit_card-div')" value="1"
                                                    class="option-hover">
                                                    Si
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="step-item step-item-checkbox">
                                        <input type="checkbox" class="input-checkbox" name="policy" id="policy"
                                            onclick="selectCheckbox('policy-p')">
                                        <label for="policy" id="policy-p" onclick="selectCheckbox('policy-p')">He leído
                                            y acepto el <a href="./politicas.php"> aviso de privacidad</a> así como
                                            tratamiento de mis datos personales
                                            y patrimoniales.
                                            .</label>
                                    </div>
                                    <div class="step-item step-item-checkbox">
                                        <input type="checkbox" class="input-checkbox" name="terms" id="terms"
                                            onclick="selectCheckbox('terms-p')">
                                        <label for="terms" id="terms-p" onclick="selectCheckbox('terms-p')">Asimismo,
                                            acepto los <a href="./normas.php">Términos y Condiciones</a></label>
                                    </div>
                                    <div class="step-item sc-button-container">
                                        <div></div>
                                        <button type="button" class="btn-primary" id="last-btn"  onclick="nextStep(1)">Obtener
                                            dinero</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="./dates.js"></script>
    <script src="./register-scripts.js"></script>
</body>

</html>