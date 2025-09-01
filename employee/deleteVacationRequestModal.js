document.querySelectorAll('.bi-file-earmark').forEach(item => {
    item.addEventListener('click', function () {
        const requestId = this.getAttribute('data-request-id');
        const reason = this.getAttribute('data-reason');
        const totalDays = this.getAttribute('data-total-days');
        document.querySelector('#deleteRequestReason').textContent = reason;
        document.querySelector('#deleteRequestTotalDays').textContent = totalDays;
        document.querySelector('#requestId').value = requestId;
    });
});