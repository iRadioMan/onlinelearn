var deleteModal = document.getElementById('deleteModal');
var formActionOriginal = document.getElementById('deleteModal').querySelector('form').action;

deleteModal.addEventListener('show.bs.modal', function (event) {
  // кнопка, вызывающая модальную форму
  var button = event.relatedTarget
  // извлечение атрибутов из data-bs-* 
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

// проверка на ввод слова "удалить" при удалении урока
confirmDeleteInput.addEventListener('keyup', function(){
    if (confirmDeleteInput.value === confirmWord) {
        confirmDeleteButton.disabled = false;
    } else {
        confirmDeleteButton.disabled = true;
    }
});