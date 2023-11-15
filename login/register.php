<?php

  require "../db.php";

  if(isset($_POST['registreren'])) {
    $email = $_POST["email"];
    $wachtwoord = password_hash($_POST["wachtwoord"], PASSWORD_BCRYPT);
    $voornaam = $_POST["voornaam"];
    $achternaam = $_POST["achternaam"];
    $geboorteDatum = $_POST["geboorteDatum"];
    $nationaliteit = $_POST["nationaliteit"];
    $wachtwoordPlain = $_POST["wachtwoord"];

    $db = new DatabaseConnection();

    $verifyEmail = $db->query(
      "SELECT Email From player WHERE Email = :email",
      true,
      array(
        'email' => $email,
      )
    );

    if ($verifyEmail) {
      header("Location: ../login?error=register");
      die();
    } else {
      $insertQuery = $db->query(
        "INSERT INTO player (PlayerID, Email, Password, FirstName, LastName, DateOfBirth, Nationality, TeamID, PASSWORD_PLAIN)
            VALUES (NULL, :email, :password, :firstname, :lastname, :dateofbirth, :nationality, NULL, :password_plain)
        ",
        true,
        array(
          'email' => $email, 
          'password' => $wachtwoord, 
          'firstname' => $voornaam, 
          'lastname' => $achternaam, 
          'dateofbirth' => $geboorteDatum, 
          'nationality' => $nationaliteit, 
          'password_plain' => $wachtwoordPlain
        )
      );
      
      session_start();

      $lastInsertID = $db->query("SELECT LAST_INSERT_ID() AS PlayerID");
      foreach($lastInsertID as $playerID) {

        $_SESSION['userInfo'] = array(
          "loggedIn" => true,
          "id" => $playerID["PlayerID"],
        );

        header("Location: ../");
        die();
      }
    }
  }

?>