function header(){
    let header = document.getElementById("header")
    let menu = document.getElementById("header_menu")
    let introduction = document.getElementById("header_introduction")

    
    
    function headerHeight(){
        if(introduction){
            introduction.style.marginTop = menu.offsetHeight+"px";
        }else{
            header.style.height = menu.offsetHeight+"px";
        }
    }
    headerHeight()



    // Resposnive menu
    function responsiveMenu(){
        let nav = document.getElementById("header_menu_nav")
        let openBtn = document.getElementById("header_menu_openBtn")
        let closeBtn = document.getElementById("header_menu_nav_closeBtn")

        openBtn.addEventListener("click", () => {
            nav.style.display = "block";
            setTimeout(() => {
                nav.style.right = 0;
            }, 50);
        })

        closeBtn.addEventListener("click", () => {
            nav.style.right = "-"+(nav.offsetWidth+100)+"px";

            setTimeout(() => {
                nav.style.display = "none";
            }, 320);
        })
    }
    responsiveMenu()
}
header()