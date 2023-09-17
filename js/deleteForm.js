// deleteForm.js
function closeDeleteForm() {
    var deleteForm = document.getElementById('deleteAccountForm');
    var overlay = document.getElementById('overlay');
    overlay.style.display = 'none';
    deleteForm.style.display = 'none';
}

module.exports = { closeDeleteForm };
