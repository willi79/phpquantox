<?php include("config.php"); ?>
<html>
    <head>
        <title>List of Student </title>
        <link rel="stylesheet" href="css/table.css">
    </head>

    <body>
        <div style="width:50%">
            <h2>This is the list of students </h2>
        </div>
        <br>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql="SELECT * FROM students";
                        $query = mysqli_query($cnx, $sql);
                        while($student = mysqli_fetch_array($query)){
                            
                            echo "<tr>";
                                echo "<td> <a href='students.php?student=".$student['id']."'>" .$student['id']. "</a> </td>";
                                echo "<td>".$student['name']. "</td>";
                            echo "<tr>";
                            
                            
                        }


                    ?>
                </tbody>
            </table>
        </div>
</html>