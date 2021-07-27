<?php include("config.php"); ?>
<html>
    <head>
        <title>List of Student </title>
        <link rel="stylesheet" href="css/table.css">
    </head>

    <body>
        <?php include("header.php"); 
            ?>
        <div style="width:50%">
            <h2>This is the list of students </h2>
        </div>
        <br>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql="SELECT * FROM students";
                        $query = mysqli_query($cnx, $sql);
                        while($student = mysqli_fetch_array($query)){
                            
                            echo "<tr>";
                                echo "<td> <a href='student.php?student=".$student['id']."'>" .$student['id']. "</a> </td>";
                                echo "<td>".$student['studentName']. "</td>";
                                echo "<td> <a href='edit.php?student=".$student['id']."'> Edit </a> </td>";
                            echo "<tr>";
                            
                            
                        }


                    ?>
                </tbody>
            </table>
        </div>
</html>