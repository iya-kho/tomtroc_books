<!-- Show the messenger
If the id is set in the URL, the messenger will show the messages between the user and the interlocutor. 
If not, it will show the last messages of the user. -->

<div class="container-fluid messenger h-100 bg-dark">
  <div class="container">
    <div class="row cols-1 cols-lg-2">
      <!-- Show the last messages of the user -->
      <div class="col col-lg-4 py-60 px-lg-0 bg-light h-100 d-lg-block <?= isset($_GET['id']) ? 'd-none' : '' ?>">
        <h1 class="font-primary pb-25 pb-lg-35 ms-lg-30">Messagerie</h1>
        <div class="vertical-scroll chat-preview">
        <?php 
        foreach ($conversations as $conversation) { ?>
        <a href="index.php?action=messenger&id=<?= $conversation->getInterlocutor()->getId() ?>">
          <div class="<?= isset ($_GET['id']) && $conversation->getInterlocutor()->getId() == $_GET['id'] ? 
            'bg-white py-15 border-bottom border-white d-flex ps-lg-30 pe-lg-40' : 
            'py-15 border-bottom border-white d-flex ps-lg-30 pe-lg-40'?>">
            <img src="<?= $conversation->getInterlocutor()->getImageUrl() ?>" alt="<?= $conversation->getInterlocutor()->getUsername() ?>" class="rounded-circle object-fit-cover me-10 ">
            <div class="w-100">
              <div class="d-flex">
                <h2 class="font-secondary fs-14 mt-5"><?= $conversation->getInterlocutor()->getUsername() ?></h2>
                <?php if ($conversation->getUnreadMessagesCount() > 0) { ?>
                <span class="messages-count font-secondary fs-9 text-white bg-black rounded p-1 fw-bold h-fit-content ms-5"><?= $conversation->getUnreadMessagesCount() ?></span>
                <?php } ?>
                <span class="font-secondary fs-12 mt-10 ms-auto"><?= $conversation->getLastMessage()->getFormattedDatetimeCreation() ?></span>
              </div>
              <p class="font-secondary fs-12 text-transparent m-0"><?= $conversation->getLastMessage()->getContent(28) ?></p>
            </div>
          </div>
        </a>
        <?php } ?>
        </div>
      </div>
      <div class="col d-lg-flex flex-column justify-content-end h-100 pt-25 pb-40 pb-lg-50 ps-lg-40 <?= isset($_GET['id']) ? '' : 'd-none' ?>">
        <!-- Show messages between users or the start page -->
        <?php if (!isset($_GET['id'])) { ?>
        <span class="font-secondary fs-14 bg-white py-5 px-10 mb-200 ms-100 text-center no-chat-message">
          Sélectionnez un échange pour commencer à discuter
        </span>
        <?php } else { ?>
        <a href="index.php?action=messenger" class="fs-14 font-secontary text-transparent d-lg-none">
          &larr; retour
        </a>
        <div class="my-10 d-flex align-items-center mb-lg-auto">
          <img src="<?= $interlocutor->getImageUrl() ?>" class="me-10 rounded-circle">
          <h2 class="font-secondary fs-14 fw-semibold"><?= $interlocutor->getUsername() ?></h2>
        </div>
        <div class="vertical-scroll chat pb-60 pb-lg-50 mt-lg-10" id="chatBox">
        <?php foreach ($messagesBetweenUsers as $message) { ?>
          <div class="font-secondary fs-12 w-75 mt-30 d-flex flex-column <?= $message->getSenderId() === $_SESSION['userId'] ? 'align-items-end ms-auto' : '' ?>">
            <div class="d-flex align-items-center mb-10">
              <?php if ($message->getSenderId() === $interlocutor->getId()) { ?>
              <img src="<?= $interlocutor->getImageUrl() ?>" class="rounded-circle me-5">
              <?php } ?>
              <span class="text-transparent"><?= $message->getFormattedDatetimeCreation('long') ?></span>
            </div>
            <p class="m-0 rounded p-10 <?= $message->getSenderId() === $_SESSION['userId'] ? 'bg-info' : 'bg-white' ?>"><?= $message->getContent() ?></p>
          </div>
        <?php } ?>
        </div>
        <form action="index.php?action=sendMessage" method="post">
          <input type="hidden" name="receiverId" value="<?= $interlocutor->getId() ?>">
          <div class="mt-10 mt-lg-50 d-lg-flex align-items-center">
            <input type="text" name="content" class="form-control m-lg-0 ps-lg-40" placeholder="Tapez votre message ici">
            <button type="submit" class="w-lg-25 ms-lg-30 btn btn-primary text-light w-100 mt-10 py-15 m-lg-0 font-secondary fs-16 fw-semibold">
              Envoyer
            </button>
          </div>    
        </form>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
