<?php

include("config.php");

$photo="";
$image= "";


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $image= $_FILES['image'];

    // print_r($_FILES['photo']); 

    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_des = "images/".$img_name;

    move_uploaded_file($img_loc,$img_des);

    $insert = "INSERT INTO info (Name, Image) VALUES ('$name','$img_des')";

    mysqli_query($conn,$insert) or die($conn->error);

    header("location:index.php");   

}


    

    // $insert = "INSERT INTO info (Name, Image) VALUES ('$name','$image')";
    // $result =  mysqli_query($conn,$insert);
    //     if($result){
    //         move_uploaded_file(['image']['tmp_name'],"images/".$_FILES['image']['name']);
        
    //     }
    //     else {
    //         die(mysqli_error($conn));
    //     }



//    $insert = "INSERT INTO info (Name, Image) VALUES ('$name','$photo')";
//    $result = mysqli_query($conn,$insert);
//    if($result){
//        move_uploaded_file(['photo']['tm'])
//    }


?>