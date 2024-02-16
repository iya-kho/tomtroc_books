<!-- Show all books -->

<div class="container-fluid bg-light pt-45 pt-lg-115 pb-50 pb-lg-70 h-100" id="all-books">
    <div class="container books-container bg-light pt-15 px-lg-115">
        <div class="d-flex flex-column flex-lg-row mb-35 mb-lg-70 justify-content-between">
            <h1 class="font-primary">Nos livres à l'échange</h1>
            <form 
                class="input-group rounded search position-relative mt-35 mt-lg-0"
                action="index.php?action=books"
                method="post"
                >
                <?php include('img/icons/search.svg')?>
                <input 
                    type="search" 
                    name="search"
                    class="form-control rounded ps-40" 
                    placeholder="Rechercher un livre" 
                    aria-label="Search" 
                    aria-describedby="search-addon" 
                    />
            </form>
        </div>
        <?php if (is_null($books)) { ?>
            <p class="text-center font-secondary">Aucun livre ne correspond à votre recherche.</p>
        <?php } else { ?>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-15 gx-lg-40 gy-lg-45">
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
                        <div class="card-body">
                            <h2 class="card-title font-secondary fs-12 mb-5 mb-lg-10"><?= $book->getTitle() ?></h2>
                            <h3 class="card-subtitle font-secondary fs-12 mb-20 mb-lg-25 text-transparent"><?= $book->getAuthor() ?></h3>
                            <p class="card-text font-secondary fs-8 text-transparent fst-italic">Vendu par : <?= $book->getUsername() ?></p>
                        </div>
                    </a>
                </article>
            </div>
            <?php }?>
        <?php } ?>
        </div>
    <div>
</div>
