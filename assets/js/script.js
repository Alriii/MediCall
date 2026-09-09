    // Get the record type dropdown
    const recordType = document.querySelector('select[name="recordType"]');

    // Get the blood pressure input
    const bloodPressure = document.querySelector('input[name="bloodPressure"]');

    // Get the heart rate input
    const heartRate = document.querySelector('input[name="heartRate"]');

    // Get the whole medicine field group
    const medicineField = document.getElementById("medicineField");

    // Get the whole vital sign field group
    const vitalField = document.getElementById("vitalField");

    // Get the whole appointment field group
    const appointmentField = document.getElementById("appointmentField");

    // Hide all record-specific fields when the page first loads
    medicineField.style.display = "none";
    appointmentField.style.display = "none";
    vitalField.style.display = "none";

    // Run this when the user changes the record type
    recordType.addEventListener("change", function () {

        // Get the selected record type
        const selectedType = recordType.value;

        if (selectedType === "medication") {

            // Show medicine fields
            medicineField.style.display = "block";

            // Hide appointment and vital fields
            appointmentField.style.display = "none";
            vitalField.style.display = "none";

        } else if (selectedType === "appointment") {

            // Hide medicine and vital fields
            medicineField.style.display = "none";
            vitalField.style.display = "none";

            // Show appointment fields
            appointmentField.style.display = "block";

        } else if (selectedType === "vital") {

            // Hide medicine and appointment fields
            medicineField.style.display = "none";
            appointmentField.style.display = "none";

            // Show vital fields
            vitalField.style.display = "block";

        } else {

            // Hide all fields when no record type is selected
            medicineField.style.display = "none";
            appointmentField.style.display = "none";
            vitalField.style.display = "none";
        }

    });