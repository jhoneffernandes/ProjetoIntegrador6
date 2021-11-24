<?php
    // Get url 
    $url = "$_SERVER[HTTP_REFERER]";
    $url = strtok($url, "?");

    // BD
    $connect = new PDO('mysql:host=localhost;dbname=pi6','root','');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(!empty($_POST['email']) && !empty($_POST['message']) && !empty($_POST['name'])){
        // Save
        $sql = $connect->prepare("INSERT INTO contacts (id, email, message, name) VALUES (null, ?, ?, ?)");
        $sql->execute(array($_POST['email'], $_POST['message'], $_POST['name']));

        // Return
        header("Location: $url?contact=success");
    }else{
        // Return
        header("Location: $url?contact=error");
    }
?>