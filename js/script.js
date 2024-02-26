// Validate the file format and preview the image in the user's profile before upload

function imagePreview(fileInput) {
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
              document.getElementById('userPicWrap').innerHTML = '<img src="'+e.target.result+'"/>';
          };
          reader.readAsDataURL(fileInput.files[0]);
      }
  }
}

document.getElementById('modifyUserPic').addEventListener('change', function () {
  imagePreview(this);
});