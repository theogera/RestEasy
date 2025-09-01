document.querySelectorAll('.delete-button').forEach(item => {
    item.addEventListener('click', function () {
        const userId = this.getAttribute('data-id');
        const name = this.getAttribute('data-name');
        const email = this.getAttribute('data-email');
        document.querySelector('#deleteUserId').value = userId;
        document.querySelector('#deleteRequestReason').textContent = name;
        document.querySelector('#deleteRequestTotalDays').textContent = email;
    });
});