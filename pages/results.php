<?php

// DATA PROCESSING: Load the shared PHP setup
require_once "../includes/bootstrap.php";

// DATA PROCESSING: Get the record object saved from create_record.php
$record = $_SESSION["record"] ?? null;

// DATA PROCESSING: Get the selected record type saved from create_record.php
$recordType = $_SESSION["recordType"] ?? null;

// DATA PROCESSING: Check if a record exists
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

    <!-- INHERITANCE: These methods come from the MedicalRecord parent class -->
    <p>Type: <?php echo $record->getType(); ?></p>
    <p>Patient Name: <?php echo $record->getPatientName(); ?></p>
    <p>Record Date: <?php echo $record->getRecordDate(); ?></p>

    <?php

    // POLYMORPHISM: The same $record variable can contain different child objects
    // depending on the record type selected by the user
    if ($recordType == "medication") {

        // Display information specific to MedicationRecord
        echo "<p>Medicine: " . $record->getMedicineName() . "</p>";
        echo "<p>Dosage: " . $record->getDosage() . "</p>";

    } elseif ($recordType == "appointment") {

        // Display information specific to AppointmentRecord
        echo "<p>Doctor: " . $record->getDoctorName() . "</p>";
        echo "<p>Appointment Time: " . $record->getAppointmentTime() . "</p>";

    } elseif ($recordType == "vital") {

        // Display information specific to VitalRecord
        echo "<p>Blood Pressure: " . $record->getBloodPressure() . "</p>";
        echo "<p>Heart Rate: " . $record->getHeartRate() . "</p>";
    }

    ?>

    <br>

    <!-- DATA PROCESSING: Return to the record creation form -->
    <a href="create_record.php">Create Another Record</a>

    <br><br>

    <!-- DATA PROCESSING: Return to the home page -->
    <a href="../index.php">Home</a>

</body>
</html>