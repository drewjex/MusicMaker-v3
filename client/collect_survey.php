<?php

$servername = $_ENV["OPENSHIFT_MYSQL_DB_HOST"];
$port = $_ENV["OPENSHIFT_MYSQL_DB_PORT"];
$username = "adminCpwwAJI";
$password = "5wr47DhpZtzz";

try {
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=music", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$data = json_decode(stripslashes($_POST['data']), true);

// prepare sql and bind parameters
$stmt = $conn->prepare("INSERT INTO results (question1, question2, question3, question4, question5, question6) 
VALUES (:question1, :question2, :question3, :question4, :question5, :question6)");
$stmt->bindParam(':question1', $question1);
$stmt->bindParam(':question2', $question2);
$stmt->bindParam(':question3', $question3);
$stmt->bindParam(':question4', $question4);
$stmt->bindParam(':question5', $question5);
$stmt->bindParam(':question6', $question6);

// insert a row
$question1 = json_encode(array("q1" => $data['q1_1'], "q2" => $data['q1_2']));
$question2 = json_encode(array("q1" => $data['q2_1'], "q2" => $data['q2_2']));
$question3 = $data['q3'];
$question4 = $data['q4'];
$question5 = $data['q5'];
$question6 = $data['q6'];
$stmt->execute();

//redirect to thankyou page
header("Location: /musicmaker/client/thankyou.php");
die();

?>