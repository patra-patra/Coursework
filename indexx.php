<?php


require('D:\Ampps\www\app\database\connect.php');


function getAll($table){
	global $pdo;
	$sql = 'SELECT * FROM glss';

	$query = $pdo->prepare($sql);
	$query->execute();
	$error_info = $query->errorInfo();

	if ($error_info[0] !== PDO::ERR_NONE){
		echo $errInfo[2];
		exit();
	}

	return $query->fetchAll();
}

function search($text, $table){
    global $pdo;

    $sql = "SELECT * FROM $table WHERE name LIKE :query OR brand LIKE :query";
    $stmt = $pdo->prepare($sql);
    $query = '%' . $text . '%';
    $stmt->bindParam(':query', $query, PDO::PARAM_STR);
    $stmt->execute();

    $error_info = $stmt->errorInfo();
    if ($error_info[0] !== PDO::ERR_NONE) {
        echo $error_info[2];
        exit();
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$data = getAll('glss');
$json_data = json_encode($data);

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {

    $data = getAll('glss');
    $json_data = json_encode($data);
    header('Content-Type: application/json');
    echo $json_data;
} 
?>

