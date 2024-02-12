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
      <nav class="navbar navbar-expand-md py-15">
        <div class="container-fluid">
          <a class="navbar-brand d-flex align-items-center" href="#">
            <div class="bg-primary logo d-flex justify-content-center align-items-center rounded me-10"> 
              <svg viewBox="0 0 33 27" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0.595655 7.51205C0.643482 7.08957 0.667396 6.50368 0.667396 5.75439C0.667396 4.32754 0.611597 2.70937 0.5 0.899902C2.05439 0.94773 4.72476 0.971644 8.5111 0.971644C12.2815 0.971644 14.9399 0.94773 16.4863 0.899902C16.3747 2.70937 16.3189 4.32754 16.3189 5.75439C16.3189 6.50368 16.3428 7.08957 16.3907 7.51205H15.8287C15.2946 5.36778 14.6011 3.82535 13.7482 2.88474C12.9033 1.93616 11.9905 1.46187 11.0101 1.46187H10.9862V15.4753C10.9862 16.1608 11.0539 16.659 11.1894 16.9699C11.3329 17.2808 11.588 17.4881 11.9547 17.5917C12.3214 17.6953 12.9033 17.7471 13.7004 17.7471V18.2374C11.4047 18.1895 9.61511 18.1656 8.33174 18.1656C7.17591 18.1656 5.49797 18.1895 3.29791 18.2374V17.7471C4.09503 17.7471 4.67693 17.6953 5.04361 17.5917C5.41028 17.4881 5.66138 17.2808 5.79689 16.9699C5.94037 16.659 6.01211 16.1608 6.01211 15.4753V1.46187H5.9882C4.99179 1.46187 4.07112 1.93218 3.22616 2.87278C2.38918 3.80542 1.69967 5.35184 1.15763 7.51205H0.595655Z" fill="white"/>
              <path d="M16.9209 15.6746C16.9687 15.2522 16.9926 14.6663 16.9926 13.917C16.9926 12.4901 16.9368 10.872 16.8252 9.0625C18.3796 9.11033 21.05 9.13424 24.8363 9.13424C28.6067 9.13424 31.2651 9.11033 32.8115 9.0625C32.6999 10.872 32.6441 12.4901 32.6441 13.917C32.6441 14.6663 32.668 15.2522 32.7159 15.6746H32.1539C31.6198 13.5304 30.9263 11.9879 30.0734 11.0473C29.2284 10.0988 28.3157 9.62447 27.3353 9.62447H27.3114V23.6379C27.3114 24.3234 27.3791 24.8216 27.5146 25.1325C27.6581 25.4434 27.9132 25.6507 28.2799 25.7543C28.6465 25.8579 29.2284 25.9097 30.0256 25.9097V26.4C27.7299 26.3521 25.9403 26.3282 24.6569 26.3282C23.5011 26.3282 21.8232 26.3521 19.6231 26.4V25.9097C20.4202 25.9097 21.0021 25.8579 21.3688 25.7543C21.7355 25.6507 21.9866 25.4434 22.1221 25.1325C22.2656 24.8216 22.3373 24.3234 22.3373 23.6379V9.62447H22.3134C21.317 9.62447 20.3963 10.0948 19.5514 11.0354C18.7144 11.968 18.0249 13.5144 17.4828 15.6746H16.9209Z" fill="white"/>
              </svg>
            </div>
            <span class="text-primary font-primary fw-semibold fs-10">Tom Troc</span>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav navbar-nav">
              <li class="nav-item">
                <a class="nav-link "href="index.php?action=home">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link href="index.php?action=books">Nos livres à l'échange</a>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="nav-item">
                <a class="nav-link href="index.php?action=messenger">Messagerie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link href="index.php?action=account">Mon compte</a>
              </li>
              <li class="nav-item">
                <a class="nav-link href="index.php?action=login">Connexion</a>
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