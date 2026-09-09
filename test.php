<?php

require_once "classes/MedicalRecord.php";
require_once "classes/MedicationRecord.php";
require_once "classes/AppointmentRecord.php";
require_once "classes/VitalRecord.php";

// Creating a MedicationRecord object
$medication = new MedicationRecord(
    "John",
    "2026-09-09",
    "Paracetamol",
    "500mg"
);

// Creating an AppointmentRecord object
$appointment = new AppointmentRecord(
    "Mary",
    "2026-09-10",
    "Dr. Santos",
    "10:00 AM"
);

// Creating a VitalRecord object
$vital = new VitalRecord(
    "Mark",
    "2026-09-11",
    "120/80",
    "72 bpm"
);

// Displaying MedicationRecord information
echo "<h3>" . $medication->getType() . "</h3>";
echo "Patient: " . $medication->getPatientName() . "<br>";
echo "Date: " . $medication->getRecordDate() . "<br>";
echo "Medicine: " . $medication->getMedicineName() . "<br>";
echo "Dosage: " . $medication->getDosage() . "<br><br>";

// Displaying AppointmentRecord information
echo "<h3>" . $appointment->getType() . "</h3>";
echo "Patient: " . $appointment->getPatientName() . "<br>";
echo "Date: " . $appointment->getRecordDate() . "<br>";
echo "Doctor: " . $appointment->getDoctorName() . "<br>";
echo "Time: " . $appointment->getAppointmentTime() . "<br><br>";

// Displaying VitalRecord information
echo "<h3>" . $vital->getType() . "</h3>";
echo "Patient: " . $vital->getPatientName() . "<br>";
echo "Date: " . $vital->getRecordDate() . "<br>";
echo "Blood Pressure: " . $vital->getBloodPressure() . "<br>";
echo "Heart Rate: " . $vital->getHeartRate() . "<br>";