<?php

// Load the classes before accessing the session object
require_once "../classes/MedicalRecord.php";
require_once "../classes/MedicationRecord.php";
require_once "../classes/AppointmentRecord.php";
require_once "../classes/VitalRecord.php";

// Start the session para ma access ang saved record
session_start();

// Get the record object from the session
$record = $_SESSION["record"] ?? null;

// Get the record type from the session
$recordType = $_SESSION["recordType"] ?? null;

// Check if a record exists
if ($record === null) {
    echo "No record found.";
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>MediTrack - Results</title>
</head>

<body>

    <h1>Medical Record Result</h1>

    <!-- Display common information from the parent class -->
    <p>Type: <?php echo $record->getType(); ?></p>
    <p>Patient Name: <?php echo $record->getPatientName(); ?></p>
    <p>Record Date: <?php echo $record->getRecordDate(); ?></p>

    <?php

    // Display information specific to the selected record type
    if ($recordType == "medication") {

        echo "<p>Medicine: " . $record->getMedicineName() . "</p>";
        echo "<p>Dosage: " . $record->getDosage() . "</p>";

    } elseif ($recordType == "appointment") {

        echo "<p>Doctor: " . $record->getDoctorName() . "</p>";
        echo "<p>Appointment Time: " . $record->getAppointmentTime() . "</p>";

    } elseif ($recordType == "vital") {

        echo "<p>Blood Pressure: " . $record->getBloodPressure() . "</p>";
        echo "<p>Heart Rate: " . $record->getHeartRate() . "</p>";
    }

    ?>

    <br>

    <!-- Link back to the record form -->
    <a href="create_record.php">Create Another Record</a>

</body>
</html>