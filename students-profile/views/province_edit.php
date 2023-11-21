<?php
include_once("../db.php"); // Include the Database class file
include_once("../student.php"); // Include the Student class file
include_once("../province.php"); //Include the Town_City class file

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch student data by ID from the database
    $db = new Database();
    //$student = new Student($db);
    $prov_data = $province->read($id); // Implement the read method in the Student class

    if ($prov_data) {
        // The student data is retrieved, and you can pre-fill the edit form with this data.
    } else {
        echo "Student not found.";
    }
} else {
    echo "Student ID not provided.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
    ];

    $db = new Database();
    $province = new $province($db);

    // Call the edit method to update the student data
    if ($province->update($id, $data)) {
        echo "Record updated successfully.";
    } else {
        echo "Failed to update the record.";
    }
}
?> 