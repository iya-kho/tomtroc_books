// Validate the file format and preview the image before upload

function imagePreview(fileInput, picWrapId) {
  //Check the file format
  let filePath = fileInput.value;
  let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.webp)$/i;
  if(!allowedExtensions.exec(filePath)){
      alert('Seulement les fichiers .jpeg/.jpg/.png/.webp sont acceptés.');
      fileInput.value = '';
      return false;
  }else{
      //Image preview
      if (fileInput.files && fileInput.files[0]) {
          let reader = new FileReader();
          reader.onload = function(e) {
              document.getElementById(picWrapId).innerHTML = '<img src="'+e.target.result+'"/>';
          };
          reader.readAsDataURL(fileInput.files[0]);
      }
  }
}

// Preview the userpic in the user's private profile before upload
const modifyUserPic = document.getElementById('modifyUserPic');
if (modifyUserPic) {
  modifyUserPic.addEventListener('change', function () {
    imagePreview(this, 'userPicWrap');
  });
}

// Preview the book cover in the modify book form before upload
const modifyBookImg = document.getElementById('modifyBookImg');
if (modifyBookImg) {
  modifyBookImg.addEventListener('change', function () {
    imagePreview(this, 'bookCoverWrap');
  });
}

//Automatically scroll down to the bottom of the chat when the page is loaded
window.addEventListener('load', function() {
  let chatBox = document.getElementById('chatBox');
  if (chatBox) {
    chatBox.scrollTop = chatBox.scrollHeight;
  }
});