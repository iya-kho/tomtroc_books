<?php
    /**
     * Template pour afficher une page d'erreur.
     */
?>

<div class="h-100 container d-flex justify-content-center align-items-center flex-column">
    <h2>Erreur</h2>
    <p><?= $errorMessage ?></p>
    <a href="index.php?action=home" class="text-decoration-underline text-primary fw-semibold">
        Retour à la page d'accueil
    </a>
</div>
