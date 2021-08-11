<?php

require_once '../../controllers/formulariosControlador.php';
require_once '../../models/formulariosModelo.php';

class AjaxForms {

	public $validaEmail;

	public function validaEmailAjax(){

		$columna = "email";
		$value = $this->validaEmail;

		$resul = ControladorFormularios::ctrSeleccionarRegistros($columna, $value);

		echo json_encode($resul);

	}

}

if(isset($_POST['validaEmail'])){
	$vEmail = new AjaxForms();
	$vEmail->validaEmail = $_POST['validaEmail'];
	$vEmail->validaEmailAjax();
}