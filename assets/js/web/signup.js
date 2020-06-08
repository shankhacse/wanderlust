$(document).ready(function(){

    var basepath = $("#basepath").val();
    var sitebasepath = $("#sitebasepath").val();
	
	
    $(document).on('submit','#signForm',function(e){
		e.preventDefault();
		
		if(validatefrom()){
            var formDataserialize = $("#signForm" ).serialize();
			formDataserialize = decodeURI(formDataserialize);
			//console.log(formDataserialize);
            var formData = {formDatas: formDataserialize};
			var type = "POST"; 
			var urlpath = basepath+'signup/signup_action';
			//$("#savebtn").addClass('nonclick');
			$.ajax({
				type: type,
	            url: urlpath,
	            data: formData,
	            dataType: 'json',
	            contentType: "application/x-www-form-urlencoded; charset=UTF-8", 
				success: function (result) {
				//$("#savebtn").removeClass('nonclick');	
				
				Swal.fire({
					title: '<strong>Account Created Successfully </strong>',
					icon: 'info',
					width: 500,
					padding: '5em',
					html:		 
					  '<a style="color:blue;" href=' + sitebasepath +"login" +'><u>Go For Login</u></a>' 
					 ,
					showCloseButton: false,
					showCancelButton: false,
					
					focusConfirm: false
					
				  }).then((result) => {
					if (result.value) {
						window.location.href=sitebasepath+'home';
					}
				  })

					// window.location.href=sitebasepath+'login';
				    // $(".loginerr").text("sffs");
				
				
				}, 
				error: function (jqXHR, exception) {
					var msg = '';
					}
				}); /*end ajax call*/
	
			}
    });
	$('.numberwithdecimal').bind('keyup paste', function() {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    $('.onlynumber').bind('keyup paste', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
	});
	
	$(document).on("keyup","#mobile_no",function(){

		var mobile_no = $("#mobile_no").val();
		$("#signerr").text("");		
		 if(mobile_no.length == 10){

			var type = "POST"; 
			var urlpath = basepath+'signup/checkmobile';

			$.ajax({
				type: type,
	            url: urlpath,
	            data: {mobile_no:mobile_no},
	            dataType: 'json',
	            contentType: "application/x-www-form-urlencoded; charset=UTF-8", 
				success: function (result) {
				
					if(result.STATUS == 1){
						$("#signerr").text("Mobile no. already register.Please go for login.");
						$("#signupbtn").prop("disabled",true);
					}
				}, 
				error: function (jqXHR, exception) {
					var msg = '';
					}
				}); /*end ajax call*/
			
		 }
	

	})

});

function validatefrom(){
	var fullname = $("#fullname").val();
	var mobile_no = $("#mobile_no").val();
	var email = $("#email").val();
	var password = $("#password").val();
	var confirm_Password = $("#confirm_Password").val();

	regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	$("#signerr").text("");
	if(fullname == ''){
		$("#signerr").text("Enter your name");
		$("#fullname").focus();
		return false;
	}else if(mobile_no == ''){
		$("#signerr").text("Enter your mobile no.");
		$("#mobile_no").focus();
		return false;
	}else if(mobile_no.length < 10){
		$("#signerr").text("Enter 10 digit mobile no.");
		$("#mobile_no").focus();
		return false;
	}else if(email == ''){
		$("#signerr").text("Enter your email address");
		$("#email").focus();
		return false;
	}else if(!regex.test(email)){
		$("#signerr").text("Make sure the email address you entered is correct. ");
		$("#email").focus();
		return false;
	}else if(password == ''){
		$("#signerr").text("Enter your password");
		$("#password").focus();
		return false;
	}else if(password.length < 6){
		$("#signerr").text("Enter minimum 6 digit password");
		$("#password").focus();
		return false;
	}else if(confirm_Password == ''){
		$("#signerr").text("Confirm your password");
		$("#confirm_Password").focus();
		return false;
	}else if(confirm_Password != password){
		$("#signerr").text("The passwords you entered didn't match – try again");
		$("#confirm_Password").focus();
		return false;
	}


	return true;

}