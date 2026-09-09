<?php

require_once "classes/MedicalRecord.php";
require_once "classes/MedicationRecord.php";
require_once "classes/AppointmentRecord.php";
require_once "classes/VitalRecord.php";

// Creating different child objects
$medication = new MedicationRecord("John", "2026-09-09", "Paracetamol", "500mg");
$appointment = new AppointmentRecord("Mary", "2026-09-10");
$vital = new VitalRecord("Mark", "2026-09-11");

// Asking each object for its type
echo $medication->getType() . "<br>";
echo $appointment->getType() . "<br>";
echo $vital->getType() . "<br>";
?>