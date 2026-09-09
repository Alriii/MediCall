<?php

class MedicalRecord
{
    //property
    protected $patientName;
    protected $recordDate;

    //function
    public function __construct($patientName, $recordDate)
    {
        $this->patientName = $patientName;
        $this->recordDate = $recordDate;
    }

    //getter methods
    public function getPatientName()
    {
        return $this->patientName;
    }

    //getter methods
    public function getRecordDate()
    {
        return $this->recordDate;
    }
}