<?php
require ("../includes/dbconnection.php");
error_reporting( error_reporting() & ~E_NOTICE );

//connection
//include("../includes/session.php");
//require ("../includes/DBConnection.php");

	

//Retrieving function_exists
function mysql_result($result, $row, $field = 0) {
 			   // Adjust the result pointer to that specific row
    			@$result->data_seek($row);
 			   // Fetch result array
 			   $data = $result->fetch_array();
 			   return $data[$field];
				}	



######   PROFESSOR   #######

$proFile=fopen("prof.cfg","w");
// sending query-- select teacher_id and teacher_name from profile table
$result = mysqli_query($conn,"SELECT teacher_id, teacher_name FROM profile");

if (!$result) 
	{
    die("Query to show fields from table failed");
	}
	
$numberOfRows = mysqli_NUM_ROWS($result);
if($numberOfRows == 0) 
	{
	echo 'Sorry No Record Found!';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
			$prof_id = MYSQL_RESULT($result,$i,"teacher_id");
				$txt = $prof_id."\n";
				fwrite($proFile, $txt);
			
			$prof_name = MYSQL_RESULT($result,$i,"teacher_name");
				$txt = $prof_name;
				fwrite($proFile, $txt);
				if($i<$numberOfRows-1)
				fwrite($proFile,"\n");
			
			//echo $profile_no ."  - ".$faculty_name."<br/>" ;			
		$i++;		
		}
	}
	
fclose($proFile);

###### 		COURSE	  #######

$courseFile=fopen("course.cfg","w");
// sending query-- select subject_id and subject_name from subjects table
$result = mysqli_query($conn,"SELECT sub_name,sub_id FROM subjects ");

if (!$result) 
	{
    die("Query to show fields from table failed");
	}
	
$numberOfRows = mysqli_NUM_ROWS($result);
if($numberOfRows == 0) 
	{
	echo 'Sorry No Record Found!';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
			$subject_id = MYSQL_RESULT($result,$i,"sub_id");
				$txt = $subject_id."\n";
				fwrite($courseFile, $txt);
			
			$subject_name = MYSQL_RESULT($result,$i,"sub_name");
				$txt = $subject_name;
				fwrite($courseFile, $txt);
				if($i<$numberOfRows-1)
				fwrite($courseFile,"\n");
			
		$i++;		
		}
	}
	
fclose($courseFile);


######   ROOM   #######

$roomFile=fopen("room.cfg","w");
// sending query-- select room_name,room_isNKN and room_size from room table
$result = mysqli_query($conn,"SELECT room_name,room_isNKN,room_size FROM room ");

if (!$result) 
	{
    die("Query to show fields from table failed");
	}
	
$numberOfRows = mysqli_NUM_ROWS($result);
if($numberOfRows == 0) 
	{
	echo 'Sorry No Record Found!';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
			$room_name = MYSQL_RESULT($result,$i,"room_name");
				$txt = $room_name."\n";
				fwrite($roomFile, $txt);
					
			$room_isNKN = MYSQL_RESULT($result,$i,"room_isNKN");
				$txt = $room_isNKN."\n";
				fwrite($roomFile, $txt);
			
			$room_size = MYSQL_RESULT($result,$i,"room_size");
				$txt = $room_size;
				fwrite($roomFile, $txt);
				if($i<$numberOfRows-1)
				fwrite($roomFile,"\n");
			
		$i++;		
		}
	}
	
fclose($roomFile);

######   GROUP  #######

$groupFile=fopen("group.cfg","w");
// sending query-- select group_id and group_name ,group_size from users table
#$result = mysqli_query($conn,"SELECT dept_id,year FROM user ");
$result = mysqli_query($conn,"SELECT * FROM subjects");

if (!$result) 
	{
    die("Query to show fields from table failed");
	}
	
$numberOfRows = mysqli_NUM_ROWS($result);
if($numberOfRows == 0) 
	{
	echo 'Sorry No Record Found!';
	}
