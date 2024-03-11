<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="credit-media.css" />
    <link rel="stylesheet" href="links.css">
    <title>Credito-MX</title>


    <!-- tagmanager -->
    <script type="text/javascript">
    (function(w, c, t, u) {
        w._wct = w._wct || {};
        w._wct = u;
        var s = c.createElement(t);
        s.type = 'text/javascript';
        s.async = true;
        s.src = 'https://wct-2.com/wct.js?type=session';
        var r = c.getElementsByTagName(t)[0];
        r.parentNode.insertBefore(s, r);
    }(window, document, 'script', {
        'uid': 'hwANyg',
        'page_mutations': true,
        'proxy': 'https://wct-2.com',
        'auto_tagging': true
    }));
    </script>

    <link rel="preload" href="https://wct-2.com/wct.js?type=session" as="script">



    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-WNQSCPC3');
    </script>
    <!-- End Google Tag Manager -->



</head>

<body>


    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WNQSCPC3" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <header class="header">
        <div class="header-container">
            <a href="#">
                <img src="img/main-logo.svg" alt="" class="logo">
            </a>


        </div>
    </header>



    <div class="progress-section">

        <div class="container container-border">
            <h2 class="progress-h2">El proceso de tu solicitud ha empezado</h2>
            <div class="progress-h3">Estamos ultimando tus cotizaciones...</div>

            <div class="progress"></div>
            <div class="center-box">
                <div class="progress-box">
                    <div class="progress-info" id="progressinfo1">
                        <img src="img/green-check.svg" alt="">
                        <p class="progress-check">Buscando las mejores ofertas desde tu aplicación</p>
                    </div>
                    <div class="progress-info" id="progressinfo2">
                        <img src="img/green-check.svg" alt="">
                        <p class="progress check">Comparación de cotizaciones de ofertas</p>
                    </div>
                    <div class="progress-info" id="progressinfo3">
                        <img src="img/green-check.svg" alt="">
                        <p class="progress check">Comprobando las mejores opciones para ti</p>
                    </div>
                </div>
            </div>
        </div>




    </div>


    <script>
    /* 
     * (class)Progress<nowValue, minValue, maxValue>
     */

    //helper function-> return <DOMelement>
    function elt(type, prop, ...childrens) {
        let elem = document.createElement(type);
        if (prop) Object.assign(elem, prop);
        for (let child of childrens) {
            if (typeof child == "string") elem.appendChild(document.createTextNode(child));
            else elem.appendChild(elem);
        }
        return elem;
    }

    //Progress class
    class Progress {
        constructor(now, min, max, options) {
            this.dom = elt("div", {
                className: "progress-bar"
            });
            this.min = min;
            this.max = max;
            this.intervalCode = 0;
            this.now = now;
            this.syncState();
            if (options.parent) {
                document.querySelector(options.parent).appendChild(this.dom);
            } else document.body.appendChild(this.dom)
        }

        syncState() {
            this.dom.style.width = this.now + "%";
        }

        startTo(step, time) {
            if (this.intervalCode !== 0) return;
            this.intervalCode = setInterval(() => {
                console.log("sss")
                if (this.now + step > this.max) {
                    this.now = this.max;
                    this.syncState();
                    clearInterval(this.interval);
                    this.intervalCode = 0;
                    return;
                }
                this.now += step;
                this.syncState()
            }, time)
        }
        end() {
            this.now = this.max;
            clearInterval(this.intervalCode);
            this.intervalCode = 0;
            this.syncState();
        }
    }


    let pb = new Progress(15, 0, 100, {
        parent: ".progress"
    });

    //arg1 -> step length
    //arg2 -> time(ms)
    pb.startTo(5, 150);

    //end to progress after 5s
    setTimeout(() => {
        pb.end()
    }, 5000)
    </script>




    <div id="link-main" class="link-main">
        <div class="links-section">
            <div class="h1-div">
                <img src="img/info.svg" alt="" class="info-logo">
                <h1 class="h1-links">Recomendamos postularse para 3 o más compañías crediticias. Es la mejor manera de
                    aumentar sus posibilidades de obtener la aprobación de un préstamo hasta en un 100%</h1>
            </div>
            <div class="links-container">




                <a class="links-a" href="https://rdr.pdlsd.net/in/offer/3470?aid=106155" target="_blank">
                    <div class="link-box">
                        <div class="links-flex">
                            <div class="bank-div">
                                <img src="img/13-finzmo.svg" alt="" class="bank-logo" />
                            </div>
                            <div class="bank-info">

                                <div class="bank-list">
                                    <div class="bank-value">
                                        <p class="bank-p">Importe hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">25 000</p>
                                            <p class="bank-p">$</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">Probabilidad de aprobación</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">91</p>
                                            <p class="bank-p">%</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">a devolver hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">30</p>
                                            <p class="bank-p"> días</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-link">Obtener dinero</button>
                        </div>
                    </div>
                </a>
                <a class="links-a" href="https://rdr.pdlsd.net/in/offer/6319?aid=106155/" target="_blank">
                    <div class="link-box">
                        <div class="links-flex">
                            <div class="bank-div">
                                <img src="img/3-credito-365-mx.svg" alt="" class="bank-logo" />
                            </div>
                            <div class="bank-info">

                                <div class="bank-list">
                                    <div class="bank-value">
                                        <p class="bank-p">Importe hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">20 000</p>
                                            <p class="bank-p">$</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">Probabilidad de aprobación</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">94</p>
                                            <p class="bank-p">%</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">a devolver hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">48</p>
                                            <p class="bank-p">meses</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-link">Obtener dinero</button>
                        </div>
                    </div>
                </a>


                <a class="links-a" href="https://rdr.pdlsd.net/in/offer/1744?aid=106155" target="_blank">
                    <div class="link-box">
                        <div class="links-flex">
                            <div class="bank-div">
                                <img src="img/4-solcredito.svg" alt="" class="bank-logo" />
                            </div>
                            <div class="bank-info">

                                <div class="bank-list">
                                    <div class="bank-value">
                                        <p class="bank-p">Importe hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">1000</p>
                                            <p class="bank-p">$</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">Probabilidad de aprobación</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">98</p>
                                            <p class="bank-p">%</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">a devolver hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">30</p>
                                            <p class="bank-p"> días</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-link">Obtener dinero</button>
                        </div>
                    </div>
                </a>



                <a class="links-a" href="https://rdr.pdlsd.net/in/offer/3219?aid=106155" target="_blank">
                    <div class="link-box">
                        <div class="links-flex">
                            <div class="bank-div">
                                <img src="img/9-fidea.svg" alt="" class="bank-logo" />
                            </div>
                            <div class="bank-info">

                                <div class="bank-list">
                                    <div class="bank-value">
                                        <p class="bank-p">Importe hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">150 000</p>
                                            <p class="bank-p">$</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">Probabilidad de aprobación</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">86</p>
                                            <p class="bank-p">%</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">a devolver hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">36</p>
                                            <p class="bank-p"> meses</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-link">Obtener dinero</button>
                        </div>
                    </div>
                </a>

                <a class="links-a" href="https://rdr.pdlsd.net/in/offer/2724?aid=106155" target="_blank">
                    <div class="link-box">
                        <div class="links-flex">
                            <div class="bank-div">
                                <img src="img/6-kreditiweb.svg" alt="" class="bank-logo" />
                            </div>
                            <div class="bank-info">

                                <div class="bank-list">
                                    <div class="bank-value">
                                        <p class="bank-p">Importe hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">50 000</p>
                                            <p class="bank-p">$</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">Probabilidad de aprobación</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">91</p>
                                            <p class="bank-p">%</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">a devolver hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">30</p>
                                            <p class="bank-p"> días</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-link">Obtener dinero</button>
                        </div>
                    </div>
                </a>
                <a class="links-a" href="https://rdr.pdlsd.net/in/offer/3288?aid=106155/" target="_blank">
                    <div class="link-box">
                        <div class="links-flex">
                            <div class="bank-div">
                                <img src="img/2-askrobin-logo.svg" alt="" class="bank-logo" />
                            </div>
                            <div class="bank-info">

                                <div class="bank-list">
                                    <div class="bank-value">
                                        <p class="bank-p">Importe hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">40 000</p>
                                            <p class="bank-p">$</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">Probabilidad de aprobación</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">92</p>
                                            <p class="bank-p">%</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">a devolver hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">36</p>
                                            <p class="bank-p">meses</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-link">Obtener dinero</button>
                        </div>
                    </div>
                </a>

                <a class="links-a" href="https://rdr.pdlsd.net/in/offer/2554?aid=106155" target="_blank">
                    <div class="link-box">
                        <div class="links-flex">
                            <div class="bank-div">
                                <img src="img/5-cashrush.svg" alt="" class="bank-logo" />
                            </div>
                            <div class="bank-info">

                                <div class="bank-list">
                                    <div class="bank-value">
                                        <p class="bank-p">Importe hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">100 000</p>
                                            <p class="bank-p">$</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">Probabilidad de aprobación</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">90</p>
                                            <p class="bank-p">%</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">a devolver hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">36</p>
                                            <p class="bank-p"> meses</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-link">Obtener dinero</button>
                        </div>
                    </div>
                </a>


                <a class="links-a" href="https://rdr.pdlsd.net/in/offer/2777?aid=106155" target="_blank">
                    <div class="link-box">
                        <div class="links-flex">
                            <div class="bank-div">
                                <img src="img/7-lendon.mx.svg" alt="" class="bank-logo" />
                            </div>
                            <div class="bank-info">

                                <div class="bank-list">
                                    <div class="bank-value">
                                        <p class="bank-p">Importe hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">15 500</p>
                                            <p class="bank-p">$</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">Probabilidad de aprobación</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">93</p>
                                            <p class="bank-p">%</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">a devolver hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">30</p>
                                            <p class="bank-p"> días</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-link">Obtener dinero</button>
                        </div>
                    </div>
                </a>


                <a class="links-a" href="https://rdr.pdlsd.net/in/offer/3183?aid=106155" target="_blank">
                    <div class="link-box">
                        <div class="links-flex">
                            <div class="bank-div">
                                <img src="img/10-dineromon.svg" alt="" class="bank-logo" />
                            </div>
                            <div class="bank-info">

                                <div class="bank-list">
                                    <div class="bank-value">
                                        <p class="bank-p">Importe hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">12 000</p>
                                            <p class="bank-p">$</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">Probabilidad de aprobación</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">95</p>
                                            <p class="bank-p">%</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">a devolver hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">30</p>
                                            <p class="bank-p"> días</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-link">Obtener dinero</button>
                        </div>
                    </div>
                </a>
                <a class="links-a" href="https://rdr.pdlsd.net/in/offer/3336?aid=106155" target="_blank">
                    <div class="link-box">
                        <div class="links-flex">
                            <div class="bank-div">
                                <img src="img/11-escampa.svg" alt="" class="bank-logo">
                            </div>
                            <div class="bank-info">

                                <div class="bank-list">
                                    <div class="bank-value">
                                        <p class="bank-p">Importe hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">100 000</p>
                                            <p class="bank-p">$</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">Probabilidad de aprobación</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">90</p>
                                            <p class="bank-p">%</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">a devolver hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">36</p>
                                            <p class="bank-p"> meses</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-link">Obtener dinero</button>
                        </div>
                    </div>
                </a>
                <a class="links-a" href="https://rdr.pdlsd.net/in/offer/3394?aid=106155" target="_blank">
                    <div class="link-box">
                        <div class="links-flex">
                            <div class="bank-div">
                                <img src="img/12-finloo.svg" alt="" class="finloo" />
                            </div>
                            <div class="bank-info">

                                <div class="bank-list">
                                    <div class="bank-value">
                                        <p class="bank-p">Importe hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">30 000 </p>
                                            <p class="bank-p">$</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">Probabilidad de aprobación</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">87</p>
                                            <p class="bank-p">%</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">a devolver hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">30</p>
                                            <p class="bank-p"> días</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-link">Obtener dinero</button>
                        </div>
                    </div>
                </a>
                <a class="links-a" href="https://rdr.fmcgsd.net/in/offer/1966?aid=106155" target="_blank">
                    <div class="link-box">
                        <div class="links-flex">
                            <div class="bank-div">
                                <img src="img/1-dineria.svg" alt="" class="bank-logo" />
                            </div>
                            <div class="bank-info">

                                <div class="bank-list">
                                    <div class="bank-value">
                                        <p class="bank-p">Importe hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">30 000</p>
                                            <p class="bank-p">$</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">Probabilidad de aprobación</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">95</p>
                                            <p class="bank-p">%</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">a devolver hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">24</p>
                                            <p class="bank-p">meses</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-link">Obtener dinero</button>
                        </div>
                    </div>
                </a>

                <a class="links-a" href="https://rdr.pdlsd.net/in/offer/3020?aid=106155">
                    <div class="link-box">
                        <div class="links-flex">
                            <div class="bank-div">
                                <img src="img/8-vivus.svg" alt="" class="bank-logo" />
                            </div>
                            <div class="bank-info">

                                <div class="bank-list">
                                    <div class="bank-value">
                                        <p class="bank-p">Importe hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">10 000</p>
                                            <p class="bank-p">$</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">Probabilidad de aprobación</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">88</p>
                                            <p class="bank-p">%</p>
                                        </div>
                                    </div>
                                    <div class="bank-value">
                                        <p class="bank-p">a devolver hasta</p>
                                        <div class="bank-money">
                                            <p class="bank-p2">30</p>
                                            <p class="bank-p"> días</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-link">Obtener dinero</button>
                        </div>
                    </div>
                </a>


            </div>
        </div>
        <footer>
            <div class="footer-container">
                <div class="footer-menu">
                    <div class="footer-box">
                        <p class="footer-p">Compañía</p>
                        <div class="pages">
                            <p class="pages-p"><a href="/about-us.html">Sobre nosotras</a></p>
                            <p class="pages-p"><a href="/politicas.html">Políticas</a></p>
                            <p class="pages-p"><a href="/normas.html">Normas</a></p>
                            <p class="pages-p"><a href="/acuerdos.html">Acuerdos</a></p>
                        </div>
                    </div>

                    <div class="footer-box">
                        <p class="footer-p">Información</p>
                        <div class="pages">
                            <p class="pages-p pages-p2">
                                credito-mx.com - es un servicio online gratuito dedicado a conectarte con las mejores
                                opciones de
                                préstamo
                                en el mercado. El periodo mínimo de liquidación de la deuda es de 61 días , el periodo
                                máximo de
                                liquidación de 120 días. La tasa de interés Efectiva Anual es de hasta 28,98% + IVA. Los
                                intereses
                                varían
                                según el prestamista, el interés propuesto dependerá de tus circunstancias e historial
                                crediticio. La
                                página actual no es una entidad financiera, un banco o un prestamista. El servicio
                                credito-mx escoge
                                préstamos para clientes haciendo de intermediario entre los clientes que quieren recibir
                                un préstamo y
                                las
                                instituciones financieras licenciadas. El servicio no se hace responsable de los
                                acuerdos crediticios.
                                La
                                página actual no cobra por el servicio ni tampoco se hace responsable de las acciones,
                                incumplimientos o
                                tasas de interés de cualquier prestamista. No estás obligado a usar los servicios de
                                credito-mx ni
                                contactar o solicitar un préstamo a los prestamistas que aparecen en esta página.
                            </p>
                        </div>
                    </div>
                </div>
                <p class="copyright-p">
                    credito-mx.com ©2024 - todos los derechos registrados.
                </p>
            </div>
        </footer>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initially, hide the 'link-main' section
        var linkMain = document.getElementById('link-main');
        linkMain.style.display = 'none';

        // Set a timeout for 3 seconds
        setTimeout(function() {
            // After 3 seconds, hide the 'progress-section' and show the 'link-main'
            var progressSection = document.querySelector('.progress-section');
            progressSection.style.display = 'none'; // hides the progress section
            linkMain.style.display = 'block'; // shows the link main section
        }, 4000);
    });
    </script>







</body>

<script src="stepper.js"></script>

</html>