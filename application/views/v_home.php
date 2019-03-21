<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"  content="IE=edge">
    <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="description"            content="Avaya Persiguiendo Tormentas">
    <meta name="keywords"               content="Avaya Persiguiendo Tormentas">
    <meta name="robots"                 content="Index,Follow">
    <meta name="date"                   content="March 18, 2019"/>
    <meta name="language"               content="en">
    <meta name="theme-color"            content="#FFFFFF">
	<title>Avaya Persiguiendo Tormentas</title>
    <link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/favicon.png">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>metric.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_CSS?>style.css?v=<?php echo time();?>">
</head>
<body>
    <div class="js-header jm-absolute">
        <div class="js-header--container">
            <div class="js-header--right">
                <img src="<?php echo RUTA_IMG?>logo/orbe.png">
            </div>
        </div>
    </div>
    <section id="home">
        <div class="js-fondo"></div>
        <div class="js-container jm-home">
            <div class="js-home js-flex">
                <div class="js-contenido">
                    <h2>Persiguiendo tormentas</h2>
                    <p>Un evento de tendencias globales</p>
                </div>
            </div>
        </div>
    </section>
    <section id="register" class="js-section">
        <div class="js-container">
            <div class="js-information">
                <h1>El <strong>ORBE</strong> ofrece a sus clientes soluciones tecnol&oacute;gicas innovadoras, basadas en el portafolio de l&iacute;deres de la industria como Hewlett Packard Enterprise y AVAYA, para apoyarles en su proceso de transformaci&oacute;n y en su capacidad para tomar mejores decisiones y generar mayores resultados para su negocio.</h1>
                <h2>Jueves 28 de Marzo, 2019</h2>
                <h3>Hora de inicio: 6:00 p.m.</h3>
                <p>Restaurante La Cumbre</p>
                <span>Km. 7.5 El Hatillo, Tegucigalpa FM1100, Honduras</span>
                <h4>Un evento de</h4>
                <img src="<?php echo RUTA_IMG?>logo/logo-orbe.png">
            </div>
            <div class="js-title">
                <h2>Reg&iacute;strese completando el siguiente formulario</h2>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="js-input">
                        <label for="text">Nombre*</label>
                        <input type="text" id="name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="js-input">
                        <label for="text">Apellido*</label>
                        <input type="text" id="surname">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="js-input">
                        <label for="text">Email*</label>
                        <input type="text" id="email" >
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="js-input">
                        <label for="text">Tel&eacute;fono*</label>
                        <input type="text" id="phone">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                     <div class="js-input">
                        <label for="text">Empresa*</label>
                        <input type="text" id="company" >
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="js-input">
                        <label for="text">Cargo*</label>
                        <input type="text" id="position">
                    </div>
                </div>
            </div>
            <div class="js-section--button text-center">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect js-button js-login" onclick="sendInformation()">Enviar</button>
            </div>
            <div id="confirmation" class="js-confirmation">
                <h2>Registro realizado correctamente. Lo esperamos</h2>
            </div>
        </div>
    </section>
    <footer class="js-section p-t-20 p-b-20">
        <div class="js-container text-center">
            <p>&copy;2019 Avaya Inc.</p>
        </div>
    </footer>

    <div class="modal fade" id="ModalLibro" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-sm jm-modal" role="document">
			<div class="modal-content">
				<div class="mdl-card">
					<div class="mdl-card__title p-b-0">
						<h2></h2>
					</div>
					<div class="mdl-card__supporting-text p-t-0">
						<p></p>
					</div>
                    <div class="mdl-card__menu">
                        <button class="mdl-button mdl-js-button mdl-button--icon" data-dismiss="modal">
                            <i class="mdi mdi-close"></i>
                        </button>
                    </div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>jsindex.js?v=<?php echo time();?>"></script>
    <script type="text/javascript">
        // var URLactual = window.location;
        // if(URLactual['href'] != 'http://www.marketinghp.net/microsite/DCN/evento_cr/'){
        //     location.href = 'http://www.marketinghp.net/microsite/DCN/evento_cr/';
        // }
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
            $('select').selectpicker('mobile');
        } else {
            $('select').selectpicker();
        }
    </script>
</body>
</html>