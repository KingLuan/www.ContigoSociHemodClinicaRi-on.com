<?php
require 'conxion.php';
//$search=mysqli_real_escape_string($_POST['search']); /*WHERE usuario LIKE '%$search%'*/
$consul="SELECT * FROM login";
$resp=mysqli_query($conectar,$consul);
$ver1=mysqli_fetch_array($resp);


?>
