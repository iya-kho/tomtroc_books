<!-- Show one book by id -->

<?php if ($book) { ?>
    <article>
        <h2><?= $book->getTitle() ?></h2>
        <p><?= $book->getAuthor() ?></p>
        <img src="<?= $book->getImageUrl() ?>" alt="<?= $book->getTitle() ?>">
        <p><?= $book->getUsername() ?></p>
    </article>
<?php } else { ?>
    <p>The requested book does not exist.</p>
<?php } ?>