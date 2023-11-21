<?php
include_once("../db.php"); // Include the Database class file
include_once("../student.php"); // Include the Student class file
include_once("../student_details.php"); // Include the Student class file
include_once("../province.php");





if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [    
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    ];

    // Instantiate the Database and Student classes
    $database = new Database();
    $province = new province($database);
    $province = $province->create($data);
    
    if ($id) {
        // Student record successfully created
        
        // Retrieve student details from the form
        $studentDetailsData = [
            'id' => $id, // Use the obtained student ID
            'name' => $_POST['name'],
            //  town_city details fields
        ];

        // Create student details linked to the student
        $province_Details = new province($database);
        
        if ($province_Details->create($province_DetailsData)) {
            echo "Record inserted successfully.";
        } else {
            echo "Failed to insert the record.";
        }
    }

    
}
?>