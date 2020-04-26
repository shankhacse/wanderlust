

		<tr id="rowDocument_0_<?php echo $rowno; ?>">
			<td>
			
					<input type="hidden" name="prvFilename[]" id="prvFilename_0_<?php echo $rowno; ?>" class="form-control prvFilename" value="" readonly >

					<input type="hidden" name="randomFileName[]" id="randomFileName_0_<?php echo $rowno; ?>" class="form-control randomFileName" value="" readonly >

					<input type="hidden" name="docDetailIDs[]" id="docDetailIDs_0_<?php echo $rowno; ?>" class="form-control randomFileName" value="0" readonly >
		
				<input type="file" name="fileName[]" class="file fileName" id="fileName_0_<?php echo $rowno; ?>" accept='image/*'>
				<div class="input-group col-xs-12">
				     <!--  <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span> -->
					<input type="text" name="userFileName[]" id="userFileName_0_<?php echo $rowno; ?>" class="form-control input-xs userFileName" readonly placeholder="Upload Image" >

						<input type="hidden" name="isChangedFile[]" id="isChangedFile_0_<?php echo $rowno; ?>" value="Y" >
						<span class="input-group-btn">
					    <button class="browse btn btn-primary input-xs" type="button" id="uploadBtn_0_<?php echo $rowno; ?>">
					      	<i class="fa fa-folder-open" aria-hidden="true"></i>
						</button>
					    </span>
				</div>
			</td>
		
			<td style="vertical-align: middle;">
				<a href="javascript:;" class="delDocType" id="delDocRow_0_<?php echo $rowno; ?>" title="Delete">
					 <i class="far fa-trash-alt" style="color: #d04949;; font-weight:700;"></i>
				</a>
			</td>
		</tr>