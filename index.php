<?php
require "connect.php";
global $connect;

$sql = "INSERT INTO users (name,email,password,state,school) VALUES(";

if(isset($_POST['submit'])){
    unset($_POST['submit']);
    foreach($_POST as $key=>$value){
//        echo "$key has value $value<br>";
        $sql .= "'$value',";
    }
    $sql = substr_replace($sql,')', strrpos($sql, ','), 1);
    if(mysqli_query($connect,$sql)){
        echo "Inserted Successfully";
    }else{
        echo "Not Inserted";
        echo mysqli_connect_error();
    }
}
//echo "<br>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="POST">
        <div class="container">
            <label for="">Your Full Name</label>
            <input type="text" name="full_name" required>

            <label for="">Your email Address</label>
            <input type="email" name="email" required>

            <label for="">Your Password</label>
            <input type="password" name="password" required>

            <label for="">Which state do you school</label>
            <select name="state" id="" class="states" required>

            </select>
            <label for="">What Institution do you attend</label>
            <select name="school" id="" class="schools" required>

            </select>
            
            <input type="submit" value="Submit Details" name="submit">

        </div>
    </form>
        
    
    <script src="jquery.min.js"></script>
    <script src="main.js"></script>
</body>
</html>
