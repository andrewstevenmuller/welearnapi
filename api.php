<?php
require __DIR__."/MySQL.php";

if(isset($_POST["action"])) {
  switch($_POST["action"]) {
    case 'login':
      login_user();
      break;
  }
}

function login_user() {
  if(isset($_POST["email"]) && isset($_POST["password"])) {
    $usr_id = getID($_POST["email"], $_POST["password"]);

    if($usr_id == -1) {
      echo "Failed to login";
    } else {
      echo "Logged in!";
    }
  }
}

?>
