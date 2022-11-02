addEventListener("DOMContentLoaded",(e)=>{
    let myform=document.querySelector("#form");
    myform.addEventListener("submit",async(e)=>{
        e.preventDefault();
        let form = e.target;
        let data = Object.fromEntries(new FormData(form));
        document.querySelector("#res").innerHTML = "";

        let config = {
            method: form.method,
            body: JSON.stringify(data)
        };

        let peticion = await fetch(form.action,config);
        let respuesta = await peticion.text();

        document.querySelector("#res").insertAdjacentHTML("beforeend",respuesta);
    })

})