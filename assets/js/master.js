$(document).ready(function(){
    var basepath = $("#basepath").val();
    var rowNoUpload=0;


    $(document).on('click', '.browse', function(){
      var file = $(this).parent().parent().parent().find('.file');
      file.trigger('click');
    });

    $(document).on('change', '.file', function(){
		//$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
		$(this).parent().find('.userfilesname').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });	



   $('.select2').select2();
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

/*
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
				});
	

    });

*/
 $(document).on('submit','#RoomForm',function(event)
    {
        event.preventDefault();
        if(1)
        {   
        
        if(RoomImageValidation())
        {
        
            
          
            var formData = new FormData($(this)[0]);
          //  $("#roombtn").css('display', 'none');
            $("#loaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'masters/room_action',
                dataType: "json",
                processData: false,
                contentType: false, // "application/x-www-form-urlencoded; charset=UTF-8",
                data: formData,
                
                success: function (result) {

                	alert(result.MSG)
				 window.location.href=basepath+'masters/room';
                    
                   
                  
                }, 
                error: function (jqXHR, exception) {
                  var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                   // alert(msg);  
                }
            }); /*end ajax call*/

          }  // end detail validation
        }   // end master validation
        
    });





$(document).on('submit','#RoomRateForm',function(e){
		e.preventDefault();
            
            var formDataserialize = $("#RoomRateForm" ).serialize();
			formDataserialize = decodeURI(formDataserialize);
			console.log(formDataserialize);
            var formData = {formDatas: formDataserialize};
			var type = "POST"; 
			var urlpath = basepath+'masters/roomrate_action';
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
				 window.location.href=basepath+'masters/roomrate';
				
				}, 
				error: function (jqXHR, exception) {
					var msg = '';
					}
				}); /*end ajax call*/
	

    });



 $(document).on('click','.addPackage',function(e){
           e.preventDefault();
          var rowno= $("#rowno").val(); 
          var sel_package_type=$("#sel_package_type").val();
          var package_name = $("#sel_package_type option:selected").text();
          var rate= $("#rate").val();
        

        console.log(basepath);
        if(validateDetailsPacktyprroom()) {

        rowno++;
        $.ajax({
            type: "POST",
            url: basepath+'masters/addRoomPackageDetail',
            dataType: "html",
            data: {
            		rowNo:rowno,
            		sel_package_type:sel_package_type,
            		package_name:package_name,
            		rate:rate,
            
	            },
            success: function (result) {
                $("#rowno").val(rowno);
                $("#detail_itemamt table").show(); 
                $("#detail_itemamt table tbody").append(result);   
               

                $('#amount').val('');
                $('#tran_type').val('').change();
                $('#account_id').val('').change();
           
                resetDrCrAmount();
                resetSerial();
           
         
            }, 
            error: function (jqXHR, exception) {
              var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
               // alert(msg);  
            }
            }); /*end ajax call*/

        }else{
            $("#selmens_medicine").focus();
            $("#selmens_medicineerr").addClass("bordererror");
           
        }
  
    }); // End Visiting Details


  $(document).on('click','.delDetails',function(){
        
        var currRowID = $(this).attr('id');
        var rowDtlNo = currRowID.split('_');
       // console.log(rowDtlNo[1]);
        console.log(currRowID);

        //$("tr#rowDocument_"+rowDtlNo[1]+"_"+rowDtlNo[2]).remove();
        $("tr#rowItemdetails_"+rowDtlNo[1]).remove();
     
       resetSerial();
    });


// Add Room image
    $(document).on('click','.addRoomImage',function(){
        rowNoUpload  = $("#rowNo").val();
        $.ajax({
            type: "POST",
            url: basepath+'masters/addRoomImages',
            dataType: "html",
            data: {rowNo:rowNoUpload},
            success: function (result) {

                $("#detail_Document table").css("display","block"); 
                $("#detail_Document table tbody").append(result);
                $("#rowNo").val(parseInt(rowNoUpload)+1);   

            }, 
            error: function (jqXHR, exception) {
              var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
               // alert(msg);  
            }
            }); /*end ajax call*/
    }); // End Document Detail



var delIds = [];
    $(document).on('click','.delDocType',function(){
        var currRowID = $(this).attr('id');
        var rowDtlNo = currRowID.split('_');
        delIds.push($("#galleryIDs_0_"+rowDtlNo[2]).val());
       $("#gallerydelIDs").val(delIds);       
        $("tr#rowDocument_"+rowDtlNo[1]+"_"+rowDtlNo[2]).remove();
    });
    
    $(document).on('change','.fileName',function(){ 
        var currRowID = $(this).attr('id');
        var rowDtlNo = currRowID.split('_');
        var IDSNo = rowDtlNo[1]+"_"+rowDtlNo[2];
        $("#userFileName_"+IDSNo).val('');
        //var inpID = "#isChangedFile_"+rowDtlNo[1]+"_"+rowDtlNo[2];
        
        var newfileName = $("#fileName_"+IDSNo)[0].files[0].name;
        var prvVal = $("#prvFilename_"+IDSNo).val();
 		$("#userFileName_"+IDSNo).val(newfileName);
        if(newfileName!=prvVal)
        {
            $("#isChangedFile_"+IDSNo).val('Y');
        }

    });

    


}); // end of document ready




function RoomImageValidation()
{
    var isValid = true;
    var cover_photo = $("#cover_photo").val();
    var imagegallryrow = $("#imagegally >tbody >tr").length
    $("#imageerr,#roomimagegal").text("");
  
   if(cover_photo == ''){
       $("#imageerr").text("Error : Select Room Cover Photo").css("color","red");
       isValid = false;
      
   }else if(imagegallryrow < 3){

     $("#roomimagegal").text("Error : Add Minimum 3 Room Gallery Photo").css("color","red");
     isValid = false;
   
   }
   
    $('.userFileName').each(function() 
    {
        var doctype_id = $(this).attr('id');
        var docTypeIDS = doctype_id.split("_");
        var docTypeVal = $(this).val();
      
      
     
        var tdIDS2 = "#userFileName_"+docTypeIDS[1]+"_"+docTypeIDS[2];

        var filename = $(tdIDS2).val();

        if(filename=="")
        {
            $(tdIDS2).attr("title","Select Document");
            $(tdIDS2).css("background","#FFD2D2");

            isValid = false;
        }
    });

    return isValid;
}

function resetSerial(){
    var n=1;

  $(".listamount").each(function(){
      var currRowID = $(this).attr('id');
      var rowDtlNo = currRowID.split('_');
        console.log("-> "+n); 
      $("#serial_"+rowDtlNo[1]).text(n++);
    
   });

}



function validateDetailsPacktyprroom(){

     var sel_package_type=$("#sel_package_type").val();
       var amount= $("#rate").val();
        

   	 $("#sel_package_typeerr,#rate").removeClass("form_error");
	 $('#error_msg').text('');

	 if (sel_package_type=='0') {
	 	 $("#sel_package_typeerr").addClass("form_error");
         $("#sel_package_type").focus();
         return false;
	 }

	 if (amount=='') {
	 	 $("#rate").addClass("form_error");
         $("#rate").focus();
         return false;
	 }



	return true;
}