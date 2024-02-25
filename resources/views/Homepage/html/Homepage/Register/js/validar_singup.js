/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */
with(document.Sing_Up){
    onsubmit=function(e){
        e.preventDefault();
        ok=false;
        if(ok&&prinombreCliente.value==""){
            ok=false;
            alert("Escribe al menos un primer nombre de usuario");
            prinombreCliente.focus();
        }
        if(ok&&priapellidoCliente.value==""){
            ok=false;
            alert("Escribe almenos un apellido");
            priapellidoCliente.focus();
        }
        if(ok&&documentoCliente.value==""){
            ok=false;
            alert("Escribe tu numero de documento");
            documentoCliente.focus();
        }
        if(ok&&edadCliente.value==""){
            ok=false;
            alert("Escribe tu edad");
            edadCliente.focus();
        }
        if(ok&&mailCliente.value==""){
            ok=false;
            alert("Escribe tu correo electronico");
            documentoCliente.focus();
        }if(ok&&passwordCliente.value==""){
            ok=false;
            alert("Escribe una contraseñ");
            documentoCliente.focus();
        }
        if(ok&&passwordClienteii.value!=passwordClienteii){
            ok=false;
            alert("Escribe una contraseñ");
            documentoCliente.focus();
        }
        
        if(ok){submit();}
    }
    
    
}