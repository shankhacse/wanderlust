$(document).ready(function(){
   
    var basepath = $("#basepath").val();
    var sitebasepath = $("#sitebasepath").val();
  
    $(document).on('submit','#bookingConfimdtlForm',function(e){
		e.preventDefault();
		
		if(1){
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
				success: function (result) {
				console.log(result);
                
                if(result.STATUS == 1){
	               window.location.href=sitebasepath;
                }else{
                    window.location.href=sitebasepath+'room/room_booking?checkin_dt='+$.trim($("#checkin_dt").val())+'&checkout_dt='+$.trim($("#checkout_dt").val())+'&room='+$.trim($("#room").val())+'&adults='+$.trim($("#audults_no").val())+'&children='+$.trim($("#children_no").val())+'&id='+$.trim($("#room_id").val());
                }

				
				
				
				
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