var approveModal = document.getElementById('approveModal');
var rejectModal = document.getElementById('rejectModal');
var formActionOriginal = document.getElementById('approveModal').querySelector('form').action;

// модальное окно при подтверждении заявки
approveModal.addEventListener('show.bs.modal', function (event) {
  // кнопка, вызывающая модальную форму
  var button = event.relatedTarget
  // извлечение атрибутов из data-bs-*
  var fullName = button.getAttribute('data-bs-fullname');
  var requestId = button.getAttribute('data-bs-requestid');
  var groupName = button.getAttribute('data-bs-groupname');

  var fullNameSpan = approveModal.querySelector('.approve-fullname');
  var groupNameSpan = approveModal.querySelector('.approve-groupname');
  var form = approveModal.querySelector('form');

  fullNameSpan.textContent = fullName;
  form.action = formActionOriginal + "/" + requestId;
  groupNameSpan.textContent = groupName;
})

// модальное окно при отклонении заявки
rejectModal.addEventListener('show.bs.modal', function (event) {
  // кнопка, вызывающая модальную форму
  var button = event.relatedTarget
    // извлечение атрибутов из data-bs-*
  var fullName = button.getAttribute('data-bs-fullname');
  var requestId = button.getAttribute('data-bs-requestid');
  var groupName = button.getAttribute('data-bs-groupname');

  var fullNameSpan = rejectModal.querySelector('.reject-fullname');
  var groupNameSpan = rejectModal.querySelector('.reject-groupname');
  var form = rejectModal.querySelector('form');

  fullNameSpan.textContent = fullName;
  form.action = formActionOriginal + "/" + requestId;
  groupNameSpan.textContent = groupName;
})
  