<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/styledash.css">
</head>
<style>
    #main{
        min-height: 100vh;
    }

    form{
        margin-top: 50px;
    }

    form .form_inputlabel{
        margin-bottom: 10px;
    }
    
    form .validationMessage{
        font-size: $font_small;
        color: red;
        margin-top: 3px;
    }
    
    form .form_inputlabel input, 
    form .form_inputlabel textarea, 
    form .form_inputlabel select{
        width: 250px;
        display: block;
        color: #fff;
        border: 2px solid transparent;
        border-radius: 10px;
        background-color: rgba(35, 35, 35);
        box-sizing: border-box;
        padding: 10px 10px;
    }
    form .form_inputlabel input::placeholder, 
    form .form_inputlabel textarea::placeholder, 
    form .form_inputlabel select::placeholder{
        color: #fff;
        font-weight: 600;
    }

    form .form_inputlabel input.erro, 
    form .form_inputlabel textarea.error, 
    form .form_inputlabel select.error{
        border-color: red;
    }

    button{
        display: block;
        color: #fff;
        background-color: #3498db;
        border: 2px solid #3498db;
        padding: 8px 15px;
    }
    form .form_inputlabel button:hover{
        color: #3498db;
        background-color: #fff;
    }


    .backBtn{
        color: #fff;
        background-color: #3498db;
        border-radius: 10px;
        padding: 8px 15px;
        position: absolute;
        left: 5px;
        top: 5px;
    }
}
</style>
<body>

    <?php
        // BD
        $connect = new PDO('mysql:host=localhost;dbname=pi6','root','');
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_GET['contactId'];

        $sql = "SELECT * FROM contacts WHERE id=$id";
        $result = $connect->prepare($sql);
        $result->execute();
        $fetch = $result->fetchAll(PDO::FETCH_OBJ);
    ?>
    
    <header class="header">
        <nav>
            <a href="properties.php">Imóveis</a>
            <a class="header_menu_nav_activeLink" href="contact.html">Mensagens recebidas</a>
        </nav>
    </header>

    <main id="main">
        <a href="http://localhost/Projeto-Integrador-VI/html/dashboard/contacts.php" class="backBtn">Voltar</a>

    <?php
        foreach($fetch as $contact){
        ?>
        <form action="../../php/updatec.php?contactId=<?=$contact->id?>" method="POST">
            <div class="form_inputlabel">
                <label for="">Nome</label>
                <input type="text" class="form_inputlabel_input" name="name" placeholder="Nome" value="<?=$contact->name?>" maxlength="255" disabled>
            </div>
            
            <div class="form_inputlabel">
                <label for="">E-mail</label>
                <input type="email" class="form_inputlabel_input" name="email" placeholder="E-mail" value="<?=$contact->email?>" disabled>
            </div>
            
            <div class="form_inputlabel">
                <label for="">Mensagem</label>
                <input type="text" class="form_inputlabel_input" name="message" placeholder="Mensagem" value="<?=$contact->message?>" maxlength="255" disabled>
            </div>
        </form>
        <?php
        }
    ?>
    </main>

    <script src="../../js/dashboard/body.js"></script>
    <script src="../../js/dashboard/tableDatas.js"></script>
    <!-- <script src="../../js/dashboard/form.js"></script> -->
    
    <script>
        function showValueSelect(){
            let select = document.querySelector("form select");
            let options = document.querySelectorAll("form select option");

            <?php
                foreach($fetch as $contact){
                    ?>
                    options.forEach(element => {
                        if(element.value == "<?=$contact->type_contact?>"){
                            element.setAttribute("selected", "selected");
                        }
                    });
                    <?php
                }
            ?>
        }
        showValueSelect()
    </script>
</body> 
</html>