<?php

// DATA PROCESSING: Load the parent MedicalRecord class
require_once "MedicalRecord.php";

// CHILD CLASS + INHERITANCE:
// VitalRecord is a child class that inherits from the MedicalRecord parent class
class VitalRecord extends MedicalRecord
{
    // ENCAPSULATION: Private properties that can only be directly accessed inside VitalRecord
    private $bloodPressure;
    private $heartRate;

    // CONSTRUCTOR: Creates a VitalRecord object and receives both parent and child information
    public function __construct($patientName, $recordDate, $bloodPressure, $heartRate)
    {
        // INHERITANCE: Call the parent constructor to set the inherited patient name and record date
        parent::__construct($patientName, $recordDate);

        // Store the blood pressure in this VitalRecord object
        $this->bloodPressure = $bloodPressure;

        // Store the heart rate in this VitalRecord object
        $this->heartRate = $heartRate;
    }

    // ENCAPSULATION: Public getter provides controlled access to the private blood pressure
    public function getBloodPressure()
    {
        return $this->bloodPressure;
    }

    // ENCAPSULATION: Public getter provides controlled access to the private heart rate
    public function getHeartRate()
    {
        return $this->heartRate;
    }

    // METHOD OVERRIDING: VitalRecord replaces the parent's getType() behavior with its own
    // POLYMORPHISM: The same getType() method can return a different result for each child class
    public function getType()
    {
        return "Vital Record";
    }
}