else if ($numberOfRows > 0) 
	{
		
	$myarray=array();
	$i=0;
	
	
##############
function searchForId($thisgroupid, $array) {
   foreach ($array as $key => $val) {
       								 if ($val['id'] === $thisgroupid) { return $key; }
   									}
   return (-1);
}
###############
$group_count = 0;

	while ($i<$numberOfRows)
		{	
			$dept_id = MYSQL_RESULT($result,$i,"dept_id");
			$sub_code=MYSQL_RESULT($result,$i,"sub_code");
			$year = substr($sub_code,2,1);             //temp=year
			
				$group_id=$dept_id.$year;
				//$txt1= $group_id."\n";//for group_id
			
				$group_name=$group_id;
				$txt2 = $group_name."\n";//for group_name
				
				//$key = array_search($group_id, array_column($myarray, 'id'));
				$key= searchForId($group_id,$myarray);
				
			//Adding new group only if it doesn't added before($key==false) and its not admin or Teacher(year!=0)
			if($key == (-1) && ($year != 0)){

				$group_count++;
				if($group_count != 1)
					fwrite($groupFile,"\n");
				$txt1 = $group_count."\n";

				$result2=mysqli_query($conn,"SELECT user_id FROM user WHERE dept_id=$dept_id AND year=$year ") ;
				$group_size = mysqli_num_rows($result2);
				$txt3 = $group_size;
				
				
				$myarray[] = array("id" => $group_id, 
								   "name" => $group_name,
								   "size" => $group_size	);
							
				//saving to file
				fwrite($groupFile, $txt1);
				fwrite($groupFile, $txt2);
				fwrite($groupFile, $txt3);
					 					 
			} 
		$i++;		
		}
	}
	
fclose($groupFile);

######   CLASS   #######


$classFile=fopen("class.cfg","w");
// sending query-- select prof_id, sub_id,duration,groups,lab/isNKN(boolian)
$result = mysqli_query($conn,"SELECT * FROM subjects");

if (!$result) 
	{
    die("Query to show fields from table failed");
	}
	
$numberOfRows = mysqli_NUM_ROWS($result);
if($numberOfRows == 0) 
	{
	echo 'Sorry No Record Found!';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;  
	$flag = 0; 
	while ($i<$numberOfRows)
		{		
			
			//prof_id, sub_id,duration,groups,lab/isNKN(Y/N)
			$sub_id = MYSQL_RESULT($result,$i,"sub_id");	
			$sub_code = MYSQL_RESULT($result,$i,"sub_code");
			$sub_name = MYSQL_RESULT($result,$i,"sub_name");
			$sub_lechrsprWeek = MYSQL_RESULT($result,$i,"sub_lechrsprday");
			  
	    $sub_instructor_id= MYSQL_RESULT($result,$i,"instructor"); 
		$result2= mysqli_query($conn,"SELECT teacher_id FROM profile WHERE teacher_id = $sub_instructor_id ");		
			//$data = $result->fetch_array();
 			//$sub_instr_name= $data['teacher_name'];
		
		$sub_instr_id= MYSQL_RESULT($result2,1,'teacher_id');   
			   
			    $temp=substr($sub_code,2,1);             //temp=year
			    $dept_id=MYSQL_RESULT($result,$i,"dept_id");
			$group_id=$dept_id.$temp;   //group_id=dept.year	
			$isNKN = MYSQL_RESULT($result,$i,"isNKN");
			
			$sub_lechrsprDay=1;               
		while($sub_lechrsprWeek >0){			//writing a class 'L'=lechrsprweek times in class.cfg file
			if($flag != 0)
				fwrite($classFile,"\n");
			$flag = 1;
			fwrite($classFile,$sub_instr_id."\n" );
			fwrite($classFile, $sub_id."\n" );
			fwrite($classFile,$sub_lechrsprDay."\n" );
			fwrite($classFile,$group_id."\n" );
			fwrite($classFile,$isNKN);
			$sub_lechrsprWeek-=1;
		}
		$i++;		
		}
	}
	
fclose($classFile);

?> 