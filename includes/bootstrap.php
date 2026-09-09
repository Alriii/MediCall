<?php

// DATA PROCESSING: Start the PHP session
session_start();

// DATA PROCESSING: Load the parent class
require_once "../classes/MedicalRecord.php";

// DATA PROCESSING: Load the child classes
require_once "../classes/MedicationRecord.php";
require_once "../classes/AppointmentRecord.php";
require_once "../classes/VitalRecord.php";