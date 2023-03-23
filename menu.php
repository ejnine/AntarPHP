<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANTAR resto & lounge</title>
    <link rel="icon" href="media/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/menu.css">
    <script src="js/yandexmap.js"></script>
    <script src="js/menu.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<?php
    $conn = mysqli_connect("localhost", "root", "");
    if ($conn === false) {
            die("Ошибка: " . mysqli_connect_error());
        }
    $sqlType = "SELECT * FROM db_antar.type";
    $resultType = $conn->query($sqlType);
?>
<body>
<!--animation loader-->
    <div class="preloader"></div>
<!--animation loader-->
    <!-- <div class="Baya"> -->
            <div class="fixed">
                <a href="index.html" id="homeLink">
                    <img src="media/menu_logo.png" alt="logo" class="homeLink">
                    <img src="media/mobileIcon.png" alt="logo" class="homeLinkIcon">
                </a>
                <button href="#portfolio" class="headerlink bron">забронировать</button>
                <div class="navBlock">
                    <div class="navigationbar first">
                        <a href="#" class="bruh">Блюда</a>
                        <a href="#" class="bruh">Напитки</a>
                        <a href="#" class="bruh">Кальяны</a>
                    </div>
                    <div class="navigationbar second">
                        <?php
                            foreach($resultType as $row){
                                echo '<a href="#'. $row["id"] .'" class="bruh moment">'.$row['name'].'</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            
        <div class="menucontainer">
            <table>
                <tbody>
                    <?php
                        $mobileWight = 950;
                        foreach($resultType as $rowType){
                            //anchor
                                $sqlItemS = "SELECT * FROM db_antar.item WHERE `type` = " . $rowType["id"] . ";";
                                $resultItem = $conn->query($sqlItemS);
                                $itemName = [];
                                $itemDes = [];
                                $itemPhoto = [];
                                $itemVol = [];
                                $itemPrice = [];
                                $countItem = 0;
                                foreach ($resultItem as $item){
                                    $itemName[$countItem] = $item["name"];
                                    $itemDes[$countItem] = $item["description"];
                                    $itemPhoto[$countItem] = $item["photo"];
                                    $itemVol[$countItem] = $item["volume"];
                                    $itemPrice[$countItem] = $item["price"];
                                    $countItem++;
                                }
                                
                                    for ($i = 0; $i < $countItem; $i = $i + 2){
                                    echo"<td id=\"".$rowType['id']."\">";
                                    echo    '<div class="item" tabindex="1">';
                                    echo        '<img src="'.$itemPhoto[$i].'" alt="not_found" class="itemphoto" tabindex="1">';
                                    echo        '<div class="itemtext">';
                                    echo            '<div class="itemtext sub">';
                                    echo                    '<p class="manedescript">'. $itemName[$i] .'</p>';
                                    echo                    '<p class="descript">'. $itemDes[$i] .'</p>';
                                    echo                    '<p class="descript volume">'. $itemVol[$i] .'мл.</p>';
                                    echo                    '<p class="manedescript">'. $itemPrice[$i] .'.-</p>';            
                                    echo            "</div>";
                                    echo        "</div>";
                                    echo    "</div>";
                                    echo"</td>";
    
                                    if ($i + 1 < $countItem) {
                                        echo"<td>";
                                        echo    '<div class="item" tabindex="1">';
                                        echo        '<img src="'.$itemPhoto[$i+1].'" alt="not_found" class="itemphoto" tabindex="1">';
                                        echo        '<div class="itemtext">';
                                        echo            '<div class="itemtext sub">';
                                        echo                    '<p class="manedescript">'. $itemName[$i+1] .'</p>';
                                        echo                    '<p class="descript">'. $itemDes[$i+1] .'</p>';
                                        echo                    '<p class="descript volume">'. $itemVol[$i+1] .'мл.</p>';
                                        echo                    '<p class="manedescript">'. $itemPrice[$i+1] .'.-</p>';            
                                        echo            "</div>";
                                        echo        "</div>";
                                        echo    "</div>";
                                        echo"</td>";
        
                                }
                                echo"</tr>";
                            }
                            }
                    ?>
                </tbody>
                </tbody>
            </table>
        </div>
    <!-- </div> -->
    <div class="infoContact">
        <div class="rightInfo">
            <div class="contacts">
                <div class="info">КОНТАКТЫ</div>
                <div class="mailPhone">
                    <p class="mailPhone">Тел.: 77-44-66</p>
                    <p class="mailPhone">E-mail: antar@yandex.ru</p>
                    <p class="mailPhone">Адрес: Саратов, ул. Новоузенская, 89к1</p>
                </div>
                <div id="maildop">
                    <p class="mailPhone date word">Режим работы:</p>
                    <p>&nbsp&nbsp</p>
                    <div id="mailtime">
                        <p class="mailPhone date time">Вс-Чт: 14:00 - 01:00</p>
                        <p class="mailPhone date time">Пт-Сб: 14:00 - 03:00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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