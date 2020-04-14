$(window).on('load',function(){
  $('#uploadeditmodal').modal('show');
});
$(function() {
    $('.dataTable').DataTable({
      responsive: true
    });
    $('.selectpicker').selectpicker();

    $("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
      event.preventDefault();
      event.stopPropagation();
  
      $(this).siblings().toggleClass("show");
  
  
      if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
      }
      $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
        $('.dropdown-submenu .show').removeClass("show");
      });
     });

     $("#menu_name").keyup(function(){
       $("#menu_slug_url").val($(this).val().replace(/\s+/g, '_').toLowerCase());
     });

     $(".updateslug").keyup(function(){
      var targetid = $(this).data("slugurltarget");
      $("#"+targetid).val($(this).val().trim().replace(/\s+/g, '_').toLowerCase());
    });


    $('#category_headers_title').on('change', function(e){
              var tableOutput = "";
                var tbl = getTablePreviewForHeaderTitle(e);
          
                if($("#category_headers_title option:selected").text().trim() != null || $("#category_headers_title option:selected").text().trim() !="") {
                  tableOutput+="<h5>Table heading title will look like below table</h5>";
                  tableOutput+=tbl;
                  $("#table_heading_preview").html(tableOutput);
                }
                
              
                
    });








$(".fileupload").change(function() {
  $(".pdf-previewblock,.image-preview-block,.previewtext").css({"display":"none"});
  var extension = $(this).val().split('.').pop().toLowerCase();
  if(extension=="png" || extension== "jpg" ||extension == "jpeg") {
    $(".image-preview-block").css({"display":"table-cell"});
    readURL(this);
    
  }
  else if(extension=="pdf"){
    $(".pdf-previewblock").css({"display":"block"});
  }
  else{
    alert("File format not supported for upload");
  }
  
});
  



  $('.js-tooltip').tooltip();

  // Copy to clipboard
  // Grab any text in the attribute 'data-copy' and pass it to the 
  // copy function
  $('.js-copy').click(function() {
    var text = $(this).attr('data-copy');
    var el = $(this);
    copyToClipboard(text, el);
  });


  $(".closeuploadmodal").click(function(){
    window.location.href = getBasePath()+"mediaupload/medialist";
  });


  $('.delete').on('click', function(e) {
    var val = $(this).data("id");
    var url = $(this).data("url");
    $("#rootudialigdeliForm").attr("action",url);
    $("#rootudialigdeli").val(val);
  });


  $(document).on("change","#link_catg",function(e){
    e.preventDefault();
    var selected = $(this).find('option:selected');
    var title = selected.text();
    var catg = selected.data("catgvalue");
    var catgtablehead = selected.data("catgtablehead");
    var tableHtml = "";

    toogleDepartmentList(catg);

    if(catg!="others"){
      var tableHtml = "";
      var table = generateHeaderInputForm(catgtablehead,title);
      $("#generatedTblForLikTblTitle").html(table);
    }
    else{
      $("#generatedTblForLikTblTitle").html(tableHtml);
    }
    

  });

  $(document).on("click",".usemedia-link",function(e){
     
    e.preventDefault();
    var mediaurl = $(this).data("mediaurl");
    $(".getmediaurl").val(mediaurl);
    $("#mediachooser").modal("hide");
  });


  $(document).on("change",".dist_block_option",function(){
      var opt = $(this).val();
      toogleBlockList(opt);
  });

  $(document).on("click","#saveUserMenu",function(e){
  e.preventDefault();

  $("#userMenuAssingmentForm").parsley().validate();

  if($("#userformenuassign").val()!="" || $("#userformenuassign").val() > 0 ) {
    $("#menu_assignment_status_msg").text("");
    var tree = $("#tree").fancytree('getTree').getSelectedNodes();
    
    var selectedUsermenus = [];
      for(var i=0; i<tree.length; i++) {

        var selededmenus = {
          "menuid":tree[i].key,
          "parentid":tree[i].data.parentid
        };
        selectedUsermenus.push(selededmenus);
      }
      var formData =$("#userMenuAssingmentForm").serializeArray();
      formData.push({name:'selectedmenuobj',value: JSON.stringify(selectedUsermenus)});
      $.ajax({
          type: "POST",
          url: getBasePath()+'user/assignmenutouser',
          dataType: "json",
          data: formData,
          success: function (result) {
            var selectedUsermenus = [];
            //getUserAssignedMenus($("#userformenuassign").val());
            $("#menu_assignment_status_msg").text(result.msg_status);
            //$(".status-msg").text(result.msg_status);
            $(".alert").addClass(result.msg_class).addClass('show').css("display","block");
            $("#tree").fancytree("getTree").clearCookies();
            $("#tree").fancytree("getTree").clearCookies("selected");
            //location.reload();
          }, 
          error: function (jqXHR, exception) {
             var err = ajaxErrorMessage(jqXHR,exception);
             console.log(err);
          }
      });
    }


  });


  /*
  var sampleSource = [];
  for (var i = 0; i < 10; i++) {
    sampleSource[i] = {
      title: "Folder " + i,
      folder: true,
      children: []
    };
    for (var j = 0; j < 3; j++) {
      sampleSource[i].children[j] = {
        title: "Subnode " + i + "." + j,
        children: []
      };

      for (var k = 0; k < 3; k++) {
        sampleSource[i].children[j].children[k] = {
          title: "Subnode Sub " + i + "." + j + "." + k,
          selected: true
          
        }
      }

    }
  }
  */


  // $("#tree").fancytree({
  //   checkbox: true,
  //   selectMode: 3,
  //   source: sampleSource
  // });


  // $(document).on("change","#userformenuassign",function(){
  //   var formData =$("#userMenuAssingmentForm").serializeArray();
  //     $.ajax({
  //         type: "POST",
  //         url: getBasePath()+'user/getusermenu',
  //         dataType: "json",
  //         data: formData,
  //         success: function (result) {
           
  //         }, 
  //         error: function (jqXHR, exception) {
  //            var err = ajaxErrorMessage(jqXHR,exception);
  //            console.log(err);
  //         }
  //     });

  // });

  $(document).on("change","#userformenuassign",function(){
    $("#menu_assignment_status_msg").text("");
    getUserAssignedMenus($(this).val());
  });

  //getUserAssignedMenus();


  $('.alert .close').click(function(){
    $(this).parent().hide();
  });



  $(".auto-dismiss-alert").fadeTo(3000, 700).slideUp(700, function() {
    $(".auto-dismiss-alert").slideUp(700);
  });
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });

  $('#blockusertoggle').click(function(){
    if($(this).is(":checked")){
      toogleBlockList("BLOCK");
    }
    else if($(this).is(":not(:checked)")){
      toogleBlockList(null);
    }

  });

  });


  function getUserAssignedMenus(uid) {
    var sampleSource = [];
    $.ajax({
      type: "GET",
      url: getBasePath()+'user/getusermenu',
      dataType: "json",
      data: {uid:uid},
      success: function (result) {
      var sampleSource = [];
      
      for(var i = 0; i < result.adminMenuList.length; i++) {
        firstlevelselected = false;
        if(parseInt(result.adminMenuList[i].firstLevel.adm_menu_id)>0) {firstlevelselected = true;}
        sampleSource[i] = {
          key:result.adminMenuList[i].firstLevel.admin_menu_id,
          title: result.adminMenuList[i].firstLevel.name,
          folder: true,
          children: [],
          selected: firstlevelselected
        };
       // console.log("result.adminMenuList[i].adm_menu_id = " + result.adminMenuList[i].adm_menu_id);
        for (var j = 0; j <result.adminMenuList[i].secondLevel.length; j++) {
          secondlevelselected = false;
          if(parseInt(result.adminMenuList[i].secondLevel[j].Levelrow.adm_menu_id)>0) {secondlevelselected = true;}
          sampleSource[i].children[j] = {
            key:result.adminMenuList[i].secondLevel[j].Levelrow.admin_menu_id,
            title:result.adminMenuList[i].secondLevel[j].Levelrow.name,
            children: [],
            selected: secondlevelselected
          };

    
          for (var k = 0; k < result.adminMenuList[i].secondLevel[j].thirdLevel.length; k++) {
            thirdlevelselected = false;
            if(parseInt(result.adminMenuList[i].secondLevel[j].thirdLevel[k].Levelrow.adm_menu_id)>0) {thirdlevelselected = true;}
            sampleSource[i].children[j].children[k] = {
              key:result.adminMenuList[i].secondLevel[j].thirdLevel[k].Levelrow.admin_menu_id,
              title:result.adminMenuList[i].secondLevel[j].thirdLevel[k].Levelrow.name,
              selected: thirdlevelselected
              
            }
           // alert(thirdlevelselected);
            //console.log("result.adminMenuList[i].secondLevel[j].thirdLevel[k].adm_menu_id = " + result.adminMenuList[i].secondLevel[j].thirdLevel[k].adm_menu_id);
          }
         // console.log("result.adminMenuList[i].secondLevel[j].adm_menu_id = " + result.adminMenuList[i].adm_menu_id);
        }
      }

      console.log(sampleSource);

     
      var tree = $("#tree").fancytree({
        checkbox: true,
        selectMode: 3,
        extensions: ["filter", "persist"],
        persist: {
            cookiePrefix: 'fancytree-1-',
           // expandLazy: true,
            overrideSource: true,  // true: cookie takes precedence over `source` data attributes.
          //  store: "auto" // 'cookie', 'local': use localStore, 'session': sessionStore
        },
        source: sampleSource,
        cache: false
        
      });
   
      }, 
      error: function (jqXHR, exception) {
         var err = ajaxErrorMessage(jqXHR,exception);
         console.log(err);
      }
  });



  }

  function toogleBlockList(opt) {
    $('.block_option select').prop('selectedIndex',0);
    $('.block_option select').attr({'required':false});
    $(".block_option").css("display","none");
    if(opt=="BLOCK") {
      $(".block_option").css("display","block");
      $('.block_option select').attr({'required':true});
    }
  }

  function toogleDepartmentList(opt) {
    $('.department_option select').prop('selectedIndex',0);
    $('.department_option select').attr({'required':false});
    $(".department_option").css("display","none");
    if(opt=="department" || opt=="departments") {
      $(".department_option").css("display","block");
      $('.department_option select').attr({'required':true});
    }
  }

  function generateHeaderInputForm(catgtablehead,title) {
    var tableForm="";
    tableForm+= "<table class='table'>";
    tableForm+= "<tr>";
    tableForm+= "<th colspan="+catgtablehead.length+"> Detail of ";
    tableForm+= title;
    tableForm+= "</th>";
    tableForm+= "</tr>";
    $.each(catgtablehead, function(i, item) {
      if(catgtablehead[i].type!='none'){
        tableForm+= "<tr>";
        tableForm+= "<td>"+catgtablehead[i].heading+"</td>";
        tableForm+= "<td>";
        tableForm+= "<input class='form-control' type=" +catgtablehead[i].type+" name=" +catgtablehead[i].slug+" />";
        tableForm+= "</td>";
        tableForm+= "</tr>";
      }
    });
    tableForm+= "</table>";
    return tableForm;
  }



  function copyToClipboard(text, el) {
    var copyTest = document.queryCommandSupported('copy');
 //   var elOriginalText = el.attr('data-original-title');
 
    if (copyTest === true) {
      var copyTextArea = document.createElement("textarea");
      copyTextArea.value = text;
      document.body.appendChild(copyTextArea);
      copyTextArea.select();
      try {
        var successful = document.execCommand('copy');
        var msg = successful ? 'Copied!' : 'Whoops, not copied!';
        el.attr('data-original-title', msg).tooltip('show');
      } catch (err) {
        el.attr('data-original-title', 'Oops, unable to copy').tooltip('show');
        console.log('Oops, unable to copy');
      }
      document.body.removeChild(copyTextArea);
     // el.attr('data-original-title', "");
      //el.attr('data-original-title', elOriginalText);
    } else {
      // Fallback if browser doesn't support .execCommand('copy')
      window.prompt("Copy to clipboard: Ctrl+C or Command+C, Enter", text);
    }
  }
  


  function readURL(input) {
    console.log("j");
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $('#image-preview').attr('src', e.target.result);
      }
      
      reader.readAsDataURL(input.files[0]);
    }
  }


  function getTablePreviewForHeaderTitle(e) {
      var str ="";
      var count = 0;
      str+= "<table class='table table-bordered'>";
      str+= "<tr>";
      $.each( e.target.selectedOptions , function( index, obj ){
        str+= "<th>"+obj.text+"</th>";
        count++;
      });
      str+= "</tr>";

      if(count>0) {
        for(var ml=0;ml<5;ml++){
          str+= "<tr>";
          for(var i=0;i<count;i++) {
            str+= "<td>Demo Data</td>";
          }
          str+= "</tr>";
        }
      }


      str+= "</table>";
   
    return str;
    
  }