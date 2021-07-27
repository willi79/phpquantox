<?php

header("Access-Control-Allow-Origin: *");
include("config.php");

// If not ID provided
if( !isset($_GET['student']) ){
    header('Location: index.php');
}

//Check SchoolBoard Type. If error then type=CSB
if( !isset($_GET['type']) ){
    $type = "CSB";
}
else{
    $type = $_GET['type'];
}

//GET ID
$id = $_GET['student'];


// Get from DB
$sql = "SELECT * FROM students WHERE id=$id";
$query = mysqli_query($cnx, $sql);
$student = mysqli_fetch_assoc($query);

// Not found
if( mysqli_num_rows($query) < 1 ){
    die("Not found...");
}
$i=0;
$cnt = 0;
$sum = 0;
$least = 10;
$biggest = 0;

if($student['grades1']!=null ){
    $cnt=$cnt+1; 
    $sum+=$student['grades1'];
    if($least>$student['grades1']){
        $least=$student['grades1'];
    }
    if($biggest<$student['grades1']){
        $biggest=$student['grades1'];
    }
}

if($student['grades2']!=null ){
    $cnt=$cnt+1; 
    $sum+=$student['grades2'];
    if($least>$student['grades2']){
        $least=$student['grades2'];
    }
    if($biggest<$student['grades2']){
        $biggest=$student['grades2'];
    }
}
if($student['grades3']!=null ){
    $cnt=$cnt+1; 
    $sum+=$student['grades3'];
    if($least>$student['grades3']){
        $least=$student['grades3'];
    }
    if($biggest<$student['grades3']){
        $biggest=$student['grades3'];
    }
}

if($student['grades4']!=null ){
    $cnt=$cnt+1; 
    $sum+=$student['grades4'];
    if($least>$student['grades4']){
        $least=$student['grades4'];
    }
    if($biggest<$student['grades4']){
        $biggest=$student['grades4'];
    }
}
//CSM
if ($cnt==0)
{
    $averageCSB = 0;
    $statusCSB = "Fail";
    $averageCSMB = 0;
    $statusCSMB = "Fail";
}
else{
    $averageCSB = $sum/$cnt;
    $statusCSB = $averageCSB >= 7 ? "Pass" : "Fail";


    if ($cnt>2){
        $averageCSMB = ($sum-$least)/($cnt-1);
    }
    else{
        $averageCSMB=$averageCSB;
    }

    $statusCSMB = $biggest > 8 ? "Pass" : "Fail";
}

// Insert to Array
$studentCSB = $student;
$studentCSB['board'] = "CSB";
$studentCSB['average'] = $averageCSB;
$studentCSB['status'] = $statusCSB;

$studentCSMB = $student;
$studentCSMB['board'] = "CSMB";
$studentCSMB['average'] = $averageCSMB;
$studentCSMB['status'] = $statusCSMB;

//JSON Result
$resultCSB = json_encode($studentCSB);


$s=<<<XML
<student>
</student>
XML;

$xml = new SimpleXMLElement($s);
$xml->addChild("id",$studentCSMB['id']);
$xml->addChild("studentName",$studentCSMB['studentName']);
$xml->addChild("grades1",$studentCSMB['grades1']);
$xml->addChild("grades2",$studentCSMB['grades2']);
$xml->addChild("grades3",$studentCSMB['grades3']);
$xml->addChild("grades4",$studentCSMB['grades4']);
$xml->addChild("board",$studentCSMB['board']);
$xml->addChild("average",$studentCSMB['average']);
$xml->addChild("status",$studentCSMB['status']);

// Check Schoolboard type
if (strtoupper($type)=="CSMB"){
    header('Content-type: text/xml');
    echo $xml->asXML();
}
else{
    echo $resultCSB ;
}


?>