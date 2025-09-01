$(document).ready(function () {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    // For January is 0
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();
    today = dd + '/' + mm + '/' + yyyy;
    $('#dateFrom').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        // Prohibit Dates Before Today
        startDate: today,
    }).on('changeDate', function (selected) {
        // When dateFrom Select
        var minDate = new Date(selected.date.valueOf());
        // dateTo Should Biggest Than dateFrom
        minDate.setDate(minDate.getDate() + 1);
        $('#dateTo').datepicker('setStartDate', minDate);
    });
    $('#dateTo').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        // Prohibit Dates Before Today
        startDate: today
    }).on('changeDate', function (selected) {
        // When dateTo Select
        var maxDate = new Date(selected.date.valueOf());
        // dateFrom Can't Biggest Than dateTo
        maxDate.setDate(maxDate.getDate() - 1);
        $('#dateFrom').datepicker('setEndDate', maxDate);
    });
    // Check If Form Submit
    $('#vacationRequestForm').on('submit', function (e) {
        var dateFrom = $('#dateFrom').val();
        var dateTo = $('#dateTo').val();
        var reason = $('#reason').val().trim();
        // Check If All Fields Are Completed
        if (!dateFrom || !dateTo || !reason) {
            e.preventDefault(); // Prohibit Submit Form
            alert('Please fill in all fields.');
        } else if (reason.length === 0) {
            e.preventDefault(); // Prohibit Submit Form
            alert('Reason cannot be empty or just spaces.');
        }
    });
});