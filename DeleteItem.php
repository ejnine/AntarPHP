<?php
if ($_POST['DeleteItem']){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_antar";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "DELETE FROM `item` WHERE id=".$_POST['itemId']."";
    if ($conn->query($sql) === TRUE) {
        header('Location: ../admin.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }   
    $conn->close();
}
if ($_POST['UpdateItem']){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_antar";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "DELETE FROM `item` WHERE id=".$_POST['itemId']."";
    $sql = "UPDATE `item` SET
        `description`='".$_POST['desUpdate']."'
        ,`name`='".$_POST['nameUpdate']."'
        ,`price`='".$_POST['priceUpdate']."'
        ,`volume`='".$_POST['priceUpdate']."'
        ,`type`='".$_POST['typeUpdate']."'
        ,`photo`='".$_POST['photoUpdate']."'
        WHERE id='".$_POST['itemId']."'";
    if ($conn->query($sql) === TRUE) {
        header('Location: ../admin.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }   
    $conn->close();
}
?>