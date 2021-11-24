function form(){
    function validation(){
        let addBtn = document.querySelector(".modalForm_form_addBtn");
        let editBtn = document.querySelector(".modalForm_form_editBtn");


        addBtn.addEventListener("click", e => {
            e.preventDefault();
            checkFields(e.currentTarget);
        })

        editBtn.addEventListener("click", e => {
            e.preventDefault();
            checkFields(e.currentTarget);
        })

        function checkFields(e){
            let inputs = e.closest("form").querySelectorAll(".form_inputlabel_input");
            
            inputs.forEach(element => {
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
    }
    validation()



    function message(){
        let main = document.getElementById("main");
        
        let url = window.location.search;
        let parameters = new URLSearchParams(url).get("result")


        function createMessage(){
            let p = document.createElement("p");
            p.classList.add("registerMesssage")

            if(parameters == "success"){
                p.innerText = "Propriedade cadastrada com sucesso!";
                p.classList.add("success")
            }else if(parameters == "error"){
                p.innerText = "Erro ao cadastrar a propriedade!";
                p.classList.add("error")
            }

            main.appendChild(p);
        }
        createMessage()
    }
    message()
}
form()