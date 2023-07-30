<?php
require_once("../Handler/connection.php");
$stmt=$conn->prepare("SELECT * FROM `booking_t`,`venue` WHERE booking_t.VenueId=venue.VenueId");
$stmt->execute();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Venue Booking Report</title>
   
</head>
<body>
<?php
include('../include/Adminheader.php');
include('../include/navbar.php');
include('../include/AdminTopbar.php');
?>
    <div class="container">
        <h1 class="text-dark">Venue Booking Report</h1>
        
       
        <button class="btn btn-primary mb-4 mt-3 mybg" onclick="printReport()">Print Report</button>
        <table class="table">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Hall Name</th>
                    <th>Date</th>
                    
                    <th>Event Name</th>
                    <th>Contact Name</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sn = 1;
            while($booking=$stmt->fetch()){ ?>
                <tr>
                    <td><?php echo $booking['BookingId']; ?></td>
                    <td><?php echo $booking['v_Name']; ?></td>
                    <td><?php echo $booking['Date']; ?></td>
                    <td><?php echo $booking['service_type']; ?></td>
                    <td><?php echo $booking['name']; ?></td>
                </tr>
                <?php $sn++;
            } ?>
            </tbody>
        </table>
    </div>
    
    <?php include('../include/Adminscript.php');
include('../include/Adminfooter.php');?> 
    
    <script>
        function printReport() {
            window.print();
        }
    </script>
     
</body>
</html>



<!DOCTYPE html>
<html>
<head>
    <title>Booking System Report</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+4B5K9U5WlgVvuhaZSOuzr1u9aHEUdGBXEnm0xFmmLcV3lV" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-5">
        <h2>Booking System Report</h2>
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="month" class="form-control" id="searchByMonth" placeholder="Search by month">
            </div>
            <div class="col-md-4">
                <input type="number" class="form-control" id="searchByYear" placeholder="Search by year">
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-primary mybg" onclick="generateReport()">Generate Report</button>
                <button type="button" class="btn btn-secondary" onclick="printReport()">Print Report</button>
            </div>
        </div>
        <div id="reportContent">
            <!-- The generated report content will be displayed here -->
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-5gVRbvrH6qNqH3B1DzC2JYjQizYZz+/S8R5FUM6vSlq6RyQOdZ8DyvP9MvZ66IN7" crossorigin="anonymous"></script>
    <script>
        function generateReport() {
            // Get the selected month and year from the search bar
            var selectedMonth = document.getElementById("searchByMonth").value;
            var selectedYear = document.getElementById("searchByYear").value;

            // TODO: Fetch booking data from the server based on the selectedMonth and selectedYear.
            // Replace this section with your actual server-side code to fetch the booking data.

            // For demonstration purposes, let's assume the server returns dummy data:
            var dummyData = [
                { bookingID: 1, date: "2023-07-15", customer: "John Doe", amount: 100 },
                { bookingID: 2, date: "2023-07-18", customer: "Jane Smith", amount: 150 },
                { bookingID: 2, date: "2022-07-18", customer: "Jane Smith", amount: 150 },
                // Add more data as needed
            ];

            // Generate the report content based on the fetched data
            var reportContent = "<h3>Booking Transactions Report</h3>";
            reportContent += "<table class='table table-bordered'><thead><tr><th>Booking ID</th><th>Date</th><th>Customer</th><th>Amount</th></tr></thead><tbody>";

            for (var i = 0; i < dummyData.length; i++) {
                reportContent += "<tr>";
                reportContent += "<td>" + dummyData[i].bookingID + "</td>";
                reportContent += "<td>" + dummyData[i].date + "</td>";
                reportContent += "<td>" + dummyData[i].customer + "</td>";
                reportContent += "<td>$" + dummyData[i].amount + "</td>";
                reportContent += "</tr>";
            }

            reportContent += "</tbody></table>";

            document.getElementById("reportContent").innerHTML = reportContent;
        }

        function printReport() {
            // Trigger the browser's print dialog to print the report content
            window.print();
        }
    </script>
</body>
</html>

