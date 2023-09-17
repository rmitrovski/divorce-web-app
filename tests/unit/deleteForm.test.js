
// deleteForm.test.js
const { closeDeleteForm } = require('../../js/deleteForm.js');

describe('closeDeleteForm', () => {
    test('should hide delete form and overlay', () => {
        document.body.innerHTML = `
            <div class="overlay" id="overlay" style="display: block;"></div>
            <form id="deleteAccountForm" style="display: block;"></form>
        `;

        // Before calling the function
        expect(document.getElementById('deleteAccountForm').style.display).toBe('block');
        expect(document.getElementById('overlay').style.display).toBe('block');

        // Call the function
        closeDeleteForm();

        // After calling the function
        expect(document.getElementById('deleteAccountForm').style.display).toBe('none');
        expect(document.getElementById('overlay').style.display).toBe('none');
    });
});
