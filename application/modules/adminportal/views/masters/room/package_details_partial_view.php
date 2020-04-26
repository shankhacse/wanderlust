
    

    <tr id="rowItemdetails_<?php echo $rowno; ?>" class="itemDtlCls" >

    <td style="text-align: left;"> 
        
      <span id="serial_<?php echo $rowno; ?>"><?php echo $rowno;?></span>                  
    </td>


    
    <td style="text-align: left;width: 20%"> 
	  <input type="hidden" class="packagetypeidid" name="packagetypeidid[]" id="packagetypeidid_<?php echo $rowno; ?>" value="<?php echo $sel_package_type;?>"> 

    
     <span class="showdata_<?php echo $rowno; ?>"><?php echo $package_name;?></span>        		        
    </td>
  

     <td style="text-align: right;"> 
    <input type="hidden" class="listamount" name="listamount[]" id="listamount_<?php echo $rowno; ?>" value="<?php echo $rate;?>">    

     
     <span class="showdata2_<?php echo $rowno; ?>"><?php echo $rate;?></span>                    
    </td>

  
         

						<td style="vertical-align: middle;text-align: center;">


			<a href="javascript:;" class="delDetails" id="delDocRow_<?php echo $rowno; ?>" title="Delete">
     
      <i class="far fa-trash-alt" style="color: #d04949;; font-weight:700;"></i>
          

        </a>
        
        
			</td>				
				
		
    </tr>
    
