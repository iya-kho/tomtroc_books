<!-- Show login or signup page -->

<div class="container-fluid bg-light h-100 d-flex flex-column flex-lg-row login-page">
  <div class="w-lg-50 pt-80 pt-lg-130 pb-100 px-lg-150">
    <h1 class="font-primary mb-35 mb-lg-65"><?= $action === 'login'? 'Connexion' : 'Inscription' ?></h1>
    <div>
      <?php foreach ($messages as $message) { ?>
          <p class="text-<?= $messageColor ?> font-secondary fs-12"><?= $message ?></p>
      <?php } ?>
    </div>
    <form action="index.php?action=<?= $action ?>" method="post">
      <input type="hidden" name="action" value="<?= $action ?>" />
      <?php if ($action === 'signup') { ?>
        <div class="mb-30 mb-lg-35">
          <label for="username" class="form-label font-secondary fs-14 text-transparent">Pseudo</label>
          <input type="text" name="username" id="username" required class="form-control">
        </div>
      <?php } ?>
      <div class="mb-30 mb-lg-35">
        <label for="email" class="form-label font-secondary fs-14 text-transparent">Adresse email</label>
        <input type="email" name="email" id="email" required class="form-control">
      </div>
      <div>
        <label for="password" class="form-label font-secondary fs-14 text-transparent">Mot de passe</label>
        <input type="password" name="password" id="password" required class="form-control">
      </div>
      <button type="submit" class="btn btn-primary text-light w-100 my-30 py-15 mb-lg-40 font-secondary fs-16 fw-semibold">
        <?= $action === 'login'? 'Se connecter' : 'S\'inscrire' ?>
      </button>
    </form>
    <div class="font-secondary fs-16">
    <?php if ($action === 'login') { ?> 
      <span>Pas de compte? </span>
      <a href="index.php?action=signup" class="text-decoration-underline">Inscrivez-vous</a>
    <?php } else { ?>
      <span>Déjà inscrit ?</span>
      <a href="index.php?action=login" class="text-decoration-underline">Connectez-vous</a>
    <?php } ?>  
    </div>
  </div>
  <div class="w-lg-50">
    <img src="img/site_img/book_pile.webp" alt="Pile of books" class="img-fluid">
  </div>
</div
