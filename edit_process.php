<?php
include("config.php");
if(isset($_POST['save'])){
    $id=$_POST['id'];    
    $studentName=$_POST['studentName'];
    $grade1 = $_POST['grade1']==null ? "null": $_POST['grade1'];
    $grade2 = $_POST['grade2']==null ? "null": $_POST['grade2'];
    $grade3 = $_POST['grade3']==null ? "null": $_POST['grade3'];
    $grade4 = $_POST['grade4']==null ? "null": $_POST['grade4'];
    echo($grade3);

    $sql="UPDATE students SET studentName='$studentName', grades1=$grade1, grades2=$grade2, grades3=$grade3, grades4=$grade4 where id=$id";
    $query= mysqli_query($cnx,$sql);
    if($query){
        header('Location: index.php');
    } else {
        die("Fail to save...");
    }
}
else{
    die("Not accessable");
}
?>
