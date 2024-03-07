<!-- Show the form to modify a book -->

<div class="container-fluid bg-light h-100 p-0 modify-book pb-80">
  <div class="container px-20 pt-55 pb-40 pb-lg-30">
    <a href="index.php?action=profile&id=<?= $_SESSION['userId'] ?>" class="fs-14 font-secontary text-transparent">
      &larr; retour
    </a>
    <h1 class="font-primary mt-15">Modifier les informations</h1>
  </div>
  <div class="container bg-white d-flex flex-column flex-lg-row pt-40 pt-lg-55 pb-50 pb-lg-65 rounded position-relative">
    <div class="w-lg-50 px-20 px-lg-50">
      <div class="text-danger font-secondary fs-10 position-absolute errors">
      <?php if (isset($picErrors) && !empty($picErrors)) { 
        foreach ($picErrors as $error) { ?>
          <p><?= $error ?></p>
      <?php }} ?>
      </div>
      <span class="fs-11 text-transparent photo-label">Photo</span>
      <div class="ratio ratio-1x1 mt-5 mb-15" id="bookCoverWrap">
        <img src="<?= $book->getImageUrl() ?>" alt="Couverture du livre">
      </div>
      <input type="file" name="bookImg" id="modifyBookImg" class="d-none" form="modifyBookForm"/>
      <label for="modifyBookImg" role="button" class="font-secondary fs-16 text-decoration-underline mt-5 d-block text-end">
        Modifier la photo
      </label>
    </div>
    <div class="w-lg-50 px-20 px-lg-50">
      <form action="index.php?action=modifyBookForm" method="post" id="modifyBookForm" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $book->getId() ?>">
        <div class="mb-30 mb-lg-35 font-secondary fs-14">
          <label for="title" class="form-label">Titre</label>
          <input type="text" name="title" id="title" class="form-control bg-info fs-14" placeholder="<?= $book->getTitle() ?>">
        </div>
        <div class="mb-30 mb-lg-35 font-secondary fs-14">
          <label for="author" class="form-label text-transparent">Auteur</label>
          <input type="text" name="author" id="author" class="form-control bg-info fs-14" placeholder="<?= $book->getAuthor() ?>">
        </div>
        <div class="mb-30 mb-lg-35 font-secondary fs-14">
          <label for="description" class="form-label text-transparent">Commentaire</label>
          <textarea name="description" id="description" class="form-control bg-info fs-14" placeholder="<?= $book->getDescription() ?>"></textarea>
        </div>
        <div class="mb-45 font-secondary fs-14">
          <label for="availability" class="form-label text-transparent">Disponibilité</label>
          <select name="availability" id="availability" class="form-select bg-info fs-14">
            <option value="true">disponible</option>
            <option value="false" <?= $book->getAvailability() ? '' : 'selected' ?>> non disponible</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary w-100 w-lg-75 text-white py-15 fs-16 fw-semibold">Valider</button>   
      </form>
    </div>
  </div>
</div>