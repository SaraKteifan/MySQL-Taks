<?php
include 'connection.php';
header("Content-type:application/json");

$employees= [];
$sql= "SELECT * FROM employees;";
$result= mysqli_query($conn, $sql);
$resultcheck= mysqli_num_rows($result);
if($resultcheck > 0){
    while($row = mysqli_fetch_assoc($result)){
        $employees[$row['emp_id']]=array('id'=> $row['emp_id'],
        'name'=> $row['emp_name'],
        'image'=> $row['emp_img'],
        'email'=> $row['emp_email'],
        'salary'=> $row['emp_salary'],
    );
    }
}
// echo json_encode($employees);
print_r(json_encode($employees));
?>