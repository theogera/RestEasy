<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vacation requests</title>
    <?php include '../basic-header.php'; ?>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container w-70 pt-5">
        <div class="header-container">
            <h1>Vacation requests</h1>
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#logOutModal">Log Out <i class="bi bi-x-lg"></i></button>
            <?php include("../logOutModal.php"); ?>
        </div>
        <button type="button" class="buttonRequest" data-bs-toggle="modal" data-bs-target="#buttonRequest">Request vacation</button>
        <?php include("vacation.php"); ?>
        <table id="listUsers" class="table table-striped">
            <thead>
                <tr>
                    <th>Date submit</th>
                    <th>Dates requested</th>
                    <th>Total days</th>
                    <th>Reason</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $requests = get_query("SELECT id, date_submit, dates_requested, total_days, reason, status FROM requests;");
                foreach ($requests as $request) {
                    // Change Date In dd/mm/YYYY
                    $dateSubmit = date("d/m/Y", strtotime($request['date_submit']));
                    $datesRequested = $request['dates_requested'];
                    // Split First Date And Second Date
                    $datesArray = explode(' - ', $datesRequested);
                    // Change First Date In dd/mm/YYYY
                    $startDate = date("d/m/Y", strtotime($datesArray[0]));
                    // Change Second Date In dd/mm/YYYY
                    $endDate = date("d/m/Y", strtotime($datesArray[1]));
                    // Add First Date And Second Date
                    $datesRequestedFormatted = $startDate . ' - ' . $endDate;
                    $totalDays = $request['total_days'];
                    $reason = $request['reason'];
                    $status = $request['status'];

                    // Show True Icon
                    if ($status == 'approved') {
                        $statusDisplay = "<i class='bi bi-file-earmark-check' style='color: green; font-style: normal;'> approve</i>";
                    } elseif ($status == 'rejected') {
                        $statusDisplay = "<i class='bi bi-file-earmark-excel' style='color: red; font-style: normal;'> rejected</i>";
                    } else {
                        $statusDisplay = "<i class='bi bi-file-earmark' style='color: black; cursor: pointer; font-style: normal;' data-bs-toggle='modal' data-bs-target='#deleteRequestModal' data-request-id='{$request['id']}' data-reason='{$reason}' data-total-days='{$datesRequestedFormatted}'> pending</i>";
                    }
                ?>
                    <tr>
                        <td><?php echo $dateSubmit; ?></td>
                        <td><?php echo $datesRequestedFormatted; ?></td>
                        <td><?php echo $totalDays; ?></td>
                        <td><?php echo $reason; ?></td>
                        <td><?php echo $statusDisplay; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Date submit</th>
                    <th>Dates requested</th>
                    <th>Total days</th>
                    <th>Reason</th>
                    <th>Status</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <script src="requests.js"></script>
    <?php include("deleteVacationRequestModal.php"); ?>
</body>

</html>