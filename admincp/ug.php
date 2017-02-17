<?php
echo'<title>Upload - Gallery - '.$config->title.'</title>';
echo'<div class="breadcrumb"><a href="/index.php">Home</a> > <a href="/gallery">Gallery</a> > Upload</div>';
echo"<center>";
include"../ads.php";
fblike();

echo"</center>";
echo"<center>
	  
        <div class='public_message'><div class='success'></div></div> 
     
</center>  

        
        
<div style='margin-top: 5px;' class='grid3'>  
	     
    	  
           
       
</div>";
echo"<div class='grid3 middle'>";
if(!isloggedin())
{
    echo'<div class="b_head">Not Allowed</div>';
    echo'It seems yu are not logged in or not registered. This feature is only for registered and logged in users. Thank You';
    echo'<div class="gap"></div><div class="link_button"><a href="/gallery/index.php">Go Back</a></div>';
    exit;
}
if($_POST["upload"])
{
    $dir = 'images'; // Directory for dtoring files.
    $name = cleanvalues($_POST["name"]);
    $desc = cleanvalues($_POST["desc"]);
    $cat = cleanvalues((int)$_POST["category"]);
    $allowedtype = array("jpg", "gif", "bmp", "jpeg", "png"); // allowed file types
    $maxsize = 200; // Maximum file size in KB
    $imagename = $_FILES["image"]["name"];
    $imageext = end(explode(".", $_FILES["image"]["name"]));
    $imagesize = $_FILES["image"]["size"];
    $imagetype = $_FILES["image"]["type"];
    $errors = array();
    if(!in_array($imageext, $allowedtype))
    {
        $errors[] = 'Unsupported File Type '.$imageext.'';
    }
    if(empty($name) || strlen($name) > 100 || strlen($name) < 10)
    {
        $errors[] = 'The file name is not as specified.';
    }
    if(strlen($desc) > 140 || strlen($desc) < 5 || empty($desc))
    {
        $errors[] = 'File description is not okay.';
    }
    if(($imagesize / 1024) > $maxsize)
    {
        $errors[] = 'File exceeded our file-size limit of '.get_size($maxsize * 1024);
    }
    if(empty($cat) || empty($cat))
    {
        $errors[] = 'Some values are empty or too short';
    }
    if(count($errors) == 0)
    {
        if(!file_exists($dir))
        {
            mkdir($dir);
        }
        $time = time();
        $user = $_SESSION["user"];
        $image = $time.'-'.$imagename;
        if(move_uploaded_file($_FILES["image"]["tmp_name"], "$dir/$image"))
        {
            $query = mysql_query("INSERT INTO `pbnl_gallery` SET `title` = '$name', `name` = '$imagename', `directory` = '$dir', `category` = '$cat', `size` = '$imagesize', `time` = '$time', `type` = '$imagetype', `by` = '$user', `desc` = '$desc'");
            if(!$query)
            {
                $errors[] = '<div class="msg">File uploaded successfully but an error was encountered trying to store the details to our database';
            } else {
                header('Location: /gallery/?f='.$cat.'');
            }
        } else {
            $errors[] = 'File not uploaded, contact system administrator '.mysql_error().'';
        }
        if(count($errors) > 0)
        {
            $print = '';
            foreach($errors as $p)
            {
                $print .= $p.' <br />';
            }
            echo'<div class="msg">'.$print.'</div>';
        }
    } else {
        $echo = '';
        foreach($errors as $er)
        {
            $echo.="$er<br />";
        }
        echo'<div class="msg">'.$echo.'</div>';
    }
    
}
$CatOptions = '';
$query = mysql_query("SELECT `name`, `id` FROM `pbnl_gallery_cat`");
while($row = mysql_fetch_assoc($query))
{
    $name = $row["name"];
    $id = $row["id"];
    $CatOptions .= '<option value="'.$id.'">'.$name.'</option>';
}
?>
<div class="b_head">Upload Pictures</div><br />
<p>Please, ALL Fields Are Required</p>
<form action="#" method="POST" enctype="multipart/form-data">
<b>Name:</b> <i>(Max of 100 chars. Min of 10)</i> <br />
<input type="text" name="name" /> <br /><br />
<b>Image</b> <i>(only jpg, png, bmp, jpeg and gif are allowed):-</i> <br />
<input type="file" name="image" /> <br /><br />
<b>Description<i>(minimum of 5 characters, max of 140):-</i></b><br /><br />
<textarea name="desc" rows="8" cols="40"></textarea> <br /><br />
<b>Category:</b> <br />
<select name="category"><option value="">--SELECT--</option><?php echo $CatOptions; ?></select><br /><br />
<input type="submit" name="upload" value="Upload" />
</form>
<div class="gap"></div>
<div class="link_button"><a href="/gallery/">Go back</a></div>
<?php include'../footer.php'; ?>