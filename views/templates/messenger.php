<div class="container-fluid bg-light h-100" id="messenger">
  <?php if (!isset($_GET['id'])) { ?>
  <div class="container py-60">
    <row class="cols-1 cols-lg-2">
      <div class="col">
        <h1 class="font-primary pb-25">Messagerie</h1>
        <div>
        <?php 
        foreach ($chatLastMessages as $message) { ?>
        <a href="index.php?action=messenger&id=<?= $message->getInterlocutor()->getId() ?>" class="text-decoration-none">
          <div class="chats py-15 border-bottom border-white d-flex">
            <img src="<?= $message->getInterlocutor()->getImageUrl() ?>" alt="<?= $message->getInterlocutor()->getUsername() ?>" class="rounded-circle object-fit-cover me-10 ">
            <div>
              <h2 class="font-secondary fs-14 mt-5"><?= $message->getInterlocutor()->getUsername() ?></h2>
              <p class="font-secondary fs-12 text-transparent m-0"><?= $message->getContent(28) ?></p>
            </div>
            <span class="ms-auto font-secondary fs-12"><?= $message->getFormattedDatetimeCreation() ?></span>
          </div>
        </a>
        <?php } ?>
        </div>
      </div>
    </row>
  </div>
  <?php } else { ?>
    <p>Vous êtes sur la page de messagerie avec l'utilisateur</p>
  <?php } ?>
</div>