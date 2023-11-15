<?php
  
  session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home | StatTrackers</title>

  <?php include "./bootstrap.php"; ?>
</head>
<body>
  
  <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="./">StatTrackers</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./">Home</a>
          </li>
          <?php

            if(!empty($_SESSION['userInfo'])) {
          ?>
              <li class="nav-item">
                <a class="nav-link" href="./profile">Profiel</a>
              </li>
          <?php
            }

          ?>
        </ul>
        <div class="d-flex">
        <?php

          if(!empty($_SESSION['userInfo'])) {
          ?>
            <a href="./logout"><button class="btn btn-danger">Log Uit</button></a>
          <?php
          } else {
          ?>
            <a href="./login"><button class="btn btn-primary">Log In</button></a>
          <?php
          }

        ?>
        </div>
      </div>
    </div>
  </nav>

</body>
</html>