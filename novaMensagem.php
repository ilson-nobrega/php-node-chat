<?php
/**
 * @author Ilson Nóbrega <ilson@inobrega.com.br>
 * @since 25/08/2015 - 14:49.
 */
	include_once('lib/bd.php' );

	$pdo = Database::getInstance()->getPdoObject();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $name = $_POST['nome'];
    $message = $_POST['mensagem'];

    $sql = "INSERT INTO message(name, message) VALUES (:name, :message)";

	$query = $pdo->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':message', $message, PDO::PARAM_STR);
    $query->execute();
?>