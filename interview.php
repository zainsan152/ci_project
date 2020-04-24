<!doctype html>


<html>
 <body >
     <form method='post' action='' enctype='multipart/form-data'>
      <input type="file" name="file" id="file" >
      <input type='submit' name='submit' value='Upload'>
     </form>
   </td>
   </body>
</html>

<?php
$directoryName = '20'.date('y');
if(!file_exists($directoryName))
	{

	mkdir($directoryName, 0755);
	echo "Directory Created successfully".'</br>';
	$subDirectory = $directoryName.'/'.date('m');
	$ssubDirectory = $directoryName.'/'.date('m').'/'.date('d');
	

	if (!file_exists($subDirectory && $ssubDirectory )) 
		{
			mkdir($subDirectory, 0755);
			mkdir($ssubDirectory, 0755);
			echo "Month Directory Created successfully and date directory created successfully";
		
		}
	else
		{
			echo "Month Directory already exists or failed to create";
		}
	}
else
	{
		echo "Directory already exists or failed to create";
	}
?>


<?php
if(isset($_POST['submit']))
{
$filename = $_FILES['file']['name'];
$filesize = $_FILES['file']['size'];
$location = $directoryName.'/'.date('m').'/'.date('d');;
$location .= "/".$filename;
move_uploaded_file($_FILES['file']['tmp_name'],$location);
}
?>