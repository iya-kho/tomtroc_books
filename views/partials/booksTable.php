<div class="row row-cols-2 row-cols-lg-4 g-15 gx-lg-40 gy-lg-45 books-table">
  <?php foreach ($books as $book) { ?>
  <div class="col">
      <article class="card p-0 position-relative border-light">
        <a href="index.php?action=book&id=<?= $book->getId() ?>">
          <img src="<?= $book->getImageUrl() ?>" alt="<?= $book->getTitle() ?>" class="card-img-top">
          <span class="<?= $book->getAvailability() ? 
              'd-none' : 
              'position-absolute availability text-white font-secondary fs-8 py-5 px-15' ?>">
              non dispo.
          </span>
        </a>
        <div class="card-body">
          <a href="index.php?action=book&id=<?= $book->getId() ?>">
            <h3 class="card-title font-secondary fs-12 mb-5 mb-lg-10"><?= $book->getTitle() ?></h3>
            <h4 class="card-subtitle font-secondary fs-12 mb-20 mb-lg-25 text-transparent fw-normal"><?= $book->getAuthor() ?></h4>
          </a>
          <a href="index.php?action=profile&id=<?= $book->getUserId() ?>"
              class="card-text font-secondary fs-8 text-transparent fst-italic">
              Vendu par : <?= $book->getUser()->getUsername() ?>
          </a>
        </div>
      </article>
  </div>
  <?php }?>
</div>