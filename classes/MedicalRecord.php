<?php

// PARENT CLASS: MedicalRecord is the main/base class for all medical records
class MedicalRecord
{
    // ENCAPSULATION: Protected properties can be accessed by this class and its child classes
    protected $patientName;
    protected $recordDate;

    // CONSTRUCTOR: Automatically runs when a MedicalRecord object is created
    public function __construct($patientName, $recordDate)
    {
        // Store the patient's name
        $this->patientName = $patientName;

        // Store the record date
        $this->recordDate = $recordDate;
    }

    // ENCAPSULATION: Getter for the patient's name
    public function getPatientName()
    {
        return $this->patientName;
    }

    // ENCAPSULATION: Getter for the record date
    public function getRecordDate()
    {
        return $this->recordDate;
    }

    // POLYMORPHISM: This method can be overridden by child classes
    public function getType()
    {
        return "Medical Record";
    }
}