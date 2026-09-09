<?php

require_once "MedicalRecord.php";

// Making VitalRecord (child) inherit from MedicalRecord (parent)
class VitalRecord extends MedicalRecord
{
    public function getType()
    {
        return "Vital Record";
    }
}