$(function() {
    var distwebmenuObject = {};
    var blockwebmenuObject = {};
    

     var updateOutput = function(e,o)
     {
        var list   = e.length ? e : $(e.target),
             output = list.data('output');
         
         if (window.JSON) {
             if(o=="D"){
                output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                distwebmenuObject = window.JSON.stringify(list.nestable('serialize'));
                console.log(o);
             }
             else{
                output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                blockwebmenuObject = window.JSON.stringify(list.nestable('serialize'));
             }
            
            // output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
         } else {
             output.val('JSON browser support required for this demo.');
         }
     };
     // activate Nestable for list 1
     $('#districtmenu').nestable({
         group: 1,
         maxDepth:2
     })
     .on('change', updateOutput);
     // activate Nestable for list 2

     $('#blockmenu').nestable({
        group: 1,
        maxDepth:2
    })
    .on('change', updateOutput);
    
     // output initial serialised data
    updateOutput($('#districtmenu').data('output', $('#districtmenu-output')),'D');
    updateOutput($('#blockmenu').data('output', $('#blockmenu-output')),'B');


    $(document).on('submit','#arrangeWebDistrictMenuForm',function(event)
    {
        event.preventDefault();

        var formData =$(this).serializeArray();
        var menus = $('#districtmenu-output').val();
        formData.push({name: 'webmenuobj', value: menus});

        console.log(formData);

        $.ajax({
            type: "POST",
            url: getBasePath()+'menu/update_webmenu',
            dataType: "json",
            data: formData,
            success: function (result) {
                
                $(".status-msg").text(result.msg_data);
                $(".alert").addClass(result.msg_class).addClass('show').css("display","block");
            }, 
            error: function (jqXHR, exception) {
               var err = ajaxErrorMessage(jqXHR,exception);
               console.log(err);
            }
        });
       
       //alert("Hello");
    



     });


     $(document).on('submit','#arrangeWebBlockMenuForm',function(event)
     {
         event.preventDefault();
 
         var formData =$(this).serializeArray();
         var menus = $('#blockmenu-output').val();
         formData.push({name: 'webmenuobj', value: menus});
 
         console.log(formData);
 
         $.ajax({
             type: "POST",
             url: getBasePath()+'menu/update_webmenu',
             dataType: "json",
             data: formData,
             success: function (result) {
                 $(".status-msg").text(result.msg_data);
                 $(".alert").addClass(result.msg_class).addClass('show').css("display","block");
             }, 
             error: function (jqXHR, exception) {
                var err = ajaxErrorMessage(jqXHR,exception);
                console.log(err);
             }
         });
        
        //alert("Hello");
     
 
 
 
      });


     $('.alert .close').click(function(){
        $(this).parent().hide();
     });


  });
