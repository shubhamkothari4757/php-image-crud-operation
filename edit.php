<?php
include("config.php");

$name = "";
$image = "";

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $selq = "SELECT * FROM info WHERE id='$id'";
    $result = mysqli_query($conn, $selq);

    if (isset($result) == 1) {
        $shu = $result->fetch_array();
        
        $name = $shu['Name'];
        $image = $shu['Image'];
    }
}


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $image = $_FILES['image'];

    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_des = "images/".$img_name;

    move_uploaded_file($img_loc,$img_des);

    $upq = "UPDATE info SET Name='$name', Image='$img_des' WHERE id='$id'";

    mysqli_query($conn, $upq);

    header("location:index.php");
}









?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .form_container {
            width: 500px;
            margin-top: 30px;
            border: 2px solid black;
            border-radius: 10px;
            padding: 40px;
        }
        input{
            margin: 20px;
        }
    </style>
</head>.





































































































































































































































































































<body>
    <center>
    <div class="container form_container">
        <form action="edit.php" name="myform" method="POST" enctype="multipart/form-data">
            <label for="">Name:</label>
            <input type="text" value="<?php echo $shu['Name']; ?>" class="form-control"  name="name">
            <br>
            <label for="formFile">Images:</label>
            <td><input class="form-control" type="file" value="<?php echo $shu['Image']; ?>" name="image"><img src="<?php echo $shu['Image'] ;  ?>" 
             width='200px' height='100px' alt=""></td><br>
            <input type="hidden" name="id" value="<?php echo $shu['id']; ?>">
            <button class="btn btn-info"  name="update">Update</button>
     </center>

        </form>
    </div>
</body>

</html>