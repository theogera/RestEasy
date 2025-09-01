new DataTable('#listUsers', {
    lengthMenu: [5, 10, 20, 40, 80, -1] // Edit Table Entries Pages (-1 = All)
});
document.getElementById('confirmLogout').addEventListener('click', function () {
    window.location.href = '../index.php';
});