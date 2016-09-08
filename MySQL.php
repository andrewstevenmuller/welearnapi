<?php
define("HOST", "172.16.38.210");
define("USER", "root");
define("PASS", "");
define("DB", "we_learn");

function _ConString() {
  $conn = new mysqli(HOST, USER, PASS, DB);

  if ($conn->connect_error) {
    echo "Cannot connect to db! " . $conn->connect_error;
    return NULL;
  }
  return $conn;
}

function getID($user, $pass) {
  $con = _ConString();

  $sql = "SELECT user_id FROM users WHERE user_email = '". $con->escape_string($user) ."' AND user_password = '". $con->escape_string($pass) ."'";
  $result = $con->query($sql);

  if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $con->close();
    return $row["user_id"];
  }
  $con->close();
  return -1;
}

function reg_user($user_name, $user_surname, $user_email, $user_grade, $user_school, $user_role, $user_password){
	$con = _ConString();
	$sql = "INSERT INTO users (user_name, user_surname, user_email, user_grade, user_school, user_role, user_password) VALUES ('". $con->escape_string($user_name) ."', '". $con->escape_string($user_surname) ."', '". $con->escape_string($user_email) ."', '". $con->escape_string($user_grade) ."', '". $con->escape_string($user_school) ."', '". $con->escape_string($user_role) ."', '". $con->escape_string($user_password) ."')";
	
	if ($con->query($sql) === TRUE) {
    		echo "New record created successfully";
	} else {
    		echo "Error: " . $sql . "<br>" . $con->error;
	}
	$con->close();	
}
?>
