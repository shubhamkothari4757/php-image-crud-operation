<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>IMAGE CRUD</title>
    <style>
        .form_container {
            width: 500px;
            margin-top: 30px;
            border: 2px solid black;
            border-radius: 10px;
            padding: 40px;
        }

 
    </style>
</head>

<body>
    <div class="container form_container">
        <form action="insert.php" name="myform" method="POST" enctype="multipart/form-data">
            <label for="">Name:</label>
            <input type="text" class="form-control" placeholder="Enter file name" name="name">
            <br>
            <label for="formFile">Images:</label>
            <input class="form-control" type="file" id="image" name="image">
            <br>
            <input type="submit" class="btn btn-primary" id="submit" name="submit">


        </form>
    </div>

    <form>
        <?php include("config.php"); ?>
        <div class="container mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Images</td>
                        <td col-2>Actions</td>

                    </tr>
                </thead>


                <tbody>
                    <?php
                        $sel = "SELECT * FROM info";
                        $res = mysqli_query($conn, $sel); ?>

                    <?php
                        while ($row = mysqli_fetch_array($res)) :  ?>

                    <tr>
                        <td>
                            <?php echo $row['id']; ?>
                        </td>
                        <td>
                            <?php echo $row['Name']; ?>
                        </td>
                        
                        <?php echo " <td>
                             <img src=$row[Image] width='200px' height='100px'> 
                        </td> "; ?>
                          <td>
                            <a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                            <a href="delete.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>

                    <?php endwhile;?>
                </tbody>
            </table>
        </div>
    </form>
</body>

</html>