<?php
  
    // Connect to database 
    $con=mysqli_connect("localhost","root","","clinica");
  
    // Check if id is set or not if true toggle,
    // else simply go back to the page
    if (isset($_GET['id'])){
  
        // Store the value from get to a 
        // local variable "course_id"
        echo ($_GET['id']);

        
        $course_id=$_GET['id'];
  
        // SQL query that sets the status
        // to 1 to indicate activation.
        $sql="UPDATE `cita_medica` SET 
        `estado`=0 WHERE id_cita='$course_id'";
  
        // Execute the query
        mysqli_query($con,$sql);
    }
  
    // Go back to course-page.php
    header('location: listacitasagendadass.php');
?>