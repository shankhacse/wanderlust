$(document).ready(function(){
   
   
    $('#bookingdtl').DataTable( {
        "scrollX": true
    });
    
})




function openRoomsDetailModal(id) {
    // alert(userid);
    var basepath = $("#basepath").val();
    $('#ModalBody').html('');   
    

    $.ajax({
        type: "POST",
        url:basepath+'bookingdetails/getroomdetailsDetail',
        data:{
            id:id
        },
        success: function(result) {
            $('#ModalBody').html(result);  
            datatables();
            $('#roomdtlModel').modal('show');      
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

function datatables(){
   
    $('#roomDetailsTable').DataTable( {        
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
           
           
        total = api
        .column( 3 )
        .data()
        .reduce( function (a, b) {
            return intVal(a) + intVal(b);
        }, 0 );

    // Total over this page
    pageTotal = api
        .column( 3, { page: 'current'} )
        .data()
        .reduce( function (a, b) {
            return intVal(a) + intVal(b);
        }, 0 );
    
    // Update footer
    $( api.column( 3 ).footer() ).html(
        '<i class="fas fa-rupee-sign fontsize13"></i> <span class="fontsize18">'+addCommas(pageTotal)+'</span>' 
    );
    total = api
    .column( 4 )
    .data()
    .reduce( function (a, b) {
        return intVal(a) + intVal(b);
    }, 0 );

        // Total over this page
        pageTotal = api
            .column( 4, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 4 ).footer() ).html(
            '<i class="fas fa-rupee-sign fontsize13"></i> <span class="fontsize18">'+addCommas(pageTotal)+'</span>' 
        );
        total = api
        .column( 5 )
        .data()
        .reduce( function (a, b) {
            return intVal(a) + intVal(b);
        }, 0 );

        // Total over this page
        pageTotal = api
        .column( 5, { page: 'current'} )
        .data()
        .reduce( function (a, b) {
            return intVal(a) + intVal(b);
        }, 0 );

        // Update footer
        $( api.column( 5 ).footer() ).html(
        '<i class="fas fa-rupee-sign fontsize13"></i> <span class="fontsize18">'+addCommas(pageTotal)+'</span>' 
        );
        
         
        }
    
       
    });
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