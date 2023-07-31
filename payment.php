<?php
require_once('./Handler/connection.php');
session_start();
$user = $_SESSION['user'];
$role = $_SESSION['role'];

    if(!isset($role)){
        header('location: ../login.php');
    }

if(isset($_POST['submit'])){
    $bookingID = $_SESSION['bookingID'];
    $refNo = $_POST['referenceNumber'];

    $stmt = $conn->prepare("INSERT INTO `payment`(`BookingId`, `reference_no`)
    VALUES (:BookingId,:reference_no)");
    $stmt->execute(array(":BookingId" => $bookingID, ":reference_no" => $refNo));


}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
</head>
<body>
<?php
include('include/header.php');
include('navigation.php');
include('include/topbar.php');



?>
    <div class="container mt-5">
        <h2>Payment Options</h2>
        <div class="row">
            <div class="col-md-6">
                <h4>Pay with Mobile</h4>
                <p>Choose your mobile payment method: </p>
                <button class="btn btn-secondary mybg" onclick="showMobilePaymentSteps()">Pay with Mobile</button>
                <div id="mobilePaymentSteps" style="display: none;">
                    <!-- Mobile payment steps will be shown here -->
                    <p>Step 1: Call *150*01#</p>
                    <p>Step 2: Choose 5 "Lipia kwa Simu"</p>
                    <p>Step 3: Choose 1 "Kwenda Tigo Pesa"</p>
                    <p>Step 4: Enter account number (563777)</p>
                    <p>Step 5: Enter amount</p>
                    <p>Step 6: Enter pin using your mobile</p>
                    <hr>
                    <form action="payment.php" method="post">
                        <label for="referenceNumber">Enter reference number:</label>
                        <input type="text" class="form-control" name="referenceNumber" id="referenceNumber" maxlength="11" pattern="[0-9]{11}" placeholder="Enter reference number" required>
                        <button type="submit" name="submit" class="btn btn-success mt-2" onclick="submitPayment()">Submit Payment</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <h4>Pay with Bank</h4>
                <p>Your control number for bank payment:</p>
                <button class="btn btn-secondary mybg" onclick="showBankControlNumber()">Pay with Bank</button>
                <div id="bankControlNumber" style="display: none;">
                    <!-- Bank control number will be shown here -->
                    <p>Control Number: <span id="controlNumber"></span></p>
                    <button class="btn btn-success mt-2" >Submit Payment</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment JS -->

    <script>
        function showMobilePaymentSteps() {
            var mobilePaymentSteps = document.getElementById("mobilePaymentSteps");
            mobilePaymentSteps.style.display = "block";

            var bankControlNumber = document.getElementById("bankControlNumber");
            bankControlNumber.style.display = "none";
        }

        function showBankControlNumber() {
            var bankControlNumber = document.getElementById("bankControlNumber");
            bankControlNumber.style.display = "block";

            var mobilePaymentSteps = document.getElementById("mobilePaymentSteps");
            mobilePaymentSteps.style.display = "none";

            // Generate a random control number for bank payment
            var controlNumber = generateRandomControlNumber();
            document.getElementById("controlNumber").innerText = controlNumber;
        }

        function generateRandomControlNumber() {
            // Generate a random 10-digit control number
            var controlNumber = Math.floor(1000000000 + Math.random() * 9000000000);
            return controlNumber;
        }

        function submitPayment() {
            alert("Payment successfully submitted!");
        }
    </script>
</body>
<?php
 include('include/footer.php');
 include('include/scripts.php');
?>
</html>
