<?php

include("config.php");

// If not ID provided
if( !isset($_GET['student']) ){
    header('Location: index.php');
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

?>

<html>
    <head>
        <title>
            Edit data
        </title>
    </head>
    <body>
    <?php include("header.php"); ?>
        <h3> Student Edit Data </h3>
        <form action="edit_process.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $student['id'] ?>" />

            <div>
                <label for="studentName">Student Name :</label>
                <input readonly type="text" name="studentName" value="<?php echo $student['studentName']?>" />
            </div>
            <div>
                <label for="grade1">Grade 1 :</label>
                <input  type="number" max="10" step="0.01" name="grade1" value= <?php echo $student['grade1'] ?? null?> />
            </div>
            <div>
                <label for="grade2">Grade 2 :</label>
                <input  type="number" max="10" step="0.01" name="grade2" value=<?php echo $student['grade2']?? null?> />
            </div>
            <div>
                <label for="grade3">Grade 3 :</label>
                <input  type="number" max="10" step="0.01" name="grade3" value=<?php echo $student['grade3']?? null?> />
            </div>
            <div>
                <label for="grade4">Grade 4 :</label>
                <input  type="number" max="10" step="0.01" name="grade4" value=<?php echo $student['grade4']?? null?> />
            </div>

            <br>
            <input type="submit" value="save" name="save"/>
        </form>

    </body>
</html>