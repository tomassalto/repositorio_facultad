const formulario = document.getElementById("form1"),
usuario = document.getElementById("usuario"),
constraseña = document.getElementById("contrasenia"),
btnSubmit = document.getElementById("btn-sub")

formulario.addEventListener('change', (e) =>{
    if(constraseña.value.length < 7){
        constraseña.style.border = "5px red solid"
        btnSubmit.setAttribute('disabled', true)
    }else{
        constraseña.style.border = "5px green solid"
        btnSubmit.removeAttribute('disabled')
    }
})
  

