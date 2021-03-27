var approveModal = document.getElementById('approveModal');
var rejectModal = document.getElementById('rejectModal');
var formActionOriginal = document.getElementById('approveModal').querySelector('form').action;

approveModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
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

rejectModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
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
  