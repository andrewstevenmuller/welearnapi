<?php
define("HOST", "localhost");
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
    return $row["user_id"];
  }

  return -1;
}


?>
