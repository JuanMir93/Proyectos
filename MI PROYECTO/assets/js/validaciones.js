$(document).ready(() => {
$("#btn_save").click(function(){
    let name = $("#name").val().trim()
            if(name == "" || name.length < 4) {
                alert("Ingrese un nombre de categoría que contenga más de 3 carácteres \n                                             Juan Miranda");
                return false;
            }           

            return true;
    });
});