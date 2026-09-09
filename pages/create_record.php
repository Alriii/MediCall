<?php

// DATA PROCESSING: Load the shared PHP setup
require_once "../includes/bootstrap.php";

// USER INPUT + DATA PROCESSING: Check if the main form fields were submitted
if (isset($_POST["recordType"], $_POST["patientName"], $_POST["recordDate"])) {

    // USER INPUT: Get the selected record type from the form
    $recordType = $_POST["recordType"];

    // USER INPUT: Get the patient's name from the form
    $patientName = $_POST["patientName"];

    // USER INPUT: Get the record date from the form
    $recordDate = $_POST["recordDate"];

    // USER INPUT: Get the medicine name if it was submitted
    $medicineName = $_POST["medicineName"] ?? "";

    // USER INPUT: Get the dosage if it was submitted
    $dosage = $_POST["dosage"] ?? "";

    // USER INPUT: Get the blood pressure if it was submitted
    $bloodPressure = $_POST["bloodPressure"] ?? "";

    // USER INPUT: Get the heart rate if it was submitted
    $heartRate = $_POST["heartRate"] ?? "";

    // USER INPUT: Get the doctor's name if it was submitted
    $doctorName = $_POST["doctorName"] ?? "";

    // USER INPUT: Get the appointment time if it was submitted
    $appointmentTime = $_POST["appointmentTime"] ?? "";


    // INPUT VALIDATION: Check if the common fields are empty
    if (empty($patientName) || empty($recordDate)) {

        // INPUT VALIDATION: Show an error message if a required field is empty
        echo "Please complete the patient name and record date.";


    // INPUT VALIDATION: Check the fields required for a medication record
    } elseif ($recordType == "medication" && (empty($medicineName) || empty($dosage))) {

        echo "Please complete the medicine name and dosage.";


    // INPUT VALIDATION: Check the fields required for an appointment record
    } elseif ($recordType == "appointment" && (empty($doctorName) || empty($appointmentTime))) {

        echo "Please complete the doctor name and appointment time.";


    // INPUT VALIDATION: Check the fields required for a vital record
    } elseif ($recordType == "vital" && (empty($bloodPressure) || empty($heartRate))) {

        echo "Please complete the blood pressure and heart rate.";

    } else {

        // DATA PROCESSING: Create the correct child object based on the selected record type

        if ($recordType == "medication") {

            // CHILD CLASS: MedicationRecord inherits from the parent MedicalRecord
            // INHERITANCE: extends is used inside MedicationRecord.php
            // CONSTRUCTOR: Create a MedicationRecord object using the constructor
            $record = new MedicationRecord(
                $patientName,
                $recordDate,
                $medicineName,
                $dosage
            );

        } elseif ($recordType == "appointment") {

            // CHILD CLASS: AppointmentRecord inherits from the parent MedicalRecord
            // CONSTRUCTOR: Create an AppointmentRecord object using the constructor
            $record = new AppointmentRecord(
                $patientName,
                $recordDate,
                $doctorName,
                $appointmentTime
            );

        } elseif ($recordType == "vital") {

            // CHILD CLASS: VitalRecord inherits from the parent MedicalRecord
            // CONSTRUCTOR: Create a VitalRecord object using the constructor
            $record = new VitalRecord(
                $patientName,
                $recordDate,
                $bloodPressure,
                $heartRate
            );
        }

        // POLYMORPHISM: The same $record variable can hold different child objects
        // depending on the record type selected by the user
        $_SESSION["record"] = $record;

        // DATA PROCESSING: Store the selected record type for the results page
        $_SESSION["recordType"] = $recordType;

        // DATA PROCESSING: Send the user to the results page
        header("Location: results.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>MediTrack</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <h1>MediTrack</h1>

    <!-- USER INPUT: Form used by the user to enter a medical record -->
    <form method="POST">

        <!-- USER INPUT: Select the type of medical record -->
        <label>Record Type:</label>

        <select name="recordType" required>
            <option value="">Select Record Type</option>
            <option value="medication">Medication</option>
            <option value="appointment">Appointment</option>
            <option value="vital">Vital Sign</option>
        </select>

        <br><br>

        <!-- USER INPUT: Enter the patient's name -->
        <label>Patient Name:</label>
        <input type="text" name="patientName" required>

        <br><br>

        <!-- USER INPUT: Enter the record date -->
        <label>Record Date:</label>
        <input type="date" name="recordDate" required>

        <br><br>

        <!-- USER INPUT: Fields for MedicationRecord -->
        <div id="medicineField">

            <label>Medicine Name:</label>
            <input type="text" name="medicineName">

            <br><br>

            <label>Dosage:</label>
            <input type="text" name="dosage">

            <br><br>

        </div>

        <!-- USER INPUT: Fields for VitalRecord -->
        <div id="vitalField">

            <label>Blood Pressure:</label>
            <input type="text" name="bloodPressure" placeholder="e.g. 120/80">

            <br><br>

            <label>Heart Rate:</label>
            <input type="text" name="heartRate" placeholder="e.g. 72 bpm">

            <br><br>

        </div>

        <!-- USER INPUT: Fields for AppointmentRecord -->
        <div id="appointmentField">

            <label>Doctor Name:</label>
            <input type="text" name="doctorName">

            <br><br>

            <label>Appointment Time:</label>
            <input type="time" name="appointmentTime">

            <br><br>

        </div>

        <!-- USER INPUT: Submit the entered medical record -->
        <button type="submit">Create Record</button>

        <!-- USER INPUT: Return to the home page -->
        <a href="../index.php">
            <button type="button">Home</button>
        </a>

    </form>

    <script src="../assets/js/script.js"></script>

</body>
</html>