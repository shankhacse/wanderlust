$(document).ready(function(){

    var basepath = $("#basepath").val();
   
    
})


function openUserloginLogoutDetailModal(userid) {
    // alert(userid);
    var basepath = $("#basepath").val();
    $('#ModalBody').html('');   
    

    $.ajax({
        type: "POST",
        url:basepath+'user/getloginLogoutDetailByUserId',
        data:{
            userid:userid
        },
        success: function(result) {
            $('#ModalBody').html(result);  
            // $('#loginLogoutTable').DataTable({
            //     "order": [[ 0, "desc" ]]
            // } );
            $('#myModal').modal('show');      
        },
        error: function(jqXHR, exception) {
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

}