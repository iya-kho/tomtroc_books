<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TomTroc Books</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
  </head>
  <body>
    <header class="container-fluid bg-dark">
      <nav class="navbar navbar-expand-lg py-15">
        <div class="container">
          <a class="navbar-brand d-flex align-items-center me-40 me-xl-80" href="index.php">
            <div class="bg-primary logo d-flex justify-content-center align-items-center rounded me-10"> 
              <?php include('img/icons/logo.svg') ?>
            </div>
            <span class="text-primary font-primary fw-semibold fs-10">Tom Troc</span>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="nav navbar-nav">
              <li class="nav-item me-20 me-xl-40">
                <a class="nav-link fs-14"href="index.php?action=home">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-14" href="index.php?action=books">Nos livres à l'échange</a>
              </li>
            </ul>
            <ul class="nav navbar-nav border-start">
              <li class="nav-item ms-25 ms-xl-55">
                <a class="nav-link fs-14 d-flex align-items-center" href="index.php?action=messenger">
                  <?php include('img/icons/messenger.svg') ?>
                  <span class="ms-5">Messagerie</span>
                </a>
              </li>
              <li class="nav-item ms-25 ms-xl-55">
                <a class="nav-link fs-14 d-flex align-items-center" href="index.php?action=account">
                  <?php include('img/icons/account.svg') ?>
                  <span class="ms-5">Mon compte</span>
                </a>
              </li>
              <li class="nav-item ms-25 ms-xl-55">
                <a class="nav-link fs-14" href="index.php?action=login">Connexion</a>
              </li>
            </ul>  
          </div>
        </div>
      </nav>
    </header>
    <main>
      <?= $content ?>
    </main>
    <footer>
      <div>Footer</div>
    </footer>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>