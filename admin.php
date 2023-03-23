<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANTAR resto & lounge</title>
    <link rel="icon" href="media/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>
    <!--animation loader-->
    <div class="preloader"></div>
    <!--animation loader-->
    <?php
    $conn = mysqli_connect("localhost", "root", "");
        if ($conn === false) {
                die("Ошибка: " . mysqli_connect_error());
            }
        $sqlType = "SELECT * FROM db_antar.type";
        $sqlItemsSort = "SELECT * FROM db_antar.item ORDER BY type";
        $resultType = $conn->query($sqlType);
        $ItemsSort = $conn->query($sqlItemsSort);
    ?>

    <form action="PostValues.php" method="POST">

    <div class="dropdown-menu dropdown-menu-dark d-block position-static border-0 pt-0 mx-0 rounded-3 shadow overflow-hidden w-280px">
    <!-- <form class="p-2 mb-2 bg-dark border-bottom border-dark">
      <input type="search" id="typeInput" class="form-control form-control-dark" autocomplete="false" placeholder="Type to filter...">
    </form> -->
    <!-- <ul class="list-unstyled mb-0">
        <?php
            foreach($resultType as $row){
        // .$row['name'].
            echo '<li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">';
            echo '<span class="d-inline-block bg-success rounded-circle p-1"></span>'.$row['name'].'</a></li>';
            }
        ?>
    </ul> -->
  </div>
    <input type="text" class="form-control" name="nameInput" placeholder="Имя товара">
    <input type="text" class="form-control" name="desInput" placeholder="Описание товара">
    <input type="number" class="form-control" name="volInput" placeholder="Обьем">
    <input type="number" class="form-control" name="priceInput" placeholder="Цена">
    <input type="text" class="form-control" name="photoInput" placeholder="Ссылка на фото">
    
    <input type="submit" name="PostValues" value="ЗАГРУЗИТЬ">
    </form>

    <table class="iksweb">
	<tbody>
    <?php
            foreach($ItemsSort as $item){

                echo '<form  action="DeleteItem.php" method="POST"><tr>';
                echo "<td><input type='text' name='nameUpdate' value=".$item['name']."></td>";
                echo "<td><input type='text' name='desUpdate' value=".$item['description']."></td>";
                echo "<td><input type='text' name='volUpdate' value=".$item['volume']."></td>";
                echo "<td><input type='text' name='priceUpdate' value=".$item['price']."></td>";
                echo "<td><input type='text' name='typeUpdate' value=".$item['type']."></td>";
                echo "<td><input type='text' name='photoUpdate' value=".$item['photo']."></td>";
                echo '<td><input type="hidden" name="itemId" value='.$item["id"].'></td>';
                echo '<td><input type="submit" name="UpdateItem" value="ОБНОВИТЬ"></td>';
                echo '<td><input type="submit" name="DeleteItem" value="УДАЛИТЬ"></td></form>';
                
                //echo '<td><form  action="DeleteItem.php" method="POST"><input type="hidden" name="itemId" value='.$item["id"].'></td>';

                echo "<tr>"; 
            }
        ?>
	</tbody>
</table>

    <!--animation loader Script-->
    <script>
        window.onload = function () {
        document.body.classList.add('loaded_hiding');
        window.setTimeout(function () {
            document.body.classList.add('loaded');
            document.body.classList.remove('loaded_hiding');
        }, 500);
        }
    </script>
        <!--animation loader Script--> 
</body>
</html>