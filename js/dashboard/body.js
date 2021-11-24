function dashboard(){
    function setColumnWidth(){
        let body = document.querySelector("body");
        let header = document.querySelector(".header");

        body.style.setProperty('--headerWidth', header.offsetWidth+"px")
    }
    setColumnWidth()
}
dashboard()