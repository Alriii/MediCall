<?php

require_once "classes/MedicalRecord.php";

$record = new MedicalRecord("John Doe", "2026-09-09");

echo "MediTrack is working!";
echo "Patient Name: " . $record->getPatientName() . "\n";
echo "Record Date: " . $record->getRecordDate() . "\n";