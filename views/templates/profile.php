<!-- Show user's public profile -->

<div class="container-fluid bg-light h-100 py-70 py-lg-100" id="profile">
  <div class="container">
    <div class="row row-cols-1 row-cols-lg-2 g-30">
      <div class="col col-lg-4">
        <div class="userinfo bg-white rounded pt-45 pb-55 ps-55 pe-55 d-flex flex-column align-items-center">
          <div class="imgWrap rounded-circle d-flex align-items-center justify-content-center bg-dark">
            <?php if ($user->getImageUrl()) { ?>
              <img src="<?= $user->getImageUrl() ?>" alt="<?= $user->getUsername() ?>">
            <?php } else { ?>
              <span class="font-primary text-uppercase fs-30"><?= substr($user->getUsername(), 0, 1) ?></span>
            <?php } ?>
          </div>
          <hr class="w-100 mt-70 mb-45 bg-dark">
          <h2 class="font-primary fs-24">
            <?= $user->getUsername() ?>
          </h2>
          <span class="font-secondary fs-14 my-15 text-transparent">
            Membre depuis <?= $user->getSignupDuration() ?>
          </span>
          <h3 class="font-secondary fs-8 fw-semibold text-uppercase">bibliothèque</h3>
          <div class="d-flex justify-content-center align-items-center mb-45">
            <?php require 'img/icons/books.svg' ?>
            <span class="font-secondary fs-14 ms-5">
              <?= $user->getBooksCount() === 0 ? 
                'Aucun livre' : 
                $user->getBooksCount() . ' livre' . ($user->getBooksCount() > 1 ? 's' : '') 
              ?>
            </span>
          </div>
          <form action="index.php?action=messenger" method="post">
            <input type="hidden" name="receiverId" value="<?=$user->getId()?>" />
            <button type="submit" class="btn btn-outline-primary font-secondary bg-dark fs-16 fw-semibold w-100 py-15">
                Écrire un message
            </button>
          </form>
        </div>
      </div>
      <?php if ($user->getBooksCount() > 0) { ?>
        <div class="col col-lg-8">
          <div class="d-lg-none row row-cols-1 row-cols-md-2 g-15">         
            <?php foreach ($user->getBooks() as $book) : ?>
              <a href="index.php?action=book&id=<?= $book->getId() ?>">
                <div class="book-info col bg-white rounded p-50">
                  <div class="d-flex mb-20 align-items-center">
                    <img src="<?= $book->getImageUrl() ?>" alt="<?= $book->getTitle() ?>"
                      class="me-15"
                    >
                    <div class="font-secondary fs-14">
                      <span><?= $book->getTitle() ?></span>
                      <span><?= $book->getAuthor() ?></span>
                    </div>
                  </div>
                  <div class="font-secondary fs-14 fst-italic"><?= $book->getDescription(94) ?></div>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
          <div class="d-none d-lg-block rounded bg-white">
            <div class="row g-0 text-uppercase font-secondary fs-8 fw-semibold pt-30 pb-10 ps-65 pe-55 border-bottom border-dark">
              <div class="col">
                photo
              </div>
              <div class="col">
                titre
              </div>
              <div class="col">
                auteur
              </div>
              <div class="col">
                description
              </div>
            </div>
            <?php foreach ($user->getBooks() as $index => $book) : ?>
              <a href="index.php?action=book&id=<?= $book->getId() ?>" 
                class="<?= $index % 2 === 0 ?
              'row g-0 text-start align-items-center pt-25 pb-35 book-info ps-65 pe-55 font-secondary fs-12' :
              'row g-0 text-start align-items-center pt-25 pb-35 book-info ps-65 pe-55 font-secondary fs-12 bg-info ' ?>
              ">
                <div class="col">
                  <img src="<?= $book->getImageUrl() ?>" alt="<?= $book->getTitle() ?>">
                </div>
                <div class="col">
                  <?= $book->getTitle() ?>
                </div>
                <div class="col">
                  <?= $book->getAuthor() ?>
                </div>
                <div class="col fst-italic">
                  <?= $book->getDescription(82) ?>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>