$(document).ready(function(){
   
    var basepath = $("#basepath").val();
    var sitebasepath = $("#sitebasepath").val();

    $('.onlynumber').bind('keyup paste', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
   
  
    $(document).on('submit','#bookingConfimdtlForm',function(e){
		e.preventDefault();
		
		if(validatepersonalinfo()){
            var formDataserialize = $("#bookingConfimdtlForm" ).serialize();
			formDataserialize = decodeURI(formDataserialize);
			console.log(formDataserialize);
            var formData = {formDatas: formDataserialize};
			var type = "POST"; 
			var urlpath = sitebasepath+'room/room_booking_action';
			//$("#savebtn").addClass('nonclick');
			$.ajax({
				type: type,
	            url: urlpath,
	            data: formData,
	            dataType: 'json',
	            contentType: "application/x-www-form-urlencoded; charset=UTF-8", 
				success: function (data) {
				//console.log(result);
                
                if(data.STATUS == 1){
                    Swal.fire({
                        title: '<strong>Booking Successfully </strong>',
                        icon: 'info',
                        width: 500,
                        padding: '5em',
                        
                        showCloseButton: false,
                        showCancelButton: false,
                        
                        focusConfirm: false
                        
                      }).then((result) => {
                        if (result.value) {
                            window.location.href=sitebasepath+'room/success/'+data.memberid;
                        }
                      })
	              
                 }
                //else{
                //     window.location.href=sitebasepath+'room/room_booking?checkin_dt='+$.trim($("#checkin_dt").val())+'&checkout_dt='+$.trim($("#checkout_dt").val())+'&room='+$.trim($("#room").val())+'&adults='+$.trim($("#audults_no").val())+'&children='+$.trim($("#children_no").val())+'&id='+$.trim($("#room_id").val());
                // }

				
				
				
				
				}, 
				error: function (jqXHR, exception) {
					var msg = '';
					}
				}); /*end ajax call*/
	
			}
    });

    

})

function validateRoomBooking(){
   
        var checkin_dt = $("#checkin_dt").val();
        var checkout_dt = $("#checkout_dt").val();
        var room = $("#room").val();
        var package = $("#package").val();
        var adults = $("#adults").val();
        var children = $("#children").val();
  
        $("#roombookingerr").text("");
    
        if(checkin_dt == ""){
            $("#roombookingerr").text("Select check in date");
            $("#checkin_dt").focus();
            return false;
        }else  if(checkout_dt == ""){
            $("#roombookingerr").text("Select check out date");
            $("#checkout_dt").focus();
            return false;
        }
        else  if(room == "0"){
            $("#roombookingerr").text("Select room");
            $("#room").focus();
            return false;
        }
        else  if(package == "0"){
            $("#roombookingerr").text("Select package");
            $("#package").focus();
            return false;
        }
        else  if(adults == "0"){
            $("#roombookingerr").text("Select adults");
            $("#adults").focus();
            return false;
        }
        // else  if(children == "0"){
        //     $("#roombookingerr").text("Select children");
        //     $("#children").focus();
        //     return false;
        // }
        return true;
    }

    function validatepersonalinfo(){
               
        var name = $("#name").val();
        var mobile_no = $("#mobile_no").val();
        var address = $("#address").val();
        var city = $("#city").val();
        var zip = $("#zip").val();
        var state = $("#state").val();

        $(".errmsg").css("display","none");

         if(name == ''){
            $(".name").append("<p class='errmsg'>Enter your name</p>");
            $("#name").focus();
            return false;
         }else if(mobile_no == ''){
            $(".mobile_no").append("<p class='errmsg'>Enter your mobile no.</p>");
            $("#mobile_no").focus();
            return false;
         }else if(mobile_no.length < 10){
            $(".mobile_no").append("<p class='errmsg'>Enter 10 digit mobile no.</p>");
            $("#mobile_no").focus();
            return false;
         }else if(address == ''){
            $(".address").append("<p class='errmsg'>Enter your address</p>");
            $("#address").focus();
            return false;
         }else if(city == ''){
            $(".city").append("<p class='errmsg'>Enter your city</p>");
            $("#city").focus();
            return false;
         }else if(zip == ''){
            $(".zip").append("<p class='errmsg'>Enter your pincode</p>");
            $("#zip").focus();
            return false;
         }else if(state == ''){
            $(".state").append("<p class='errmsg'>Enter your state</p>");
            $("#state").focus();
            return false;
         }

        return true;
    }

    function calculate(){

        var total_price = $("#total_price").val();
        //var total = 0;
        var addtotal = 0;
        var lesstotal = 0;
        $(".showprice").each(function(){          
          
            var mattress = $(this).val();
             var row = $.trim($(this).attr('data-no'));           
            var each_mattress_price = $("#each_mattress_price_"+row).val();
                      
          
            if(mattress != '0' && mattress != ''){
               
                 addtotal = addtotal + parseInt(mattress)*parseInt(each_mattress_price);
                
                $(".shwhid"+row).removeClass("displaynone");
                $(".shwhid"+row).addClass("displayblock");
               $("#mattrestext_"+row).text("Mattress Price");
               $("#mattresssmalltext_"+row).text("( " + mattress +" x "+ each_mattress_price +" )");
               $("#mattresprice_"+row).text("INR " + addCommas(mattress*each_mattress_price));
                            
             }
            else if(mattress == '0' && mattress != ''){
                $(".shwhid"+row).removeClass("displaynone");
                $(".shwhid"+row).addClass("displayblock");
               $("#mattrestext_"+row).text("");
               $("#mattresssmalltext_"+row).text("");
               $("#mattresprice_"+row).text("");
                lesstotal = lesstotal + parseInt(mattress)*parseInt(each_mattress_price);
               
            }
          
        });
        
        var total = parseInt(addtotal) + parseInt(lesstotal);
        $("#detpg_combo_price").text("INR "+addCommas(total + parseInt(total_price)));

         
    }

    function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}