<?php
/**
 * Show all books
 */
?>

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
