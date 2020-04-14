$(document).ready(function(){
    var basepath = $("#basepath").val();
   
    $(document).on('submit','#hotelForm',function(e){
		e.preventDefault();
            
            var formDataserialize = $("#hotelForm" ).serialize();
			formDataserialize = decodeURI(formDataserialize);
			console.log(formDataserialize);
            var formData = {formDatas: formDataserialize};
			var type = "POST"; 
			var urlpath = basepath+'masters/update_hotels';
			//$("#savebtn").addClass('nonclick');
			$.ajax({
				type: type,
	            url: urlpath,
	            data: formData,
	            dataType: 'json',
	            contentType: "application/x-www-form-urlencoded; charset=UTF-8", 
				success: function (result) {
				//$("#savebtn").removeClass('nonclick');	
				alert(result.MSG)
				
				
				}, 
				error: function (jqXHR, exception) {
					var msg = '';
					}
				}); /*end ajax call*/
	

    });




    /* add update room type */


        $(document).on('submit','#RoomTypeForm',function(e){
		e.preventDefault();
            
            var formDataserialize = $("#RoomTypeForm" ).serialize();
			formDataserialize = decodeURI(formDataserialize);
			console.log(formDataserialize);
            var formData = {formDatas: formDataserialize};
			var type = "POST"; 
			var urlpath = basepath+'masters/roomtype_action';
			//$("#savebtn").addClass('nonclick');
			$.ajax({
				type: type,
	            url: urlpath,
	            data: formData,
	            dataType: 'json',
	            contentType: "application/x-www-form-urlencoded; charset=UTF-8", 
				success: function (result) {
				//$("#savebtn").removeClass('nonclick');	
				alert(result.MSG)
				 window.location.href=basepath+'masters/roomtype';
				
				}, 
				error: function (jqXHR, exception) {
					var msg = '';
					}
				}); /*end ajax call*/
	

    });



     /* add update room type */


        $(document).on('submit','#RoomForm',function(e){
		e.preventDefault();
            
            var formDataserialize = $("#RoomForm" ).serialize();
			formDataserialize = decodeURI(formDataserialize);
			console.log(formDataserialize);
            var formData = {formDatas: formDataserialize};
			var type = "POST"; 
			var urlpath = basepath+'masters/room_action';
			//$("#savebtn").addClass('nonclick');
			$.ajax({
				type: type,
	            url: urlpath,
	            data: formData,
	            dataType: 'json',
	            contentType: "application/x-www-form-urlencoded; charset=UTF-8", 
				success: function (result) {
				//$("#savebtn").removeClass('nonclick');	
				alert(result.MSG)
				 window.location.href=basepath+'masters/room';
				
				}, 
				error: function (jqXHR, exception) {
					var msg = '';
					}
				}); /*end ajax call*/
	

    });



    


}); // end of document ready