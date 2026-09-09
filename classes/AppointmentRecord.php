<?php

// DATA PROCESSING: Load the parent MedicalRecord class
require_once "MedicalRecord.php";

// CHILD CLASS + INHERITANCE:
// AppointmentRecord is a child class that inherits from the MedicalRecord parent class
class AppointmentRecord extends MedicalRecord
{
    // ENCAPSULATION: Private property that can only be directly accessed inside AppointmentRecord
    private $doctorName;

    // ENCAPSULATION: Private property that can only be directly accessed inside AppointmentRecord
    private $appointmentTime;

    // CONSTRUCTOR: Creates an AppointmentRecord object using parent and child information
    public function __construct($patientName, $recordDate, $doctorName, $appointmentTime)
    {
        // INHERITANCE: Call the parent constructor to set the inherited patient name and record date
        parent::__construct($patientName, $recordDate);

        // Store the doctor's name in this AppointmentRecord object
        $this->doctorName = $doctorName;

        // Store the appointment time in this AppointmentRecord object
        $this->appointmentTime = $appointmentTime;
    }

    // ENCAPSULATION: Public getter provides controlled access to the private doctor name
    public function getDoctorName()
    {
        return $this->doctorName;
    }

    // ENCAPSULATION: Public getter provides controlled access to the private appointment time
    public function getAppointmentTime()
    {
        return $this->appointmentTime;
    }

    // METHOD OVERRIDING: AppointmentRecord replaces the parent's getType() behavior with its own
    // POLYMORPHISM: The same getType() method can produce a different result for different child classes
    public function getType()
    {
        return "Appointment Record";
    }
}