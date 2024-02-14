<!-- Show all books -->

<div class="container-fluid bg-light pt-45 pt-lg-115 pb-50 pb-lg-70">
    <div class="container books-container bg-light pt-15 px-lg-115">
        <div class="d-flex flex-column flex-lg-row mb-35 mb-lg-70 justify-content-between">
            <h1 class="font-primary">Nos livres à l'échange</h1>
            <div class="input-group rounded search position-relative mt-35 mt-lg-0">
                <?php include('img/icons/search.svg')?>
                <input 
                    type="search" 
                    class="form-control rounded ps-40" 
                    placeholder="Rechercher un livre" 
                    aria-label="Search" 
                    aria-describedby="search-addon" 
                    />
            </div>
        </div>
        <?php foreach ($books as $book) { ?>
        <article>
            <a href="index.php?action=book&id=<?= $book->getId() ?>">
                <h2><?= $book->getTitle() ?></h2>
                <p><?= $book->getAuthor() ?></p>
                <img src="<?= $book->getImageUrl() ?>" alt="<?= $book->getTitle() ?>">
                <p><?= $book->getUsername() ?></p>
            </a>
        </article>
        <?php } ?>
    <div>
</div>
