$(document).ready(function(){

    $('.onlynumber').bind('keyup paste', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
})

function validateform(){
    var mobile = $("#mobile_no").val();
    var password = $("#password").val();

    $("#mobilerr,#passworderr").text("");

    if(mobile == ""){
        $("#mobilerr").text("Enter your mobile no.");
        $("#mobile_no").focus();
        return false;
    }else if(password == ""){
        $("#passworderr").text("Enter your password");
        $("#password").focus();
        return false;
    }
   return true;
}