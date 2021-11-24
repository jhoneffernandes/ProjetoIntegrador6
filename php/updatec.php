<?php
    // Get url 
    $url = "$_SERVER[HTTP_REFERER]";
    $url = strtok($url, "?");

    // BD
    $connect = new PDO('mysql:host=localhost;dbname=pi6','root','');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_GET['contactId'];

    $sql = $connect->prepare("update contacts set email = :email, name = :name, message = :message where id = ".$id);
    $sql->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $sql->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
    $sql->bindParam(':message', $_POST['message'], PDO::PARAM_STR);
      
    if($sql->execute()){
        // Return
        header("Location: $url?update=success");
    }else{
        // Return
        header("Location: $url?update=error");
    }
?>