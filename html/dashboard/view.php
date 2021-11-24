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

        $id = $_GET['propertieId'];

        $sql = "SELECT * FROM properties WHERE id=$id";
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
        <a href="http://localhost/Projeto-Integrador-VI/html/dashboard/properties.php" class="backBtn">Voltar</a>

    <?php
        foreach($fetch as $propertie){
        ?>
        <form action="../../php/update.php?propertieId=<?=$propertie->id?>" method="POST">
            <div class="form_inputlabel">
                <input type="text" class="form_inputlabel_input" name="title" placeholder="Título" value="<?=$propertie->title?>" maxlength="255" disabled>
            </div>

            <div class="form_inputlabel">
                <input type="number" class="form_inputlabel_input" name="price" placeholder="Preço" value="<?=$propertie->price?>" disabled>
            </div>

            <div class="form_inputlabel">
                <input type="text" class="form_inputlabel_input" name="city" placeholder="Cidade" value="<?=$propertie->city?>" maxlength="255" disabled>
            </div>

            <div class="form_inputlabel">
                <input type="text" class="form_inputlabel_input" name="address" placeholder="Endereço" value="<?=$propertie->address?>" maxlength="255" disabled>
            </div>

            <div class="form_inputlabel">
                <input type="number" class="form_inputlabel_input" name="phone" placeholder="Telefone" value="<?=$propertie->phone?>" disabled>
            </div>

            <div class="form_inputlabel">
                <input type="number" class="form_inputlabel_input" name="rooms" placeholder="Quantidade de quartos" value="<?=$propertie->rooms?>" disabled>
            </div>

            <div class="form_inputlabel">
                <input type="number" class="form_inputlabel_input" name="bathroom" placeholder="Quantidade de banheiros" value="<?=$propertie->bathroom?>" disabled>
            </div>

            <div class="form_inputlabel">
                <select name="typePropertie" class="form_inputlabel_input">
                    <option value=""></option>
                    <option value="Apartamento">Apartamento</option>
                    <option value="Casa">Casa</option>
                </select>
            </div>
            
            <div class="form_inputlabel">
                <textarea name="description" class="form_inputlabel_input" placeholder="Descrição" rows="10" value="<?=$propertie->description?>"></textarea>
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
                foreach($fetch as $propertie){
                    ?>
                    options.forEach(element => {
                        if(element.value == "<?=$propertie->type_propertie?>"){
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