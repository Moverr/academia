<?php  
			#$page_list = array();
			if(!empty($page_list))
			{
				echo "<table width='100%' border='0' cellspacing='0' cellpadding='5'>
          	<tr>
			<td class='listheader' width='1%'>&nbsp;</td>
           	<td class='listheader' nowrap>Scale &nbsp;<a class='fancybox fancybox.ajax' href='".base_url()."grading/load_grading_form')' title='Click to add a grading scale'><img src='".base_url()."images/add_item.png' border='0'/></a></td>
			<td class='listheader' nowrap='nowrap'>Description</td>
			<td class='listheader' nowrap>Classes</td>
			<td class='listheader' nowrap>Date Added</td>
			</tr>";	
	$counter = 0;	
	foreach($page_list AS $row)
	{
		#Get applicable classes
		$class_str = '';
		$classids = explode('|', $row['classes']);
		$classids = remove_empty_indices($classids);
				
		#Show in drop down if more than 1 class
		if(is_array($classids))
		{
		  if(count($classids) > 1){
			  foreach ($classids AS $key => $classid)
				  $class_str .= '<option>'.get_class_title($this, $classid).'</option>';
				  $class_str = '<select class="selectfield">'.$class_str.'</select>';
		  }
		  elseif(count($classids) > 0)
		  {
			  $class_str = get_class_title($this, end(($classids)));
		  }
		}
		else
		{
			$class_str = "N/A";
		}
		
		#Show one row at a time
		echo "<tr id='tr_".$row['id']."' class='listrow' style='".get_row_color($counter, 2)."'>
		<td class='leftListCell rightListCell' valign='middle' nowrap>";
		
			#if(check_user_access($this,'delete_deal')){
				echo "<a href='javascript:void(0)' onclick=\"asynchDelete('".base_url()."grading/delete_grading_scheme/i/".encryptValue($row['id'])."', 'Are you sure you want to remove this grading scale? \\nThis operation can not be undone. \\nClick OK to confirm, \\nCancel to cancel this operation and stay on this page.', 'tr_".$row['id']."');\" title=\"Click to remove ".$row['gradingname']." from the school exam schedule.\"><img src='".base_url()."images/delete.png' border='0'/></a>";
			#}
		
			#if(check_user_access($this,'update_deals')){
				echo " &nbsp;&nbsp; <a class='fancybox fancybox.ajax' href='".base_url()."grading/load_grading_form/i/".encryptValue($row['id'])."' title=\"Click to edit ".$row['gradingname']." details.\"><img src='".base_url()."images/edit.png' border='0'/></a>";
			#}
		
		
		 echo "</td>		
				<td valign='middle'>".$row['gradingname']."</td>		
				<td valign='middle'>".$row['description']."</td>				
				<td valign='middle' nowrap>".$class_str."</td>
				<td  class='rightListCell' valign='top'>".date("j M, Y", GetTimeStamp($row['dateadded']))."</td>		
			</tr>";
		
		$counter++;
	}
	
		
	echo "<tr>
	<td colspan='5' align='right'  class='layer_table_pagination'>".
	pagination($this->session->userdata('search_total_results'), $rows_per_page, $current_list_page, base_url()."grading/manage_grading/p/%d", 'results')
	."</td>
	</tr>
	</table>";	
			}
			else
			{
				echo "<div>No grading schemes have been added. Click <a class='fancybox fancybox.ajax' href='".base_url()."grading/load_grading_form')' title='Click to add a grading scale'><i>here</i></a> to add a grading scheme</div";
			}
		
		?>    
            
       