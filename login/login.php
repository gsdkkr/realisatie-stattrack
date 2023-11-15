<?php

  require "../db.php";

  session_start();

  if(isset($_POST['inloggen'])) {
    $email = $_POST["email"];
    $wachtwoord = $_POST["wachtwoord"];

    $db = new DatabaseConnection();

    $result = $db->query(
      "SELECT PlayerID, Password FROM player WHERE email = :email",
      true,
      array(
        'email' => $email,
      )
    );

    if (empty($result)) {
      header("Location: ../login?error=login");
      die();
    }

    foreach ($result as $res) {

      if (password_verify($wachtwoord, $res["Password"])) {

        $_SESSION['userInfo'] = array(
          "loggedIn" => true,
          "id" => str_replace(
            array("int(", ")"),
            "",
            $res["PlayerID"]
          ),
        );

        header("Location: ../");
        die();
      } else {
        header("Location: ../login?error=login");
        die();
      }

    } 
  }

?>