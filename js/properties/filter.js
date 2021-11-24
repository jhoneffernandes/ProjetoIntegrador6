// Check to see if it will stay fixed or relative.
if(window.innerWidth > 600){
    function properties_advertsFilter(){
        let headerMenu = document.getElementById("header_menu")
        let adverts = document.getElementById("adverts");
        let filter = document.getElementById("adverts_filter");

            let parentTop = adverts.offsetTop - (headerMenu.offsetHeight+10);
            let parentBt = adverts.offsetHeight + (headerMenu.offsetHeight+40);
        
            window.addEventListener("scroll", () => {
                if(window.scrollY >= parentTop && window.scrollY < parentBt){
                    filter.classList.add("adverts_filter_fixed")
                    filter.style.top = headerMenu.offsetHeight+10+"px";;
                    filter.style.left = window.innerWidth <= 1340 ? "20px" : adverts.offsetLeft+"px";
                    console.log(adverts.offsetLeft)
                }else if(window.scrollY > parentBt){
                    filter.classList.remove("adverts_filter_fixed")
                    filter.style.top = "initial";
                    filter.style.bottom = 0;
                    filter.style.left = window.innerWidth <= 1340 ? "20px" : 0;
                    console.log("oi2")
                }else{
                    filter.classList.remove("adverts_filter_fixed")
                    filter.style.top = 0;
                    filter.style.bottom = "initial";
                    filter.style.left = window.innerWidth <= 1340 ? "20px" : 0;
                    console.log("oi3")
                }
            })
        }
    properties_advertsFilter()
}