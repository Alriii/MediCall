<?php

// DATA PROCESSING: Load the parent MedicalRecord class
require_once "MedicalRecord.php";

// CHILD CLASS + INHERITANCE:
// MedicationRecord is a child class that inherits from the MedicalRecord parent class
class MedicationRecord extends MedicalRecord
{
    // ENCAPSULATION: Private properties that can only be directly accessed inside MedicationRecord
    private $medicineName;
    private $dosage;

    // CONSTRUCTOR: Creates a MedicationRecord object using parent and child information
    public function __construct($patientName, $recordDate, $medicineName, $dosage)
    {
        // INHERITANCE: Call the parent constructor to set the inherited patient name and record date
        parent::__construct($patientName, $recordDate);

        // Store the medicine name in this MedicationRecord object
        $this->medicineName = $medicineName;

        // Store the dosage in this MedicationRecord object
        $this->dosage = $dosage;
    }

    // ENCAPSULATION: Public getter provides controlled access to the private medicine name
    public function getMedicineName()
    {
        return $this->medicineName;
    }

    // ENCAPSULATION: Public getter provides controlled access to the private dosage
    public function getDosage()
    {
        return $this->dosage;
    }

    // METHOD OVERRIDING: MedicationRecord replaces the parent's getType() behavior with its own
    // POLYMORPHISM: The same getType() method can produce a different result for different child classes
    public function getType()
    {
        return "Medication Record";
    }
}