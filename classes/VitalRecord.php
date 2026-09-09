<?php

require_once "MedicalRecord.php";

// Making VitalRecord (child) inherit from MedicalRecord (parent)
class VitalRecord extends MedicalRecord
{
    // Properties specific to VitalRecord
    private $bloodPressure;
    private $heartRate;

    // Constructor for creating a VitalRecord object
    public function __construct($patientName, $recordDate, $bloodPressure, $heartRate)
    {
        // Calling the parent constructor to set the inherited patient name and record date
        parent::__construct($patientName, $recordDate);

        // Storing the blood pressure in this VitalRecord object
        $this->bloodPressure = $bloodPressure;

        // Storing the heart rate in this VitalRecord object
        $this->heartRate = $heartRate;
    }

    // Getter method for the blood pressure
    public function getBloodPressure()
    {
        return $this->bloodPressure;
    }

    // Getter method for the heart rate
    public function getHeartRate()
    {
        return $this->heartRate;
    }

    // Overriding the getType() method from the parent class
    public function getType()
    {
        return "Vital Record";
    }
}