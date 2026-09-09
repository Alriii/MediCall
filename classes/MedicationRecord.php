<?php

require_once "MedicalRecord.php";

//making the MedicationRecord(child) inherit from the MedicalRecord(parent) class
class MedicationRecord extends MedicalRecord
{

    // properties specific to MedicationRecord
    private $medicineName;
    private $dosage;

    // Constructor for creating a MedicationRecord object
 public function __construct($patientName, $recordDate, $medicineName, $dosage)
{
    // Calling the parent MedicalRecord constructor to set the inherited patient name and record date
    parent::__construct($patientName, $recordDate);

    // Storing the medicine name in this MedicationRecord object
    $this->medicineName = $medicineName;

    // Storing the dosage in this MedicationRecord object
    $this->dosage = $dosage;
}

// Getter methods for the medicine name
public function getMedicineName()
{
    return $this->medicineName;
}

//  Getter method for the dosage
public function getDosage()
{
    return $this->dosage;
}

public function getType()
{
    return "Medication Record";

}

}
