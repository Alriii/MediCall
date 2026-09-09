<?php

require_once "MedicalRecord.php";

// Making AppointmentRecord (child) inherit from MedicalRecord (parent)
class AppointmentRecord extends MedicalRecord
{
    // Property specific to AppointmentRecord
    private $doctorName;

    // Property specific to AppointmentRecord
    private $appointmentTime;

    // Constructor for creating an AppointmentRecord object
    public function __construct($patientName, $recordDate, $doctorName, $appointmentTime)
    {
        // Calling the parent constructor to set the inherited patient name and record date
        parent::__construct($patientName, $recordDate);

        // Storing the doctor's name in this AppointmentRecord object
        $this->doctorName = $doctorName;

        // Storing the appointment time in this AppointmentRecord object
        $this->appointmentTime = $appointmentTime;
    }

    // Getter method for the doctor's name
    public function getDoctorName()
    {
        return $this->doctorName;
    }

    // Getter method for the appointment time
    public function getAppointmentTime()
    {
        return $this->appointmentTime;
    }

    // Overriding the getType() method from the parent class
    public function getType()
    {
        return "Appointment Record";
    }
}