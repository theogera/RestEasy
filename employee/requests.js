new DataTable('#listUsers', {
    // Edit Table Entries Pages (-1 = All)
    lengthMenu: [5, 10, 20, 40, 80, -1]
});
document.getElementById('confirmLogout').addEventListener('click', function () {
    window.location.href = '../index.php';
});
// Add Event Listener For Pending Icon
document.querySelectorAll('.bi-file-earmark').forEach(item => {
    item.addEventListener('click', function () {
        const requestId = this.getAttribute('data-request-id');
        const reason = this.getAttribute('data-reason');
        const datesRequestedFormatted = this.getAttribute('data-total-days');
        document.querySelector('#confirmDelete').setAttribute('data-request-id', requestId);
        document.querySelector('#deleteRequestReason').textContent = reason;
        document.querySelector('#deleteRequestTotalDays').textContent = datesRequestedFormatted;
    });
});