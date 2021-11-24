if(window.innerWidth <= 600){
    function properties_scrollTop(){
        let headerMenu = document.getElementById("header_menu")
        let adverts = document.getElementById("adverts");
        let btn = document.getElementById("adverts_srollTopBtn")


        function init(){
            btn.style.display = "none";
        }
        init()


        btn.addEventListener("click", () => {
            scrollTop()
        })


        // Show or hidden button
        window.addEventListener("scroll", () => {
            if(window.scrollY >= (adverts.offsetTop + 300) && btn.style.display != "block"){
                showOrHidden("show")
            }else if(window.scrollY < (adverts.offsetTop + 300) && btn.style.display != "none"){
                showOrHidden("hidden")
            }
        })


        // Show or hidden button
        function showOrHidden(whatRun){
            if(whatRun == "show"){
                btn.style.display = "block";

                setTimeout(() => {
                    btn.style.opacity = 1;
                }, 40);
            }else{
                btn.style.opacity = 0;

                setTimeout(() => {
                    btn.style.display = "none";
                }, 330);
            }
        }

        function scrollTop(){
            let parentTop = adverts.offsetTop - headerMenu.offsetHeight - 30;
            
            scroll({
                top: parentTop,
                behavior: 'smooth',
            })
        } 
    }
    properties_scrollTop()
}