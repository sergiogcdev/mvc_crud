<?php

//Llamada a controllers para que estos monten las plantillas

require_once 'controllers/plantillaControlador.php';
require_once 'controllers/formulariosControlador.php';
require_once 'models/formulariosModelo.php';

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();