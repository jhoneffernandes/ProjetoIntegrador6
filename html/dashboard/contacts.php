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
    tr td a{
        color: initial;
    }
</style>
<body>

    <?php
        // BD
        $connect = new PDO('mysql:host=localhost;dbname=pi6','root','');
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM contacts";
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
        <div class="mainTop">
            <h1>
                Contacts
            </h1>
        </div>

        <div class="tableDatas">
            <table>
                <thead>
                    <tr>
                        <th>
                            Nome
                        </th>
                        <th>
                            E-mail
                        </th>
                        <th>
                            Ação
                        </th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        foreach($fetch as $contact){
                        ?>
                        <tr>
                            <td><?=$contact->name?></td>
                            <td><?=$contact->email?></td>

                            <td class="tableDatas_actions">
                                <a href="./viewc.php?contactId=<?=$contact->id?>" class="tableDatas_actions_view">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                </a>
        
                                <a href="../../php/deletec.php?contactId=<?=$contact->id?>" class="tableDatas_actions_delete">
                                    <svg fill="red" xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M112 112l20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 112h352"/><path d="M192 112V72h0a23.93 23.93 0 0124-24h80a23.93 23.93 0 0124 24h0v40M256 176v224M184 176l8 224M328 176l-8 224" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                                </a>
                            </td>
                        </tr>
                        <?php 
                        }
                    ?>
                </tbody>
            </table>
        </div>
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
                        if(element.name == "name" || element.name == "email" || element.name == "message"){
                            if(element.value.length < 5){
                                errorValidation(element, "No mínimo 5 carácteres.")
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
                let parameters_contact = new URLSearchParams(url).get("contact");

                parameters != null ? createMessage(parameters, "Cadastrado com sucesso!", "Erro ao cadastrar!") : "";
                parameters_delete != null ? createMessage(parameters_delete, "Deletado com sucesso", "O dado não foi deletado.") : "";
                parameters_update != null ? createMessage(parameters_delete, "Atualizado com sucesso", "O dado não foi atualizado.") : "";
                parameters_contact != null ? createMessage(parameters_contact, "Formulário enviado com sucesso!", "O formulário não foi enviado!") : "";

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
        function modal(){
            let modal = document.querySelector(".modalForm")

            let modalRegister = document.querySelector(".modalFormRegister")

            let btnOpen = document.querySelector(".btnAddData");
            let btnClose = document.querySelector(".modalForm_closeBtn")

            let btnView = document.querySelector(".tableDatas_actions_view")
            let btnEdit = document.querySelector(".tableDatas_actions_edit")


            // Open
            btnOpen.addEventListener("click", () => {
                modalRegister.style.display = "flex";
            })
            

            // Close
            btnClose.addEventListener("click", () => {
                modal.style.display = "none";
            })  

            modal.addEventListener("click", e => {
                if(e.target.classList.contains("modalForm")){
                    modal.style.display = "none";
                }
            })
        }
        modal()
    </script>
</body> 
</html>