<!-- Show the home page -->

<div id="homepage">
  <section class="container-fluid bg-dark">
      <div class="container d-flex flex-column flex-lg-row-reverse align-items-lg-center pb-50 pb-lg-90 pt-80 first-screen">
        <div class="w-lg-50">
          <img src="img/site_img/hamza.webp" alt="hero" class="w-100">
          <span class="fs-12 fst-italic text-transparent float-end mt-5 me-25 mt-lg-15 me-lg-0">Hamza</span>
        </div>
        <div class="w-lg-50 pe-lg-100">
          <h1 class="font-primary mt-30 mt-lg-0">Rejoignez nos lecteurs passionnés</h1>
          <p class="font-secondary mt-20 mb-30 mb-lg-40 fw-light fs-16">Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.</p>
          <a href="index.php?action=books" 
            class="btn btn-primary text-light font-secondary fs-16 fw-semibold w-100 w-lg-50 py-15"
          >
          Découvrir
          </a>
        </div>
      </div>
  </section>
  <section class="container-fluid bg-light pt-40 pt-lg-80 pb-80 pb-lg-60">
    <div class="container w-lg-75">
      <h2 class="font-primary fs-28 mx-auto px-50 mb-35 mb-lg-80 text-center">Les derniers livres ajoutés</h2>
      <?php include('views/partials/booksTable.php')?>
      <a href="index.php?action=books" 
        class="btn btn-primary d-none d-lg-block mx-auto text-light font-secondary fs-16 fw-semibold w-100 w-lg-25 py-15 mt-50"
      >
        Voir tous les livres
      </a>
    </div>
  </section>
  <section class="container-fluid bg-dark pt-50 pt-lg-85 pb-45 pb-lg-80">
    <div class="container w-lg-75">
      <h2 class="font-primary fs-28 mx-auto text-center">Comment ça marche ?</h2>
      <p class="my-20 my-lg-25 font-secondary fs-14 fw-light text-center w-lg-40 mx-auto description">Échanger des livres avec TomTroc c’est simple et amusant ! Suivez ces étapes pour commencer :</p>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-15 gx-md-35 gy-md-35 instructions">
        <div class="col">
          <div class="card border-0 d-flex justify-content-center align-items-center p-40">
            <p class="card-text font-secondary fs-14 text-center">Inscrivez-vous gratuitement sur notre plateforme.</p>
          </div>
        </div>
        <div class="col">
          <div class="card border-0 d-flex justify-content-center align-items-center p-40">
            <p class="card-text font-secondary fs-14 text-center">Ajoutez les livres que vous souhaitez échanger à votre profil.</p>
          </div>
        </div>
        <div class="col">
          <div class="card border-0 d-flex justify-content-center align-items-center p-40">
            <p class="card-text font-secondary fs-14 text-center">Parcourez les livres disponibles chez d'autres membres.</p>
          </div>
        </div>
        <div class="col">
          <div class="card border-0 d-flex justify-content-center align-items-center p-40">
            <p class="card-text font-secondary fs-14 text-center">Proposez un échange et discutez avec d'autres passionnés de lecture.</p>
          </div>
        </div>
      </div>
      <a href="index.php?action=books" 
        class="btn btn-outline-primary d-block mx-auto font-secondary fs-16 fw-semibold w-100 w-lg-25 py-15 mt-30 mt-lg-45"
      >
        Voir tous les livres
      </a>
    </div>
  </section>
  <section class="container-fluid bg-dark pb-35 pb-lg-150 values">
    <img src="img/site_img/girl_books_m.webp" alt="Girl with books" class="w-100 d-lg-none">
    <img src="img/site_img/girl_books_l.webp" alt="Girl with books" class="w-100 d-none d-lg-block object-fit-cover">
    <div class="w-lg-40 mx-auto position-relative">
      <h2 class="font-primary fs-28 my-35 mt-lg-80">Nos valeurs</h2>
      <div class="font-secondary fs-14 fw-light">
        <?= Utils::format(VALUES) ?>
        <p class="fst-italic mb-60 mb-lg-0">L'équipe Tom Troc</p>
      </div>
      <span class="d-block mx-auto icon-heart">
        <?php include('img/icons/heart_drawn.svg')?>
      </span>
    </div>
  </section>
</div>

