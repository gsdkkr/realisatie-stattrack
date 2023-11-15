<?php

  session_start();

  require "../db.php";

  if(empty($_SESSION['userInfo'])) {
    header("Location: ../");
    die(); 
  }

  $userID = "";

  foreach($_SESSION['userInfo'] as $user) {
    $userID = $user;
  }

  $db = new DatabaseConnection();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profiel | StatTrackers</title>

  <?php include "../bootstrap.php"; ?>
</head>
<body>
  
  <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">  
    <div class="container-fluid">
      <a class="navbar-brand" href="../">StatTrackers</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="../">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./profile">Profiel</a>
          </li>
        </ul>
        <div class="d-flex">
          <a href="../logout"><button class="btn btn-danger">Log Uit</button></a>
        </div>
      </div>
    </div>
  </nav>

  <?php

    if (isset($_POST["save"])) {
      $voornaam = $_POST["voornaam"];
      $achternaam = $_POST["achternaam"];
      $geboorteDatum = $_POST["geboortedatum"];
      $nationaliteit = $_POST["nationaliteit"];

      $db->query(
        "UPDATE `player` SET `FirstName` = :firstname, `LastName` = :lastname, `DateOfBirth` = :dateofbirth, `Nationality` = :nationality WHERE `PlayerID` = :playerid",
        true,
        array(
          'firstname' => $voornaam,
          'lastname' => $achternaam,
          'dateofbirth' => $geboorteDatum,
          'nationality' => $nationaliteit,
          'playerid' => $userID,
        )
      );

      echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <div>Aanpassingen opgeslagen!</div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      ';
    }
  
    $result = $db->query(
      "SELECT Email, FirstName, LastName, DateOfBirth, Nationality FROM player WHERE PlayerID = :playerid",
      true,
      array(
        'playerid' => $userID,
      )
    );

    foreach($result as $res) {
      ?>
        <form method="POST" class="container">

          <label for="email" class="col-sm-2 col-form-label">Email:</label>
          <input type="text" class="form-control" name="email" value="<?php echo $res["Email"] ?>" disabled readonly>

          <label for="voornaam" class="col-sm-2 col-form-label">Voornaam:</label>
          <input type="text" class="form-control" name="voornaam" value="<?php echo $res["FirstName"] ?>">

          <label for="achternaam" class="col-sm-2 col-form-label">Achternaam:</label>
          <input type="text" class="form-control" name="achternaam" value="<?php echo $res["LastName"] ?>">

          <label for="geboortedatum" class="col-sm-2 col-form-label">Geboorte datum:</label>
          <input type="date" class="form-control" name="geboortedatum" value="<?php echo $res["DateOfBirth"] ?>">

          <label for="nationaliteit" class="col-sm-2 col-form-label">Nationaliteit:</label>
          <input type="text" class="form-control" name="nationaliteit" value="<?php echo $res["Nationality"] ?>">

          <button class="btn btn-secondary mt-3" type="submit" name="save">Sla aanpassingen op</button>
        </form>
      <?php
    }

  ?>

</body>
</html>