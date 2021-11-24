<?php
    // Get url 
    $url = "$_SERVER[HTTP_REFERER]";
    $url = strtok($url, "?");

    
    $file_name = $_FILES['imagem']['name'];
    $file_temp = $_FILES['imagem']['tmp_name'];
    $file_size = $_FILES['imagem']['size'];
    $file_type = $_FILES['imagem']['type'];
    $location="../img/properties/".random_int(0, 9999999).$file_name;
    
    // BD
    $connect = new PDO('mysql:host=localhost;dbname=pi6','root','');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($file_size < 5242880){
        if(move_uploaded_file($file_temp, $location)){
            if(!empty($_POST['title']) && !empty($_POST['price']) && !empty($_POST['city']) && !empty($_POST['address']) && !empty($_POST['phone']) && !empty($_POST['rooms']) && !empty($_POST['bathroom']) && !empty($_POST['typePropertie']) && !empty($_POST['description'])){
                // Save
                $sql = $connect->prepare("INSERT INTO properties (id, title, description, price, address, city, rooms, bathroom, type_propertie, phone, srcfile) VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $sql->execute(array($_POST['title'], $_POST['description'], $_POST['price'], $_POST['address'], $_POST['city'], $_POST['rooms'], $_POST['bathroom'], $_POST['typePropertie'], $_POST['phone'], $location));
        
                // Return
                header("Location: $url?result=success");
            }else{
                // Return
                header("Location: $url?result=error");
            }
        }
    }
?>