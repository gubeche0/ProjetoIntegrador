$(document).ready(function (){
    $("#form").validate({
        errorClass: "is-invalid text-danger",
        validClass: "is-valid",
        label: "h2",
        rules: {
            matricula:{
                required:true
            },
            nome:{
                required: true
                
            },
            email:{
                required: true,
                email: true
            },
        },
    })
});