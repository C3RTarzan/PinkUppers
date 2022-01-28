ipGerency();
options();
closeExceptionVps();
vpsUpdate();
timeVPS()
backOptions()

function ipGerency() {
    const ipTrocarte = document.querySelectorAll(".IP span");
    const ipGerency = document.querySelectorAll(".IP-gerency");
    for (let i = 0; i < ipTrocarte.length; i++) {
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
    const exit = document.querySelector(".bc-options .Sair");
    exit.addEventListener("click", () => {
        window.location.href = "/class/logout.php";
    })
}

function closeExceptionVps(){
    const click = document.querySelectorAll(".exeption .close");
    const affected = document.querySelectorAll(".exeption");

    for(let i = 0; i < click.length; i++){
        if(click[i] != null){
            click[i].addEventListener("click", () =>{
                affected[i].style.display = "none";
            })
        }
    }
}

function vpsUpdate(){
    const click = document.querySelector(".wait-arrow");
    const affected = document.querySelector(".time-vps-wait");

    if(click != null && affected != null){
        let validate = true;
        click.addEventListener("click", () => {
            if(validate){
                affected.style = "width: 250px;";
                click.style = "left: 250px; transform: rotateY(200deg); animation: none";
                validate = false;
            }else{
                affected.style = "width: 0;";
                click.style = "left: 0; transform: rotateY(0deg)";
                validate = true;
            }
        })    
    }
}

function timeVPS(){
    const arrow = document.querySelector(".wait-arrow");
    if(arrow != null){
        window.setInterval(() =>{
            const timeStart = document.querySelectorAll("#value-start");
            const timeEnd = document.querySelectorAll("#value-end");
            for(let i = 0; i < timeStart.length; i++){             
                const dateNow = new Date();
    
                let porc =  parseInt((((timeStart[i].value * 1000) - dateNow.getTime()) / 1000) * 100 / (((timeStart[i].value * 1000) - (timeEnd[i].value * 1000)) / 1000));
                const cont = parseInt(((timeEnd[i].value * 1000) - dateNow.getTime()) / 1000);

                let resultCont;

                const datecont = new Date((timeEnd[i].value * 1000) - dateNow.getTime());
                if(porc >= 100){
                    porc = 100;
                    resultCont = 0;
                }else{
                    if(cont < 60){
        
                        resultCont = datecont.getSeconds();
        
                    }else if(cont < 3600){
        
                        resultCont =  datecont.getMinutes() + ":" + datecont.getSeconds();
        
                    }else{
        
                        resultCont =  datecont.getHours() + ":" + datecont.getMinutes() + ":" + datecont.getSeconds();
        
                    }  
                }
                
                const porcNumber = document.querySelectorAll(".number-percentage span");
                const timeNumber = document.querySelectorAll(".number-time span");
                const barPorc = document.querySelectorAll(".bar-inside");
                const vpsTime = document.querySelectorAll(".unavailable-time");
    
                barPorc[i].style = `width: ${porc}%;`;
                porcNumber[i].innerHTML = `${porc}%`;
                timeNumber[i].innerHTML = resultCont;
                vpsTime[i].innerHTML = resultCont;
            }
        }, 1000);
        
    }   
}

function backOptions(){
    const pencil = document.querySelectorAll(".option-bank .pencil-option");
    const exit = document.querySelectorAll(".option-bank .exit-option");
    const bank = document.querySelectorAll(".info-bank span span");
    const form = document.createElement("form");
    const input1 = document.createElement("input");
    const input2 = document.createElement("input");

    for(let i = 0; i < pencil.length; i++){
        pencil[i].addEventListener("click", () =>{

            const affected = document.querySelector(".warning");
            const msg = document.querySelector(".warning .msg span");
            const ok = document.querySelector(".warning .button span");
            msg.innerHTML = "Você deseja atualizar sua senha de segurança, custará 500$.";
            affected.style.display = "flex";
            ok.addEventListener("click", () =>{          
                form.setAttribute("method", "post");
                form.setAttribute("action", "/class/bank_option.php");

                input1.setAttribute("type", "text");
                input1.setAttribute("name", "bank");
                input1.setAttribute("value", bank[i].innerHTML);
                form.appendChild(input1);

                input2.setAttribute("type", "text");
                input2.setAttribute("name", "choice");
                input2.setAttribute("value", "pencil");
                form.appendChild(input2);

                document.body.appendChild(form);
                form.submit();
            });

        })

        exit[i].addEventListener("click", () =>{

            const affected = document.querySelector(".warning");
            const msg = document.querySelector(".warning .msg span");
            const ok = document.querySelector(".warning .button span");
            msg.innerHTML = "Você tem certeza? Todo o seu saldo sera perdido!!";
            affected.style.display = "flex";
            ok.addEventListener("click", () =>{
                form.setAttribute("method", "post");
                form.setAttribute("action", "/class/bank_option.php");
    
                input1.setAttribute("type", "text");
                input1.setAttribute("name", "bank");
                input1.setAttribute("value", bank[i].innerHTML);
                form.appendChild(input1);
    
                input2.setAttribute("type", "text");
                input2.setAttribute("name", "choice");
                input2.setAttribute("value", "exit")
                form.appendChild(input2);
    
                document.body.appendChild(form);
                form.submit();
            })


        })
        
    }
}


