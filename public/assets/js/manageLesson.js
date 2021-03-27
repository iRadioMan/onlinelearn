var deleteModal = document.getElementById('deleteModal');
var formActionOriginal = document.getElementById('deleteModal').querySelector('form').action;

deleteModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var deleteId = button.getAttribute('data-bs-delId');
  var lessonName = button.getAttribute('data-bs-lessonName');


  var lessonNameSpan = deleteModal.querySelector('.delete-fullname');
  var form = deleteModal.querySelector('form');

  lessonNameSpan.textContent = lessonName;
  form.action = formActionOriginal + "/" + deleteId;
})




var confirmDeleteInput = document.getElementById("modalDeleteWord");
var confirmDeleteButton = document.getElementById("modalDeleteButton");
var confirmWord = "удалить";
confirmDeleteInput.addEventListener('keyup', function(){
    if(confirmDeleteInput.value === confirmWord){
        confirmDeleteButton.disabled = false;
    }else{
        confirmDeleteButton.disabled = true;
    }
});