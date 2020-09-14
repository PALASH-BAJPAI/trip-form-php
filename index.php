<?php
$insert=false;    //for final printing if inserted succesfully

if(isset($_POST['name']))       //When data inserted in form run this script
{

// Creating variables
$server="localhost";
$username="root";
$password="";

// making connection
$con=mysqli_connect($server,$username,$password);

if(!$con){
    die("connection to this database failed due to ". mysqli_connect_error());
}


//getting post variable
$name=$_POST["name"];
$age=$_POST["age"];
$gender=$_POST["gender"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$other=$_POST["desc"];


//implementing sql query
$sql="INSERT INTO `trip`.`triptable` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`)
VALUES ( '$name', '$age','$gender', '$email', '$phone', '$other', current_timestamp());";

if($con->query($sql)==TRUE){
    // echo "Successfully Inserted";
    $insert=true;
}
else{
    echo "Error: $sql <br> $con->error";
}

//closing connection
$con->close();

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>College Trip</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<img class="bg" src="bg.jpg">
    <div class="container">
    <h1>Welcome To National Institute of Technology, Calicut Trip</h1>
    <p>To be a part of this trip fill this form.</p>
    <?php
    if($insert==true){
    echo "<p class='submitMsg'>Thanks for submitting your form </p>";
    }
    ?>
    <form action="index.php" method="post">
    <input type="text" name="name" id="name" placeholder="Enter your name">
    <input type="int" name="age" id="age" placeholder="Enter your age">
    <input type="text" name="gender" id="gender" placeholder="Enter your gender">
    <input type="email" name="email" id="email" placeholder="Enter your email">
    <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
    <textarea name="desc" id="desc" cols="30" rows="10" placeholder="give your suggestion"></textarea>
    <button class="btn">Submit</button>
    </form>

    </div>
    <script src="index.js"></script>
</body>
</html>