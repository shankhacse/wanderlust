$(document).ready(function(){
  var basepath = $("#admbasepath").val();





	$(document).on('submit','#homeTitleForm',function(event)
    {
        event.preventDefault();
        event.stopImmediatePropagation();
        if(validateTitleLogo())
        {   
       
                var formData = new FormData($(this)[0]);
                // formData.append('image',fileString);
                 
                 $("#save_title").css('display', 'none');
                 $("#loaderbtn").css('display', 'block');

                $.ajax({
                    type: "POST",
                    url: basepath+'homepage/save_titlelogo',
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function (result) {
    
                       // console.log(result);
                        
                        if (result.msg_status == 1) {
                                
                            $("#response_msg").text(result.msg_data);
                            $("#islogo").val("N");
                        } 
                        else {
                            $("#response_msg").text(result.msg_data);
                        }
                         
                        $("#save_title").css('display', 'block');
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
            
            
         

        }   // end master validation
 
});

   
 $(document).on('submit','#homeDmInfoForm',function(event)
    {
        event.preventDefault();
        event.stopImmediatePropagation();
        if(validateDmInfo())
        {   
    
            var formData = new FormData($(this)[0]);
            
            $("#save_dmdtl").css('display', 'none');
            //$("#loaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'homepage/save_dmdetails',
                dataType: "json",
                processData: false,
                contentType: false,
                data: formData,
                
                success: function (result) {

                    console.log(result);
                    
                    if (result.msg_status == 1) {
                            
                        $("#response_msg").text(result.msg_data);
                    } 
                    else {
                        $("#response_msg").text(result.msg_data);
                    }

                    $("#save_dmdtl").css('display', 'block');
                     
                  
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

        
            

        }   // end master validation


        
    });



 $(document).on('submit','#homeBannerForm',function(event)
    {
        event.preventDefault();
        event.stopImmediatePropagation();
        if(1)
        {   
    
            var formData = new FormData($(this)[0]);
            
            $("#save_banner").css('display', 'none');
            //$("#loaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'homepage/save_banner',
                dataType: "json",
                processData: false,
                contentType: false,
                data: formData,
                
                success: function (result) {

                    console.log(result);
                    
                    if (result.msg_status == 1) {
                            
                        $("#response_msg").text(result.msg_data);
                    } 
                    else {
                        $("#response_msg").text(result.msg_data);
                    }

                    $("#save_banner").css('display', 'block');
                     
                  
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

        
            

        }   // end master validation


        
    });


     $(document).on('submit','#homeAnnouncementForm',function(e){
        e.preventDefault();
        event.stopImmediatePropagation();

        if(validateAnnouncement())
        {

            var formDataserialize = $("#homeAnnouncementForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            var type = "POST"; //for creating new resource
            var urlpath = basepath+'homepage/announcement_action';
            $("#save_announcement").css('display', 'none');
          

            $.ajax({
                type: type,
                url: urlpath,
                data: formData,
                dataType: 'json',
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                success: function(result) {
                    $("#response_msg").text(result.msg_data);

                    $("#save_announcement").css('display', 'block');
                    window.location.reload();
                  
                },
                error: function(jqXHR, exception) {
                    var msg = '';
                }
            });
            
            
            
            
        }

    });


     $(document).on('submit','#homeEventsForm',function(e){
        e.preventDefault();
        event.stopImmediatePropagation();

        if(validateEvent())
        {

            var formDataserialize = $("#homeEventsForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            var type = "POST"; //for creating new resource
            var urlpath = basepath+'homepage/event_action';
            $("#save_event").css('display', 'none');
          

            $.ajax({
                type: type,
                url: urlpath,
                data: formData,
                dataType: 'json',
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                success: function(result) {
                    $("#response_msg").text(result.msg_data);

                    $("#save_event").css('display', 'block');
                    window.location.reload();
                  
                },
                error: function(jqXHR, exception) {
                    var msg = '';
                }
            });
            
            
            
            
        }

    });

 
$(document).on("click", ".announcementstatus", function() {
        
        var uid = $(this).data("announcementid");
        var status = $(this).data("setstatus");
        var url = basepath + 'homepage/setAnnouncementStatus';
        setActiveStatus(uid, status, url);

 });

$(document).on("click", ".eventstatus", function() {
        
        var uid = $(this).data("eventid");
        var status = $(this).data("setstatus");
        var url = basepath + 'homepage/setEventStatus';
        setActiveStatus(uid, status, url);

 });




$(document).on('click', '.browse', function(){ 
  var file = $(this).parent().parent().parent().find('.file');
  file.trigger('click');
});
$(document).on('change', '.file', function(){
  $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
});  


    $(document).on('submit','#homeAchievmentsStoriesForm',function(event)
    {
        event.preventDefault();
        event.stopImmediatePropagation();
        if(validateAchievmentsStories())
        {   
        
            var formData = new FormData($(this)[0]);
            
            $("#save_title").css('display', 'none');
            $("#loaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'homepage/save_achievments_stories',
                dataType: "json",
                processData: false,
                contentType: false,
                data: formData,
                
                success: function (result) {

                    console.log(result);
                    
                    if (result.msg_status == 1) {
                            
                        $("#response_msg").text(result.msg_data);
                    } 
                    else {
                        $("#response_msg").text(result.msg_data);
                    }
                     
                    $("#save_title").css('display', 'block');
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

        }   // end master validation
 
});



/**
 * Block Home
 */

    $(document).on("change",".homeblockopt",function(e) {
        e.preventDefault();
        event.stopImmediatePropagation();
        block = $(this).val();
        var path = basepath+"homepage/getblockhomedetail";
        $("#blockhomepartial_view").html("<div class='loader'></div>")
        $.ajax({
            type: "GET",
            url:  path,
            data: {block:block},
            dataType: 'html',
           
            success: function (result) {
                $("#blockhomepartial_view").html(result);
              //alert(result);
            }, 
            error: function (jqXHR, exception) {
                var err = ajaxErrorMessage(jqXHR,exception);
                console.log(err);
            }
        }); /*end ajax call*/
    });





    $(document).on('submit','#blockhomeBannerForm',function(event){
            event.preventDefault();
            event.stopImmediatePropagation();
            var formData = new FormData($(this)[0]);
            $(".loader").css('display', 'block');
            $("#save_banner").css('display', 'none');
            
            $.ajax({
                type: "POST",
                url: basepath+'homepage/save_block_banner',
                dataType: "json",
                processData: false,
                contentType: false,
                data: formData,
                
                success: function (result) {

                    console.log(result);
                    
                    if (result.msg_status == 1) {
                            
                        $("#response_msg").text(result.msg_data);
                    } 
                    else {
                        $("#response_msg").text(result.msg_data);
                    }

                    $("#save_banner").css('display', 'block');
                    $(".loader").css('display', 'none');
                     
                  
                }, 
                error: function (jqXHR, exception) {
                    var err = ajaxErrorMessage(jqXHR,exception);
                    console.log(err);
                }
            }); /*end ajax call*/

        
            

      


        
    });





}); // end of document ready


function validateTitleLogo()
{
    var home_title = $("#home_title").val();
    // var home_logo = $("#home_logo").val();
    // var islogo = $("#islogo").val();


    $("#error_msg,#response_msg").text("").css("dispaly", "none").removeClass("form_error");

    if(home_title=="")
    {
        $("#home_title").focus();
        $("#error_msg")
        .text("Error : Enter title .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }
    /*
    if (islogo=='Y') {

    if(home_logo.length=='0')
    {
        $("#home_title").focus();
        $("#error_msg")
        .text("Error : Select Logo.")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }


    }
*/
    return true;
}

function validateDmInfo()
{
    var dm_desk_info = $("#dm_desk_info").val().trim();
    var dm_image = $("#dm_image").val();
    var isDmImage = $("#isDmImage").val();


    $("#error_msg,#response_msg").text("").css("dispaly", "none").removeClass("form_error");

    if(dm_desk_info=="")
    {
        $("#dm_desk_info").focus();
        $("#error_msg")
        .text("Error : Enter about DM .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }

    if (isDmImage=='Y') {

    if(dm_image.length=='0')
    {
        $("#dm_image").focus();
        $("#error_msg")
        .text("Error : Select DM Picture")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }


    }

    return true;
}





function readURLLogo(input){

  $("#islogo").val('Y');
 

   if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showimage')
                    .attr('src', e.target.result)
                    .width(126)
                    .height(165);
            };

            reader.readAsDataURL(input.files[0]);
        }
 
  
}

function readURLDmImage(input){

  $("#isDmImage").val('Y');
 

   if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showimage')
                    .attr('src', e.target.result)
                    .width(282)
                    .height(282);
            };

            reader.readAsDataURL(input.files[0]);
        }
 
  
}

function readURLBanner(input,idVal){

  $("#isBanner_"+idVal).val('Y');
 

   if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showimage_'+idVal)
                    .attr('src', e.target.result)
                    .width(566)
                    .height(175);
            };

            reader.readAsDataURL(input.files[0]);
        }
 
  
}

function validateAnnouncement()
{
    
    var announcement = $("#announcement").val().trim();
   

  $("#error_msg,#response_msg").text("").css("dispaly", "none").removeClass("form_error");

    if(announcement=="")
    {
        $("#announcement").focus();
        $("#error_msg")
        .text("Error : Enter announcement.")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }



    return true;
}


function validateEvent()
{
    
    var event_title = $("#event_title").val().trim();
    var description = $("#description").val().trim();
   

  $("#error_msg,#response_msg").text("").css("dispaly", "none").removeClass("form_error");

    if(event_title=="")
    {
        $("#event_title").focus();
        $("#error_msg")
        .text("Error : Enter event title.")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }

    if(description=="")
    {
        $("#description").focus();
        $("#error_msg")
        .text("Error : Enter description.")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }



    return true;
}

function validateAchievmentsStories()
{
    
    var notable_achievments = $("#notable_achievments").val().trim();
    var succes_stories = $("#succes_stories").val().trim();
   

  $("#error_msg,#response_msg").text("").css("dispaly", "none").removeClass("form_error");

    if(notable_achievments=="")
    {
        $("#notable_achievments").focus();
        $("#error_msg")
        .text("Error : Enter notable achievments.")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }

    if(succes_stories=="")
    {
        $("#succes_stories").focus();
        $("#error_msg")
        .text("Error : Enter succes stories.")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }



    return true;
}



function setActiveStatus(uid,status,path)
{
    
    $.ajax({
            type: "POST",
            url:  path,
            data: {uid:uid,setstatus:status},
            dataType: 'json',
            contentType: "application/x-www-form-urlencoded; charset=UTF-8", 
            success: function (result) {
                if(result.msg_status=1)
                {
                    location.reload();
                }
                
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
                alert(msg);  
                }
        }); /*end ajax call*/
}


