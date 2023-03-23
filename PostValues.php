<?php
if ($_POST['PostValues']){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_antar";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $nameAdd = $_POST['nameInput'];
    $desAdd = $_POST['desInput'];
    $volAdd = $_POST['volInput'];
    $priceAdd = $_POST['priceInput'];
    $photoAdd = $_POST['photoInput'];

    $sqlID = "SELECT * FROM db_antar.item";
    $resultType = $conn->query($sqlID);

    $maxID = -1;
    foreach($resultType as $res){
        if ($maxID < $res["id"]){
            $maxID = $res["id"];
        }
    }
    $maxID++;
    
    $sql = "INSERT INTO db_antar.item (`id`,`description`, `name`, `price`, `volume`, `type`, `photo`) 
    VALUES ('$maxID', '$desAdd','$nameAdd','$priceAdd','$volAdd','0','$photoAdd')";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../admin.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }   
    $conn->close();
}
?>