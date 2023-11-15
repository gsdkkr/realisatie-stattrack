<?php

  session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | StatTrackers</title>

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
          <?php

            if(!empty($_SESSION['userInfo'])) {
          ?>
              <li class="nav-item">
                <a class="nav-link" href="../profile">Profiel</a>
              </li>
          <?php
            }

          ?>
        </ul>
        <div class="d-flex">
        <?php

          if(!empty($_SESSION['userInfo'])) {
          ?>
            <a href="../logout"><button class="btn btn-danger">Log Uit</button></a>
          <?php
          } else {
          ?>
            <a href="../login"><button class="btn btn-primary">Log In</button></a>
          <?php
          }

        ?>
        </div>
      </div>
    </div>
  </nav>

  <?php

    if(isset($_GET['error'])) {
      $err = $_GET["error"];

      if ($err == "login") {
        echo '
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div>Email en/of wachtwoord is incorrect!</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        ';
      } else if ($err = "register") {
        echo '
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Gebruiker bestaat al!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        ';
      }
    }

  ?>

  <main class="container">
    <section class="row">
      <form class="col" method="POST" action="./register.php">
        <h1>Registreren</h1>

        <label class="form-label" for="voornaam">Voornaam: </label>
        <input class="form-control" type="text" id="voornaam" name="voornaam" required>

        <label class="form-label" for="achternaam">Achternaam: </label>
        <input class="form-control" type="text" id="achternaam" name="achternaam" required>

        <label class="form-label" for="geboorteDatum">Geboorte Datum: </label>
        <input class="form-control" type="date" id="geboorteDatum" name="geboorteDatum" required>

        <label class="form-label" for="nationaliteit">Nationaliteit: </label>
        <input class="form-control" type="text" id="nationaliteit" name="nationaliteit" required>

        <label class="form-label" for="email">Email: </label>
        <input class="form-control" type="email" id="email" name="email" required>

        <label class="form-label" for="wachtwoord">Wachtwoord: </label>
        <input class="form-control" type="password" id="wachtwoord" name="wachtwoord" required>
        
        <button class="btn btn-primary mt-3" type="submit" name="registreren">Registreren</button>
      </form>

      <form class="col border-start" method="POST" action="./login.php">
        <h1>Inloggen</h1>

        <label class="form-label" for="email">Email: </label>
        <input class="form-control" type="email" id="email" name="email" required>

        <label class="form-label" for="wachtwoord">Wachtwoord: </label>
        <input class="form-control" type="password" id="wachtwoord" name="wachtwoord" required>
        
        <button class="btn btn-primary mt-3" type="submit" name="inloggen">Log In</button>
      </form>
    </section>
  </main>

</body>
</html>