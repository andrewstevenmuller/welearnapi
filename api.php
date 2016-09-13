<?php
require __DIR__."/MySQL.php";

if(isset($_POST["action"])) {
  switch($_POST["action"]) {
    case 'login':
      login_user();
      break;
    case 'register';
      register_user();
      break;
  }
}

function login_user() {
  if(isset($_POST["email"]) && isset($_POST["password"])) {
    $usr_id = getID($_POST["email"], $_POST["password"]);

    if($usr_id == -1) {
	     echo "<meta http-equiv='refresh' content='1;url=http://localhost:8100/#/error'>";
    } else {
      echo "<meta http-equiv='refresh' content='1;url=http://localhost:8100/#/mainMenu'>";
    }
  }
}

function register_user(){
	if(	isset($_POST["name"]) && 
		isset($_POST["surname"]) && 
		isset($_POST["email1"]) && 
		isset($_POST["grade"]) && 
		isset($_POST["school"]) && 
		isset($_POST["role"]) && 
		isset($_POST["password1"])) {

			$usr_reg = reg_user($_POST["name"], 
					    $_POST["surname"], 
		                            $_POST["email1"], 
		                            $_POST["grade"], 
		                            $_POST["school"], 
		                            $_POST["role"], 
		                            $_POST["password1"]);

    	if($usr_reg == -1) {
      		echo "<meta http-equiv='refresh' content='1;url=http://localhost:8100/#/signup'>";
    	} 
	else {
      		echo "<meta http-equiv='refresh' content='1;url=http://localhost:8100/#/login'>";
    	}
  	}
}

?>
