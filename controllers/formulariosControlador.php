<?php
error_reporting(E_ALL ^ E_NOTICE);

class ControladorFormularios {
	public static function ctrRegistro(){
		if(isset($_POST['registroNombre'])){
		if(preg_match('/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1])+$/', $_POST['registroNombre']) && filter_var($_POST['registroEmail'], FILTER_VALIDATE_EMAIL) && 
		preg_match('/^[0-9a-zA-Z]+$/', $_POST['registroPassword'])){
				$tabla = 'registros';
				$token = md5($_POST['registroNombre'].'+'.$_POST['registroEmail']);

				$encriptPassword = crypt($_POST['registroPassword'], '$5$rounds=5000$usesomesillystringforsalt$');

				$datos = [
					'token' => $token,
					'nombre' => $_POST['registroNombre'],
					'email' => $_POST['registroEmail'],
					'password' => $encriptPassword
				];
				$resul = ModeloFormularios::mRegistro($tabla, $datos);
				return $resul;
			}
		else {
			$resul = "ERROR";
			return $resul;
		}
			/*return $_POST['registroNombre'].'<br>'.$_POST['regitroEmail'].'<br>'.
			$_POST['registroPassword'].'<br>';*/
		}
	}
	public static function ctrSeleccionarRegistros($columna, $valor) {
		$tabla = "registros";
		$resul = ModeloFormularios::mSeleccionarRegistros($tabla, $columna, $valor);
		return $resul;
	}

	public function ctrAcceso(){
		if(isset($_POST['ingresoEmail'])){
			$tabla = "registros";
			$columna = "email";
			$valor = $_POST['ingresoEmail'];
			$resul = ModeloFormularios::mSeleccionarRegistros($tabla,$columna,$valor);
			$encriptPassword = crypt($_POST['ingresoPassword'], '$5$rounds=5000$usesomesillystringforsalt$');
			if($resul['email'] == $_POST['ingresoEmail'] && $resul['password'] == $encriptPassword) {
				//echo '<pre>'.print_r($_POST['ingresoEmail'].' '.$_POST['ingresoPassword']).'</pre>';
				//echo '<div class="alert alert-success">Acceso Correcto</div>';
				ModeloFormularios::mActualizaIntentos($tabla, 0, $resul['token']);
				$_SESSION['validaAcceso'] = 'OK';
				echo '<script>window.location="index.php?pagina=inicio";</script>';
			}
			else {
				if($resul['intentos_fallidos'] < 3){
					$intentos = $resul['intentos_fallidos'] + 1;
					ModeloFormularios::mActualizaIntentos($tabla, $intentos, $resul['token']);
				}
				else echo "<div class=\"alert alert-warning\">Debes validar con RECAPTCHA que no eres un robot.</div>";
				echo '<div class="alert alert-danger">Email o Password erróneos.</div>';
			}
		}
	}

	public static function ctrActualizarRegistro(){
		if(isset($_POST['actualizarNombre'])){
			if($_POST['actualizarPassword'] != ""){
				//$password = $_POST['actualizarPassword'];
				if(preg_match('/^[0-9a-zA-Z]+$/', $_POST['actualizarPassword']))
					$password = crypt($_POST['actualizarPassword'], '$5$rounds=5000$usesomesillystringforsalt$');
				else return "ERROR";
			}
			else {
				$password = $_POST['passwordActual'];
			}
			if(preg_match('/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1])+$/', $_POST['actualizarNombre']) && filter_var($_POST['actualizarEmail'], FILTER_VALIDATE_EMAIL)){
				$tabla = "registros";
				$columna = "token";
				$usuario = ModeloFormularios::mSeleccionarRegistros($tabla, $columna, $_POST['tokenUsuario']);
				$tokenComparar = md5($usuario['nombre'].'+'.$usuario['email']);
				if($tokenComparar == $_POST['tokenUsuario'] && $_POST['idUsuario'] == $usuario['id']){
					
					$actualizarToken = md5($_POST['actualizarNombre'].'+'.$_POST['actualizarEmail']);
					$datos = [
						"id" => $_POST['idUsuario'],
						"token" => $actualizarToken,
						"nombre" => $_POST['actualizarNombre'],
						"email" => $_POST['actualizarEmail'],
						"password" => $password
					];
					$resul = ModeloFormularios::mActualizarRegistro($tabla,$datos);
					return $resul;
				}
				else return "ERROR";
				
			}
			else return "ERROR";
		}
	}

	public function ctrEliminaRegistro(){
		if(isset($_POST['eliminaRegistro'])){

			$tabla = "registros";
			$columna = "token";

			$usuario = ModeloFormularios::mSeleccionarRegistros($tabla, $columna, $_POST['eliminaRegistro']);
			$tokenComparar = md5($usuario['nombre'].'+'.$usuario['email']);

			if($tokenComparar == $_POST['eliminaRegistro']){
				
				$value = $_POST['eliminaRegistro'];
				$resul = ModeloFormularios::mEliminaRegistro($tabla, $value);
				if($resul == "OK") {
					echo "<script> window.location = \"inicio\"; </script>";
				}
				if($resul == "ERROR") {
					echo '<div class="alert alert-danger">No se ha podido eliminar.</div>';
				}
			} else {
				echo '<div class="alert alert-danger">No se ha podido eliminar.</div>';
			}

			
		}
	}

}