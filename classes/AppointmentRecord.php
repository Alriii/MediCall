<?php

require_once "MedicalRecord.php";

// Making AppointmentRecord (child) inherit from MedicalRecord (parent)
class AppointmentRecord extends MedicalRecord
{
    public function getType()
    {
        return "Appointment Record";
    }
}