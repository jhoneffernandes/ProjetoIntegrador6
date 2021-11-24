<?php
    $url = "$_SERVER[HTTP_REFERER]";
    $url = strtok($url, "?");

    // BD
    $connect = new PDO('mysql:host=localhost;dbname=pi6','root','');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_GET['propertieId'];

    $sql = "SELECT srcfile FROM properties WHERE id=$id";
    $result1 = $connect->prepare($sql);
    $result1->execute();
    $fetch = $result1->fetchAll(PDO::FETCH_OBJ);
    unlink($fetch[0]->srcfile);
   
    $result = $connect->prepare("DELETE FROM properties WHERE id=$id");
    
    
    if($result->execute()){
        // Return
        header("Location: $url?delete=success");
    }else{
        // Return
        header("Location: $url?delete=error");
    }
?>