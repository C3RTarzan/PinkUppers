account();
function account(){
    const register = document.querySelector(".register");
    const login = document.querySelector(".login");
    const buttonDisplay = document.querySelectorAll(".button-display")
    for(let i = 0; i < buttonDisplay.length; i++){
        buttonDisplay[i].addEventListener("click", () =>{
            if(getComputedStyle(login).display == "none"){
                login.style.display = "block";
                register.style.display = "none";
            }else{
                login.style.display = "none";
                register.style.display = "block";  
            }
        })
    }
}
setInterval(function pass(){
    let pass = document.querySelector(".pass");
    let pass2 = document.querySelector(".pass2");
    let button = document.querySelector(".button-register button");

    if(pass.value != "" || pass2.value != ""){
        if(pass.value != pass2.value && pass2.value != ""){
            pass.style = "color: red";
            pass2.style = "color: red";
            
            button.disabled = true;
            button.style = "cursor: default";
        }else{
            pass.style = "color: $white1";
            pass2.style = "color: $white1";
            button.disabled = false;
            button.style = "cursor: pointer";
        }
    }else{
        pass.style = "color: $white1";
        pass2.style = "color: $white1";
        button.disabled = false;
        button.style = "cursor: pointer";
    }
    
    //console.log(pass.value);
}, 1000)