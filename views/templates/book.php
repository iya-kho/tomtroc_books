<!-- Show one book by id -->

<div class="container-fluid h-100 bg-light" id="book-details">
    <div class="row row-cols-1 row-cols-lg-2 g-0">
        <div class="col book-pic">
            <img src="<?= $book->getImageUrl() ?>" alt="<?= $book->getTitle() ?>" class="w-100">
        </div>
        <div class="col pt-40 pt-lg-60 pb-80 ps-lg-85 pe-lg-150">
            <h1 class="font-primary mb-40 mb-lg-25"><?= $book->getTitle() ?></h1>
            <h2 class="font-secondary fs-16 text-transparent fw-normal">par <?= $book->getAuthor() ?></h2>
            <hr class="my-30">
            <div class="fs-14 mb-30">
                <h3 class="font-secondary text-uppercase fs-8 fw-semibold mb-15">description</h3>
                <div><?= Utils::format($book->getDescription()) ?></div>
            </div>
            <div>
                <h3 class="font-secondary text-uppercase fs-8 fw-semibold mb-15">propriétaire</h3>
                <div class="d-flex align-items-center bg-white p-5 userinfo">
                    <img src="<?= $book->getOwner()->getImageUrl() ?>" alt="<?= $book->getOwner()->getUsername() ?>"
                        class="rounded-circle object-fit-cover userpic"
                    >
                    <span class="font-secondary fs-14 mx-15">
                        <a href="index.php?action=profile&id=<?= $book->getUserId() ?>">
                            <?= $book->getOwner()->getUsername() ?>
                        </a>
                    </span>
                </div>
            </div>
            <form action="index.php?action=messenger" method="post">
                <input type="hidden" name="receiverId" value="<?=$book->getUserId()?>" />
                <button type="submit" class="btn btn-primary mt-75 text-light font-secondary fs-16 fw-semibold w-100 py-15">
                    Envoyer un message
                </button>
            </form>
        </div>
    </div>
</div>