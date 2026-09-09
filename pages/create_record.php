<?php

// Start the PHP session so data can be shared between pages
session_start();

require_once "../classes/MedicationRecord.php";
require_once "../classes/AppointmentRecord.php";
require_once "../classes/VitalRecord.php";

// Check if the main form fields were submitted
if (isset($_POST["recordType"], $_POST["patientName"], $_POST["recordDate"])) {

    // Get the record type from the form
    $recordType = $_POST["recordType"];

    // Get the patient's name from the form
    $patientName = $_POST["patientName"];

    // Get the record date from the form
    $recordDate = $_POST["recordDate"];

    // Get the medicine name if it was submitted
    $medicineName = $_POST["medicineName"] ?? "";

    // Get the dosage if it was submitted
    $dosage = $_POST["dosage"] ?? "";

    // Get the blood pressure if it was submitted
    $bloodPressure = $_POST["bloodPressure"] ?? "";

    // Get the heart rate if it was submitted
    $heartRate = $_POST["heartRate"] ?? "";

    // Get the doctor's name if it was submitted
    $doctorName = $_POST["doctorName"] ?? "";

    // Get the appointment time if it was submitted
    $appointmentTime = $_POST["appointmentTime"] ?? "";

    // Check if the common fields are empty
    if (empty($patientName) || empty($recordDate)) {

        // Show an error message
        echo "Please complete the patient name and record date.";

    // Check the fields required for a medication record
    } elseif ($recordType == "medication" && (empty($medicineName) || empty($dosage))) {

        // Show an error message
        echo "Please complete the medicine name and dosage.";

    // Check the fields required for an appointment record
    } elseif ($recordType == "appointment" && (empty($doctorName) || empty($appointmentTime))) {

        // Show an error message
        echo "Please complete the doctor name and appointment time.";

    // Check the fields required for a vital record
    } elseif ($recordType == "vital" && (empty($bloodPressure) || empty($heartRate))) {

        // Show an error message
        echo "Please complete the blood pressure and heart rate.";

    } else {

        // Create the correct child object based on the selected record type
        if ($recordType == "medication") {

            // Create a MedicationRecord object
            $record = new MedicationRecord(
                $patientName,
                $recordDate,
                $medicineName,
                $dosage
            );

        } elseif ($recordType == "appointment") {

            // Create an AppointmentRecord object
            $record = new AppointmentRecord(
                $patientName,
                $recordDate,
                $doctorName,
                $appointmentTime
            );

        } elseif ($recordType == "vital") {

            // Create a VitalRecord object
            $record = new VitalRecord(
                $patientName,
                $recordDate,
                $bloodPressure,
                $heartRate
            );
        }

        // Store the record object in the session
        $_SESSION["record"] = $record;

        // Store the record type in the session
        $_SESSION["recordType"] = $recordType;

        // Go to the results page
        header("Location: results.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>MediTrack</title>
</head>

<body>

    <h1>MediTrack</h1>

    <!-- Form for entering a new medical record -->
    <form method="POST">

        <!-- Choose the type of medical record -->
        <label>Record Type:</label>
        <select name="recordType" required>
            <option value="">Select Record Type</option>
            <option value="medication">Medication</option>
            <option value="appointment">Appointment</option>
            <option value="vital">Vital Sign</option>
        </select>

        <br><br>

        <!-- Input for the patient's name -->
        <label>Patient Name:</label>
        <input type="text" name="patientName" required>

        <br><br>

        <!-- Input for the record date -->
        <label>Record Date:</label>
        <input type="date" name="recordDate" required>

        <br><br>

        <!-- Medicine field group -->
        <div id="medicineField">

            <!-- Input for the medicine name -->
            <label>Medicine Name:</label>
            <input type="text" name="medicineName">

            <br><br>

            <!-- Input for the medicine dosage -->
            <label>Dosage:</label>
            <input type="text" name="dosage">

            <br><br>

        </div>

        <!-- Vital sign field group -->
        <div id="vitalField">

            <!-- Input for the blood pressure -->
            <label>Blood Pressure:</label>
            <input type="text" name="bloodPressure" placeholder="e.g. 120/80">

            <br><br>

            <!-- Input for the heart rate -->
            <label>Heart Rate:</label>
            <input type="text" name="heartRate" placeholder="e.g. 72 bpm">

            <br><br>

        </div>

        <!-- Appointment field group -->
        <div id="appointmentField">

            <!-- Input for the doctor's name -->
            <label>Doctor Name:</label>
            <input type="text" name="doctorName">

            <br><br>

            <!-- Input for the appointment time -->
            <label>Appointment Time:</label>
            <input type="time" name="appointmentTime">

            <br><br>

        </div>

        <!-- Submit button -->
        <button type="submit">Create Record</button>
        <a href="../index.php"><button type="button">Home</button>
</a>

    </form>

    <script src="../assets/js/script.js"></script>

</body>
</html>