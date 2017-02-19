<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style20 {font-family: Georgia, "Times New Roman", Times, serif; font-size: x-small; }
.style21 {font-size: x-small}
.style22 {font-family: Geneva, Arial, Helvetica, sans-serif}
.style3 {font-family: Georgia, "Times New Roman", Times, serif}
.style2 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style28 {color: #0000FF}
.style30 {font-family: "Courier New", Courier, monospace}
-->
</style>
</head>
<?php
include("../session.php");
  require ("../includes/dbconnection.php");

	
	$pCourse =$_REQUEST['pCourse'];
	$pSy =$_REQUEST['pSy'];
	$pCourse =$_REQUEST['pCourse'];
	$psm=$_REQUEST['pSy'];

   if (isset($_POST['cmdSubmit'])) 
  	{ 		
		
		if (trim($_POST['hidden_psubcatid']) == ""){ $flagsub = 'Required Field.';}
		if (trim($_POST['hidden_pidt']) == "")  { $flagteacher  = 'Required Field.';}
		if (trim($_POST['hidden_proomid']) == "") { $flagroom = 'Required Field.';} 			
		if (trim($_POST['hidden_pdayid']) == ""){ $flagday = 'Required Field.';}
		if (trim($_POST['hidden_pstimeid']) == ""){ $flagstime = 'Required Field.';}
		if (trim($_POST['hidden_petimeid']) == ""){ $flagetime = 'Required Field.';}
		
		

if (($flagsub == "")  && ($flagteacher == "")
 && ($flagroom == "") && ($flagday == "")&& ($flagstime == "") && ($flagetime == ""))
{

			$hidden_psubcat= $_POST['hidden_psubcatid'];
			$hidden_pt= $_POST['hidden_pidt'];
			$hidden_proom= $_POST['hidden_proomid'];
			$hidden_pday = $_POST['hidden_pdayid'];
			$hidden_pstime = $_POST['hidden_pstimeid'];
			$hidden_petime = $_POST['hidden_petimeid'];
			
			/*SELECT * FROM `sched` WHERE 1`sched_id``room_id``course_id``sub_id``teacher_id``time_s_id``time_e_id``day_id``sem_id``year_id``sched_desc` */

			mysql_query ("INSERT INTO sched(course_id, sub_id, profile_no, room_id, year_id, day_id, time_s_id, time_e_id)
					VALUES('$pCourse ', '$hidden_psubcat','$hidden_pt','$hidden_proom','$pSy','$hidden_pday','$hidden_pstime', '$hidden_petime')") or die(mysql_error()); 
					echo "Your file has been saved in the database..";
									 header(
				"Location: sched_list.php");
				}


				}
	
?>
<body>
<form action="<?php echo $_SERVER[PHP_SELF] ?>" name="form1" method="post" >
<p>&nbsp;</p>
<p>
<table width="725" border="0" align="center" bgcolor="#FFFFFF">
  <tr>
    <td width="666" ><table width="666" border="0" align="left" bordercolor="#FFFFFF">
      <tr  bgcolor="#FFF0F5">
        <td colspan="4" bordercolor="#FFFFFF"  bgcolor="#FFFFFF"><div align="center" class="style2">
          <div align="center">Schedule</div>
        </div></td>
      </tr>
      <tr>
        <td colspan="4" bordercolor="#FFFFFF" bgcolor="#FFFFFF" ><label></label>
              <label></label>
              <div align="center" class="style30">
                <div align="left"><a href="index.php"></a>Course Year and Section: <?php   
			

	echo $pCourse;		
?>  
                  </div>
              </div></td>
      </tr>
      <tr>
        <td colspan="4" bordercolor="#FFFFFF" bgcolor="#FFFFFF"><label></label>
              <label></label>
              <div align="center">
                <div align="right" class="style3">
                  <div align="center" class="style28">___________________________________________</div>
                </div>
              </div></td>
      </tr>
      <tr >
        <td width="240" height="34" bordercolor="#FFFFFF" bgcolor="#FFFFFF" ><div align="right" class="style3">Subject </div></td>
        <td bgcolor="#FFFFFF" ><span class="style22">
  
          <label>
          <select name="psub"  id="psub" style="width: 267px" onchange="javascript: return optionList2_SelectedIndex()">
            <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM `subjects` GROUP BY `subjects`.`cys`, `subjects`.`sub_code`, `subjects`.`SYS` HAVING `subjects`.`cys` = '$pCourse' and  `subjects`.`SYS` = '$pSy'  ORDER BY `subjects`.`sub_code`;");			  	
				do {  ?>
            <option value="<?php echo $row['sub_id'];?>"><?php echo $row['sub_code'];?> </option>
            <?php } while ($row = mysql_fetch_assoc($result)); ?>
          </select>
          <!-- 
			Setting up the correct combo box width alignment to table
			source: http://www.eskimo.com/~bloo/indexdot/html/topics/selectwidth.htm
		-->
          <input type="hidden" id="hidden_psubcatid" name="hidden_psubcatid"  value="<?PHP echo trim($_POST['hidden_psubcatid']); ?>" />
          <input type="hidden" id="hidden_psubcat" name="hidden_psubcat" value="<?PHP echo trim($_POST['hidden_psubcat']); ?>"/>
          </label>
</span></td>
        <td bgcolor="#FFFFFF"><span class="style21"><span class="style20"><?php echo $flagsub; ?></span></span></td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr bordercolor="#FFFFFF">
        <td height="35" bordercolor="#FFFFFF" bgcolor="#FFFFFF"><div align="right" class="style3">Teacher</div></td>
        <td bgcolor="#FFFFFF" ><span class="style22">
          <label>
          <select name="pteacher"  id="pteacher" style="width: 267px" onchange="javascript: return optionList3_SelectedIndex()">
            <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM profile ORDER BY faculty_name ");			  	
				do {  ?>
            <option value="<?php echo $row['profile_no'];?>"><?php echo $row['faculty_name'];?> </option>
            <?php } while ($row = mysql_fetch_assoc($result)); ?>
          </select>
          <!-- 
			Setting up the correct combo box width alignment to table
			source: http://www.eskimo.com/~bloo/indexdot/html/topics/selectwidth.htm
		-->
          <input type="hidden" id="hidden_pidt" name="hidden_pidt"  value="<?PHP echo trim($_POST['hidden_pidt']); ?>" />
          <input type="hidden" id="hidden_pt" name="hidden_pt" value="<?PHP echo trim($_POST['hidden_pt']); ?>"/>
          </label>
        </span></td>
        <td bgcolor="#FFFFFF"><span class="style21"><span class="style20"><?php echo $flagteacher; ?></span></span></td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr bordercolor="#FFFFFF">
        <td height="34" bordercolor="#FFFFFF" bgcolor="#FFFFFF" ><div align="right" class="style3">Room</div></td>
        <td bgcolor="#FFFFFF" ><span class="style22">
          <label>
          <select name="proom"  id="proom" style="width: 267px" onchange="javascript: return optionList4_SelectedIndex()">
            <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM room ORDER BY room_name ");			  	
				do {  ?>
            <option value="<?php echo $row['room_id'];?>"><?php echo $row['room_name'];?> </option>
            <?php } while ($row = mysql_fetch_assoc($result)); ?>
          </select>
          <!-- 
			Setting up the correct combo box width alignment to table
			source: http://www.eskimo.com/~bloo/indexdot/html/topics/selectwidth.htm
		-->
          <input type="hidden" id="hidden_proomid" name="hidden_proomid"  value="<?PHP echo trim($_POST['hidden_proomid']); ?>" />
          <input type="hidden" id="hidden_proom" name="hidden_proom" value="<?PHP echo trim($_POST['hidden_proom']); ?>"/>
          </label>
        </span></td>
        <td bgcolor="#FFFFFF"><span class="style21"><span class="style20"><?php echo $flagroom; ?></span></span></td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td height="34" bordercolor="#FFFFFF" bgcolor="#FFFFFF" ><div align="right" class="style3">Day</div></td>
        <td bordercolor="#FFFFFF" bgcolor="#FFFFFF" ><label>
          <input type="checkbox" name="chkM" value="checkbox" />
          M
          <input type="checkbox" name="chkT" value="checkbox" />
          T
          <input type="checkbox" name="chkW" value="checkbox" />
          W
          <input type="checkbox" name="chkTh" value="checkbox" />
Th
<input type="checkbox" name="chkF" value="checkbox" />
F
<input type="checkbox" name="chkS" value="checkbox" />
S</label></td>

        <td bordercolor="#FFFFFF" bgcolor="#FFFFFF"><span class="style21"><span class="style20"><?php echo $flagday; ?></span></span></td>
        <td bordercolor="#FFFFFF" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td height="34" bordercolor="#FFFFFF" bgcolor="#FFFFFF" ><div align="right" class="style3">Starting Time </div></td>
        <td bordercolor="#FFFFFF" bgcolor="#FFFFFF" ><span class="style22">
          <label>
          <select name="pstime"  id="pstime" style="width: 267px" onchange="javascript: return optionList9_SelectedIndex()">
            <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM timestart ORDER BY time_s ");			  	
				do {  ?>
            <option value="<?php echo $row['time_s_id'];?>"><?php echo $row['time_s'];?> </option>
            <?php } while ($row = mysql_fetch_assoc($result)); ?>
          </select>
          <!-- 
			Setting up the correct combo box width alignment to table
			source: http://www.eskimo.com/~bloo/indexdot/html/topics/selectwidth.htm
		-->
          <input type="hidden" id="hidden_pstimeid" name="hidden_pstimeid"  value="<?PHP echo trim($_POST['hidden_pstimeid']); ?>" />
          <input type="hidden" id="hidden_pstime" name="hidden_pstime" value="<?PHP echo trim($_POST['hidden_pstime']); ?>"/>
</label></span></td>
        <td bordercolor="#FFFFFF" bgcolor="#FFFFFF"><span class="style21"><span class="style20"><?php echo $flagstime; ?></span></span></td>
        <td bordercolor="#FFFFFF" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td height="34" bordercolor="#FFFFFF" bgcolor="#FFFFFF" ><div align="right" class="style3">Ending Time </div></td>
        <td bordercolor="#FFFFFF" bgcolor="#FFFFFF" ><span class="style22">
          <label>
          <select name="petime"  id="petime" style="width: 267px" onchange="javascript: return optionList10_SelectedIndex()">
            <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM timeend ORDER BY time_e ");			  	
				do {  ?>
            <option value="<?php echo $row['time_e_id'];?>"><?php echo $row['time_e'];?> </option>
            <?php } while ($row = mysql_fetch_assoc($result)); ?>
          </select>
          <!-- 
			Setting up the correct combo box width alignment to table
			source: http://www.eskimo.com/~bloo/indexdot/html/topics/selectwidth.htm
		-->
          <input type="hidden" id="hidden_petimeid" name="hidden_petimeid"  value="<?PHP echo trim($_POST['hidden_petimeid']); ?>" />
          <input type="hidden" id="hidden_petime" name="hidden_petime" value="<?PHP echo trim($_POST['hidden_petime']); ?>"/>
</label></span></td>
        <td bordercolor="#FFFFFF" bgcolor="#FFFFFF"><span class="style21"><span class="style20"><?php echo $flagetime; ?></span></span></td>
        <td bordercolor="#FFFFFF" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr  bordercolor="#FFFFFF">
        <td height="39" colspan="4" bordercolor="#FFFFFF" bgcolor="#FFFFFF" ><div align="right" class="style3">
          <div align="center" class="style28">___________________________________________</div>
        </div></td>
      </tr>
      <tr bordercolor="#FFF0F5" bgcolor="#FFF0F5" >
        <td colspan="3" bordercolor="#FFFFFF" bgcolor="#FFFFFF"><div align="center"><span class="style30">
          <input type="submit" name="cmdSubmit" value="Submit" />
          &nbsp;
          <input type="submit" name="cmdClear" value="Clear" />
        </span></div></td>
        <td bordercolor="#FFFFFF" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr bordercolor="#FFFFFF">
        <td colspan="4" bordercolor="#FFFFFF"  bgcolor="#FFFFFF"><div align="center"></div></td>
      </tr>
    </table></td>
  </tr>
</table>
</p>
</form>
</body>
</html>
<script language="javascript" >
/*		function SubmitForm(form)
		{			
			var form = document.forms[0];		
			if ((form.pLName.value.length <1) ||
				(form.pFName.value.length <1) ||
				(form.pMIName.value.length <1)) 
				{						
				 return false; 		
				}				 									
			else
				{	
				  return true;
				}
		}
*/		
		function optionList_SelectedIndex()
		{
			//----------------------------------------------------------------------------------------------------------
			/*HTML/JavaScript - Working with selectedIndex (select, options, selectedIndex, text, value)
			The selectedIndex number can be used to reference the selected option in the select list. 
			Note: It is case sensitive. 		
			Make sure to capitalize the "I" in selectedIndex
			* selectedIndex - The number (base 0) of the item that is selected in the select list
			* value - For an option, what's in the value attribute.
			  If the value attribute is not set, text should be returned [* refer below]
				  o val1 is the value in the following HTML example
				  o <option value="val1">sea one</option>
			* text - For an option, what's in between the option tags
				  o sea two is the text in the following HTML example
				  o <option value="val2">sea two</option>*/

			var selObj = document.getElementById('pcourse');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_pcourseid_ValueObj = document.getElementById('hidden_pcourseid');
			var hidden_pcourse_TextObj = document.getElementById('hidden_pcourse');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_pcourseid_ValueObj.value = selObj.options[selIndex].value;
			hidden_pcourse_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		function optionList2_SelectedIndex()
		{
			//----------------------------------------------------------------------------------------------------------
			/*HTML/JavaScript - Working with selectedIndex (select, options, selectedIndex, text, value)
			The selectedIndex number can be used to reference the selected option in the select list. 
			Note: It is case sensitive. 		
			Make sure to capitalize the "I" in selectedIndex
			* selectedIndex - The number (base 0) of the item that is selected in the select list
			* value - For an option, what's in the value attribute.
			  If the value attribute is not set, text should be returned [* refer below]
				  o val1 is the value in the following HTML example
				  o <option value="val1">sea one</option>
			* text - For an option, what's in between the option tags
				  o sea two is the text in the following HTML example
				  o <option value="val2">sea two</option>*/

			var selObj = document.getElementById('psub');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_psubcatid_ValueObj = document.getElementById('hidden_psubcatid');
			var hidden_psubcat_TextObj = document.getElementById('hidden_psubcat');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_psubcatid_ValueObj.value = selObj.options[selIndex].value;
			hidden_psubcat_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		function optionList3_SelectedIndex()
		{
			//----------------------------------------------------------------------------------------------------------
			/*HTML/JavaScript - Working with selectedIndex (select, options, selectedIndex, text, value)
			The selectedIndex number can be used to reference the selected option in the select list. 
			Note: It is case sensitive. 		
			Make sure to capitalize the "I" in selectedIndex
			* selectedIndex - The number (base 0) of the item that is selected in the select list
			* value - For an option, what's in the value attribute.
			  If the value attribute is not set, text should be returned [* refer below]
				  o val1 is the value in the following HTML example
				  o <option value="val1">sea one</option>
			* text - For an option, what's in between the option tags
				  o sea two is the text in the following HTML example
				  o <option value="val2">sea two</option>*/

			var selObj = document.getElementById('pteacher');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_pidt_ValueObj = document.getElementById('hidden_pidt');
			var hidden_pt_TextObj = document.getElementById('hidden_pt');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_pidt_ValueObj.value = selObj.options[selIndex].value;
			hidden_pt_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		
		
		function optionList4_SelectedIndex()
		{
			//----------------------------------------------------------------------------------------------------------
			/*HTML/JavaScript - Working with selectedIndex (select, options, selectedIndex, text, value)
			The selectedIndex number can be used to reference the selected option in the select list. 
			Note: It is case sensitive. 		
			Make sure to capitalize the "I" in selectedIndex
			* selectedIndex - The number (base 0) of the item that is selected in the select list
			* value - For an option, what's in the value attribute.
			  If the value attribute is not set, text should be returned [* refer below]
				  o val1 is the value in the following HTML example
				  o <option value="val1">sea one</option>
			* text - For an option, what's in between the option tags
				  o sea two is the text in the following HTML example
				  o <option value="val2">sea two</option>*/

			var selObj = document.getElementById('proom');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_proomid_ValueObj = document.getElementById('hidden_proomid');
			var hidden_proom_TextObj = document.getElementById('hidden_proom');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_proomid_ValueObj.value = selObj.options[selIndex].value;
			hidden_proom_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		
		
				function optionList5_SelectedIndex()
		{
			//----------------------------------------------------------------------------------------------------------
			/*HTML/JavaScript - Working with selectedIndex (select, options, selectedIndex, text, value)
			The selectedIndex number can be used to reference the selected option in the select list. 
			Note: It is case sensitive. 		
			Make sure to capitalize the "I" in selectedIndex
			* selectedIndex - The number (base 0) of the item that is selected in the select list
			* value - For an option, what's in the value attribute.
			  If the value attribute is not set, text should be returned [* refer below]
				  o val1 is the value in the following HTML example
				  o <option value="val1">sea one</option>
			* text - For an option, what's in between the option tags
				  o sea two is the text in the following HTML example
				  o <option value="val2">sea two</option>*/

			var selObj = document.getElementById('pdept');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_pdeptid_ValueObj = document.getElementById('hidden_pdeptid');
			var hidden_pdept_TextObj = document.getElementById('hidden_pdept');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_pdeptid_ValueObj.value = selObj.options[selIndex].value;
			hidden_pdept_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		
		
						function optionList6_SelectedIndex()
		{
			//----------------------------------------------------------------------------------------------------------
			/*HTML/JavaScript - Working with selectedIndex (select, options, selectedIndex, text, value)
			The selectedIndex number can be used to reference the selected option in the select list. 
			Note: It is case sensitive. 		
			Make sure to capitalize the "I" in selectedIndex
			* selectedIndex - The number (base 0) of the item that is selected in the select list
			* value - For an option, what's in the value attribute.
			  If the value attribute is not set, text should be returned [* refer below]
				  o val1 is the value in the following HTML example
				  o <option value="val1">sea one</option>
			* text - For an option, what's in between the option tags
				  o sea two is the text in the following HTML example
				  o <option value="val2">sea two</option>*/

			var selObj = document.getElementById('psem');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_psemid_ValueObj = document.getElementById('hidden_psemid');
			var hidden_psem_TextObj = document.getElementById('hidden_psem');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_psemid_ValueObj.value = selObj.options[selIndex].value;
			hidden_psem_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		
		
		//hidden_psyid
		
								function optionList7_SelectedIndex()
		{
			//----------------------------------------------------------------------------------------------------------
			/*HTML/JavaScript - Working with selectedIndex (select, options, selectedIndex, text, value)
			The selectedIndex number can be used to reference the selected option in the select list. 
			Note: It is case sensitive. 		
			Make sure to capitalize the "I" in selectedIndex
			* selectedIndex - The number (base 0) of the item that is selected in the select list
			* value - For an option, what's in the value attribute.
			  If the value attribute is not set, text should be returned [* refer below]
				  o val1 is the value in the following HTML example
				  o <option value="val1">sea one</option>
			* text - For an option, what's in between the option tags
				  o sea two is the text in the following HTML example
				  o <option value="val2">sea two</option>*/

			var selObj = document.getElementById('psy');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_psyid_ValueObj = document.getElementById('hidden_psyid');
			var hidden_psy_TextObj = document.getElementById('hidden_psy');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_psyid_ValueObj.value = selObj.options[selIndex].value;
			hidden_psy_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		
										function optionList8_SelectedIndex()
		{
			//----------------------------------------------------------------------------------------------------------
			/*HTML/JavaScript - Working with selectedIndex (select, options, selectedIndex, text, value)
			The selectedIndex number can be used to reference the selected option in the select list. 
			Note: It is case sensitive. 		
			Make sure to capitalize the "I" in selectedIndex
			* selectedIndex - The number (base 0) of the item that is selected in the select list
			* value - For an option, what's in the value attribute.
			  If the value attribute is not set, text should be returned [* refer below]
				  o val1 is the value in the following HTML example
				  o <option value="val1">sea one</option>
			* text - For an option, what's in between the option tags
				  o sea two is the text in the following HTML example
				  o <option value="val2">sea two</option>*/

			var selObj = document.getElementById('pday');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_pdayid_ValueObj = document.getElementById('hidden_pdayid');
			var hidden_pday_TextObj = document.getElementById('hidden_pday');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_pdayid_ValueObj.value = selObj.options[selIndex].value;
			hidden_pday_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		
		
												function optionList9_SelectedIndex()
		{
			//----------------------------------------------------------------------------------------------------------
			/*HTML/JavaScript - Working with selectedIndex (select, options, selectedIndex, text, value)
			The selectedIndex number can be used to reference the selected option in the select list. 
			Note: It is case sensitive. 		
			Make sure to capitalize the "I" in selectedIndex
			* selectedIndex - The number (base 0) of the item that is selected in the select list
			* value - For an option, what's in the value attribute.
			  If the value attribute is not set, text should be returned [* refer below]
				  o val1 is the value in the following HTML example
				  o <option value="val1">sea one</option>
			* text - For an option, what's in between the option tags
				  o sea two is the text in the following HTML example
				  o <option value="val2">sea two</option>*/

			var selObj = document.getElementById('pstime');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_pstimeid_ValueObj = document.getElementById('hidden_pstimeid');
			var hidden_pstime_TextObj = document.getElementById('hidden_pstime');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_pstimeid_ValueObj.value = selObj.options[selIndex].value;
			hidden_pstime_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		
		
		function optionList10_SelectedIndex()
		{
			//----------------------------------------------------------------------------------------------------------
			/*HTML/JavaScript - Working with selectedIndex (select, options, selectedIndex, text, value)
			The selectedIndex number can be used to reference the selected option in the select list. 
			Note: It is case sensitive. 		
			Make sure to capitalize the "I" in selectedIndex
			* selectedIndex - The number (base 0) of the item that is selected in the select list
			* value - For an option, what's in the value attribute.
			  If the value attribute is not set, text should be returned [* refer below]
				  o val1 is the value in the following HTML example
				  o <option value="val1">sea one</option>
			* text - For an option, what's in between the option tags
				  o sea two is the text in the following HTML example
				  o <option value="val2">sea two</option>*/

			var selObj = document.getElementById('petime');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_petimeid_ValueObj = document.getElementById('hidden_petimeid');
			var hidden_petime_TextObj = document.getElementById('hidden_petime');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_petimeid_ValueObj.value = selObj.options[selIndex].value;
			hidden_petime_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		
</script>	

<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.psubcat.value = ("<?PHP echo $_POST['hidden_psubcat']; ?>");
	form.psem.value = ("<?PHP echo $_POST['hidden_psem']; ?>");
	
	//alert (form.pCityM.value);				
</script>