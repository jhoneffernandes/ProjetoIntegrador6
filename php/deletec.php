<?php
    $url = "$_SERVER[HTTP_REFERER]";
    $url = strtok($url, "?");

    // BD
    $connect = new PDO('mysql:host=localhost;dbname=pi6','root','');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_GET['contactId'];
    
    $result = $connect->prepare("DELETE FROM contacts WHERE id=$id");
    
    if($result->execute()){
        // Return
        header("Location: $url?delete=success");
    }else{
        // Return
        header("Location: $url?delete=error");
    }
?>