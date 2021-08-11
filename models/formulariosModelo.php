<?php

require_once 'connection.php';

class ModeloFormularios {
	public static function mRegistro($tabla, $datos){
		$con = new Connection();

		$stmt = $con->prepare("INSERT INTO $tabla(token, nombre,email,password) VALUES (:token, :nombre, :email, :password)");

		$stmt->bindParam(':token', $datos['token'], PDO::PARAM_STR);		
		$stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(':email', $datos['email'], PDO::PARAM_STR);
		$stmt->bindParam(':password', $datos['password'], PDO::PARAM_STR);

		if($stmt->execute()) return 'OK';
		
		print_r($con->errorInfo());

		$stmt->close();
		$stmt = null;

	}

	public static function mSeleccionarRegistros($tabla,$columna,$valor){
		$con = new Connection();

		if($columna == null && $valor == null) {

			$stmt = $con->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();

		}

		else {
			$stmt = $con->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla WHERE $columna = :$columna");
			$stmt->bindParam(":$columna", $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
		}

		$stmt->close();
		$stmt = null;

	}

	public static function mActualizarRegistro($tabla, $datos){

		$con = new Connection();

		$stmt = $con->prepare("UPDATE $tabla SET token = :token, nombre = :nombre, email = :email, password = :password WHERE id = :id");
		
		$stmt->bindParam(":token", $datos['token'], PDO::PARAM_STR);		
		$stmt->bindParam(":id", $datos['id'], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos['password'], PDO::PARAM_STR);
		
		if($stmt->execute()) return "OK";

		$stmt->close();
		$stmt = null;

		return "ERROR";

	}

	public static function mEliminaRegistro($tabla, $value) {
		$con = new Connection();
		
		$stmt = $con -> prepare("DELETE FROM $tabla WHERE token = :token");
		$stmt -> bindParam(":token", $value, PDO::PARAM_STR);

		if($stmt->execute()) return "OK";

		$stmt->close();
		$stmt = null;

		return "ERROR";
	}

	public static function mActualizaIntentos($tabla, $intentos, $token){
		$con = new Connection();
		
		$stmt = $con -> prepare("UPDATE $tabla SET intentos_fallidos = :intentos WHERE token = :token");
		
		$stmt -> bindParam(":intentos", $intentos, PDO::PARAM_INT);
		$stmt -> bindParam(":token", $token, PDO::PARAM_STR);

		if($stmt->execute()) return "OK";

		$stmt->close();
		$stmt = null;

		return "ERROR";
	}

}