// USER INPUT: Get the record type dropdown so JavaScript can detect the user's selection
const recordType = document.querySelector('select[name="recordType"]');

// USER INPUT: Get the blood pressure input from the form
const bloodPressure = document.querySelector('input[name="bloodPressure"]');

// USER INPUT: Get the heart rate input from the form
const heartRate = document.querySelector('input[name="heartRate"]');

// DATA PROCESSING: Get the whole medicine field group so JavaScript can show or hide it
const medicineField = document.getElementById("medicineField");

// DATA PROCESSING: Get the whole vital sign field group so JavaScript can show or hide it
const vitalField = document.getElementById("vitalField");

// DATA PROCESSING: Get the whole appointment field group so JavaScript can show or hide it
const appointmentField = document.getElementById("appointmentField");

// DATA PROCESSING: Hide all record-specific fields when the page first loads
medicineField.style.display = "none";
appointmentField.style.display = "none";
vitalField.style.display = "none";

// USER INPUT: Listen for changes when the user selects a different record type
recordType.addEventListener("change", function () {

    // DATA PROCESSING: Get the record type selected by the user
    const selectedType = recordType.value;

    // Check if the user selected Medication
    if (selectedType === "medication") {

        // DATA PROCESSING: Show the fields needed for a medication record
        medicineField.style.display = "block";

        // Hide fields that are not needed for Medication
        appointmentField.style.display = "none";
        vitalField.style.display = "none";

    // Check if the user selected Appointment
    } else if (selectedType === "appointment") {

        // Hide fields that are not needed for Appointment
        medicineField.style.display = "none";
        vitalField.style.display = "none";

        // DATA PROCESSING: Show the fields needed for an appointment record
        appointmentField.style.display = "block";

    // Check if the user selected Vital Sign
    } else if (selectedType === "vital") {

        // Hide fields that are not needed for Vital Sign
        medicineField.style.display = "none";
        appointmentField.style.display = "none";

        // DATA PROCESSING: Show the fields needed for a vital record
        vitalField.style.display = "block";

    } else {

        // DATA PROCESSING: Hide all record-specific fields when no type is selected
        medicineField.style.display = "none";
        appointmentField.style.display = "none";
        vitalField.style.display = "none";
    }

});