indexLocation()
AccountLocation();

function indexLocation(){
    const pkClick = document.querySelector("header .img")
    pkClick.addEventListener("click", () => {
        window.location.href = "/"
    })
}
function AccountLocation() {
    const AccClick = document.querySelector("header .options")
    AccClick.addEventListener("click", () => {
        window.location.href = "/Logate"
    }) 
}