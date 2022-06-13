<?php 
    include("config.php");

    

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        
        $del = "DELETE FROM info WHERE id='$id'";

        mysqli_query($conn, $del);


    }

    header("location:index.php");




