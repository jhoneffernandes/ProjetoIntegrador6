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
            <a class="header_menu_nav_activeLink" href="properties.php">Imóveis</a>
            <a href="contact.html">Mensagens recebidas</a>
        </nav>
    </header>

    <main id="main">
        <a href="http://localhost/Projeto-Integrador-VI/html/dashboard/properties.php" class="backBtn">Voltar</a>

    <?php
        foreach($fetch as $propertie){
        ?>
        <form action="../../php/update.php?propertieId=<?=$propertie->id?>" method="POST">
            <div class="form_inputlabel">
                <input type="text" class="form_inputlabel_input" name="title" placeholder="Título" value="<?=$propertie->title?>" maxlength="255">
            </div>

            <div class="form_inputlabel">
                <input type="number" class="form_inputlabel_input" name="price" placeholder="Preço" value="<?=$propertie->price?>">
            </div>

            <div class="form_inputlabel">
                <input type="text" class="form_inputlabel_input" name="city" placeholder="Cidade" value="<?=$propertie->city?>" maxlength="255">
            </div>

            <div class="form_inputlabel">
                <input type="text" class="form_inputlabel_input" name="address" placeholder="Endereço" value="<?=$propertie->address?>" maxlength="255">
            </div>

            <div class="form_inputlabel">
                <input type="number" class="form_inputlabel_input" name="phone" placeholder="Telefone" value="<?=$propertie->phone?>">
            </div>

            <div class="form_inputlabel">
                <input type="number" class="form_inputlabel_input" name="rooms" placeholder="Quantidade de quartos" value="<?=$propertie->rooms?>">
            </div>

            <div class="form_inputlabel">
                <input type="number" class="form_inputlabel_input" name="bathroom" placeholder="Quantidade de banheiros" value="<?=$propertie->bathroom?>">
            </div>

            <div class="form_inputlabel">
                <select name="typePropertie" class="form_inputlabel_input">
                    <option value=""></option>
                    <option value="Apartamento">Apartamento</option>
                    <option value="Casa">Casa</option>
                </select>
            </div>
            
            <div class="form_inputlabel">
                <input name="description" class="form_inputlabel_input" placeholder="Descrição" rows="10" value="<?=$propertie->description?>"></input>
            </div>
            
            <button class="modalForm_form_addBtn">
                Atualizar
            </button>
        </form>
        <?php
        }
    ?>
    </main>

    <script src="../../js/dashboard/body.js"></script>
    <script src="../../js/dashboard/tableDatas.js"></script>
    <!-- <script src="../../js/dashboard/form.js"></script> -->
    <script>
        function form(){
            let form = document.querySelector("form");

            function validation(){
                let addBtn = document.querySelector(".modalForm_form_addBtn");
       

                addBtn.addEventListener("click", e => {
                    e.preventDefault();
                    checkFields(e.currentTarget);
                })

                function checkFields(e){
                    let inputs = e.closest("form").querySelectorAll(".form_inputlabel_input");
                    
                    inputs.forEach((element, index) => {
                        if(element.name == "title" || element.name == "city" || element.name == "address" || element.name == "description"){
                            if(element.value.length < 5){
                                errorValidation(element, "No mínimo 5 carácteres.")
                            }else{
                                removeError(element)
                            }
                        }
                        else if(element.name == "price" || element.name == "rooms" || element.name == "bathroom" || element.name == "phone"){
                            if(element.value.length == 0){
                                errorValidation(element, "Insira um valor.")
                            }else{
                                removeError(element)
                            }
                        }
                        else if(element.name == "typePropertie"){
                            if(element.value == ""){
                                errorValidation(element, "Selecione um valor.")
                            }else{
                                removeError(element)
                            }
                        }

                        if(index == (inputs.length - 1)){
                            postForm(inputs)
                        }
                    });
                }

                function errorValidation(element, message){
                    if(!element.closest(".form_inputlabel").querySelector(".validationMessage")){
                        element.classList.add("error");
            
                        // Message
                        let p = document.createElement("p");
                        p.classList.add("validationMessage");
                        p.innerText = message;
            
                        element.closest(".form_inputlabel").insertBefore(p, element.nextElementSibling)
                    }
                }

                function removeError(element){
                    if(element.closest(".form_inputlabel").querySelector(".validationMessage")){
                        element.classList.remove("error");
                        element.closest(".form_inputlabel").removeChild(element.closest(".form_inputlabel").querySelector(".validationMessage"));
                    }
                }

                function postForm(array){
                    let result = 0;
                    
                    array.forEach((element, index) => {
                        element.classList.contains("error") ? "" : result++;
                        console.log(result)
                        if(index == (array.length -1) && result == array.length){
                            form.submit()
                        }
                    });
                }
            }
            validation()



            function message(){
                let main = document.getElementById("main");
                
                let url = window.location.search;
                let parameters = new URLSearchParams(url).get("result");
                let parameters_delete = new URLSearchParams(url).get("delete");
                let parameters_update = new URLSearchParams(url).get("update");

                parameters != null ? createMessage(parameters, "Cadastrado com sucesso!", "Erro ao cadastrar!") : "";
                parameters_delete != null ? createMessage(parameters_delete, "Deletado com sucesso", "O dado não foi deletado.") : "";
                parameters_update != null ? createMessage(parameters_update, "Atualizado com sucesso", "O dado não foi atualizado.") : "";

                function createMessage(param, messageSuccess, messageError){
                    let p = document.createElement("p");
                    p.classList.add("registerMesssage")

                    if(param == "success"){
                        p.innerText = messageSuccess;
                        p.classList.add("success")
                    }else if(param == "error"){
                        p.innerText = messageError;
                        p.classList.add("error")
                    }

                    setTimeout(() => {
                        p.style.display = "none";
                    }, 3000);

                    main.appendChild(p);
                }
            }
            message()
        }
        form()
    </script>

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