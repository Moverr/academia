<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">

<meta name="description" content="">
<meta name="keywords" content="">
<title><?php echo SITE_TITLE." : Purchases report";?></title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL;?>favicon.ico">
<?php
echo "<script src='".base_url()."js/jquery.min.js' type='text/javascript'></script>";
echo minimize_code($this, 'javascript');
echo get_AJAX_constructor(TRUE);
?>
<?php echo minimize_code($this, 'stylesheets');?>
<style>

</style>
</head>

<body>
<div>
<table width="100%">
<tr>
	<td colspan="2" style="text-align:center;"><?php echo strtoupper($schoolname); ?></td>
</tr>
<tr>

<td align="left" width="50%">ISSUING REPORT</td>
<?php
	$size = sizeof($page_list);
	$maxdate = date("j M, Y", GetTimeStamp($page_list[($size-1)]['dateadded']));
	$mindate = date("j M, Y", GetTimeStamp($page_list[0]['dateadded']));
?>
<td align="right" width="50%">From : <?php  if(!empty($datefrom)) echo date("j M, Y", GetTimeStamp($datefrom)); else echo $maxdate;?> &nbsp;&nbsp;To : <?php if(!empty($dateto)) echo date("j M, Y", GetTimeStamp($dateto)); else echo $mindate;?></td>
</tr>
</table>
</div><br /><br />
<?php
#Show search results
if(!empty($page_list))
{
	echo "<table width='100%' border='0' cellspacing='0' cellpadding='5'>
          	<tr>
			<td class='listheader' nowrap>Date</td>
           	
			<td class='listheader' nowrap>Item Name</td>			
			<td class='listheader' nowrap>Quantity</td>
			<td class='listheader' nowrap>Issued to:</td>	
			</tr>";	
	$counter = 0;	
	
	foreach($page_list AS $row)
	{
		
		
		#Show one row at a time
		echo "<tr style='".get_row_color($counter, 2)."'>";
		
		 echo "
		
		<td valign='top'>".date("j M, Y", GetTimeStamp($row['dateadded']))."</td>		
		
		<td valign='top'>".$row['itemname']."</td>
		
		<td valign='top'>".$row['quantity']."</td>
		
		<td valign='top'>".$row['firstname']." ".$row['lastname']."</td>
		
		</tr>";
		
		$counter++;
	}
	
		
	echo "</table>";	
		
} else {
	echo format_notice("There are no transactions at the moment.");
	
}?><br /><br />
<?php $this->load->view('incl/footer');?>
</body>
</html>