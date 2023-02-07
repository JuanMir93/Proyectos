$(document).ready(() => {
    $("#btn_save").click(function(){
        let name = $("#product").val().trim()
        let name_product = $("#name_product").val()
        let id_product = $("#id_product").val()
        let p_product = $("#p_product").val()
        let description = $("#description").val()

                if(name == "" || name.length < 4) {
                    alert("Ingrese un nombre de categoría que contenga más de 3 carácteres \n                                             Juan Miranda");
                    return false;
                }     
                
                if(name_product == "" || name.length < 4) {
                    alert("Ingrese un nombre de producto que contenga más de 3 carácteres \n                                             Juan Miranda");
                    return false;
                }  

                if(id_product == "") {
                    alert("Ingrese un ID de producto válido \n                                             Juan Miranda");
                    return false;
                }

                if(p_product == "") {
                    alert("Ingrese un precio de producto válido \n                                             Juan Miranda");
                    return false;
                }
                
                if(description == "" || description.length < 20) {
                    alert("Ingrese una descripcion con un mínimo de 20 carácteres \n                                             Juan Miranda");
                    return false;
                } 
                
                return true;
        });
    });