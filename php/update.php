<?php
    // Get url 
    $url = "$_SERVER[HTTP_REFERER]";
    $url = strtok($url, "?");

    // BD
    $connect = new PDO('mysql:host=localhost;dbname=pi6','root','');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_GET['propertieId'];

    $sql = $connect->prepare("update properties set title = :title, description = :description, price = :price, address = :address, city = :city, rooms = :rooms, bathroom = :bathroom, type_propertie = :typePropertie, phone = :phone where id = ".$id);
    $sql->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $sql->bindParam(':description', $_POST['description'], PDO::PARAM_STR);
    $sql->bindParam(':price', $_POST['price'], PDO::PARAM_STR);
    $sql->bindParam(':address', $_POST['address'], PDO::PARAM_STR);
    $sql->bindParam(':city', $_POST['city'], PDO::PARAM_STR);
    $sql->bindParam(':rooms', $_POST['rooms'], PDO::PARAM_STR);
    $sql->bindParam(':bathroom', $_POST['bathroom'], PDO::PARAM_STR);
    $sql->bindParam(':typePropertie', $_POST['typePropertie'], PDO::PARAM_STR);
    $sql->bindParam(':phone', $_POST['phone'], PDO::PARAM_STR);
    
    if($sql->execute()){
        // Return
        header("Location: $url?update=success&propertieId=".$id);
    }else{
        // Return
        header("Location: $url?update=error&propertieId=".$id);
    }
?>