ipGerency();
options();
function ipGerency() {
    const ipTrocarte = document.querySelectorAll(".IP.Online-ip span");
    const ipGerency = document.querySelectorAll(".IP-gerency");
    for (let i = 0; i < ipTrocarte.length; i++) {
        console.log(ipGerency[i]);
        let count = 0;
        ipTrocarte[i].addEventListener("click", () => {
            if (count == 1) {
                ipGerency[i].style.height = "0";
                count = 0;
            } else {
                ipGerency[i].style.height = "60px";
                count = 1;
            }
        })
    }
}
function options() {
    let exit = document.querySelector(".bc-options .Sair");
    exit.addEventListener("click", () => {
        window.location.href = "/class/logout.php";
    })
}