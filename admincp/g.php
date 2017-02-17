<?php
$user = $_SESSION["user"];
$level = user_info($user, 'level');
if($level < 1)
{
    header("Location: /error.php");
    exit;
}
echo'<title>Admin - Gallery - '.$config->title.'</title>';
echo'<div class="breadcrumb"><a href="/index.php">Home</a> > <a href="/gallery/">Gallery</a> > Admin</div>';
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
?>
<div class="b_head">Admin Actions</div>
<?php
$action = $_GET["action"];
if($action == 'drop')
{
    $file = $_GET["drop"];
    $query = mysql_fetch_assoc(mysql_query("SELECT * FROM `pbnl_gallery` WHERE `id` = $file"));
    $time = $query["time"];
    $name = $query["name"];
    $dir = $query["directory"];
    $cat = $query["category"];
    $sname = $dir.'/'.$time.'-'.$name;
    $delete = unlink($sname);
    if($delete)
    {
        mysql_query("DELETE FROM `pbnl_gallery` WHERE `id` = $file");
        $msg = 'Deleted Successfully';
    } else {
        $msg = 'A technical error occured. Contact analikebridge@gmail.com or http://facebook.com/analikebridge';
    }
    header('Location: /gallery/?f='.$cat.'');
    
} elseif ($_GET["action"] == 'delete') {
    $file = $_GET["fid"];
    $filed = mysql_fetch_assoc(mysql_query("SELECT `name` FROM `pbnl_gallery` WHERE `id` = $file"));
    echo'<div class="gap"></div>';
    echo'<center>Are you sure you want to delete '.$filed["name"].'? <br /><br /><a href="/gallery/?file='.$file.'"><font color="lime"><b>NO</b></font></a> | <a href="/gallery/?admin&drop='.$file.'"><font color="red">YES</font</a></center>';
    $backlink = '/gallery/?file='.$file;
} elseif($action == 'addcat') {
    if(isset($_POST["add"]))
    {
        $name = $_POST["name"];
        $iconname = $_FILES["icon"]["name"];
        $allowed = array("jpg", "bmp", "gif", "png", "jpeg");
        $ext = end(explode(".", $iconname));
        $asize = 200;
        $size = $_FILES["icon"]["size"];
        if(!in_array("$ext", $allowed))
        {
            echo'<div class="msg">File type not allowed</div>';
        } elseif($size > ($asize * 1024)) {
            echo'<div class="msg">File size too large. Max Size shouldn\'t be more than '.get_size($asize * 1024).'</div>';
        } elseif(empty($name) || strlen($name) < 4) {
            echo'<div class="msg">The category cannot be empty or less than 4</div>';
        } elseif(!isset($_FILES["icon"]["name"])) {
            echo'<div class="msg">Icon not selected.</div>';
        } else {
            if(!file_exists('icons'))
            {
                mkdir('icons');
            }
            $move = move_uploaded_file($_FILES["icon"]["tmp_name"], 'icons/'.$iconname.'');
            if($move)
            {
                $time = time();
                $ins = "INSERT INTO `pbnl_gallery_cat` SET `name` = '$name', `icon` = '$iconname', `date` = '$time'";
                $query = mysql_query($ins);
                if($query)
                {
                    header("Location: /gallery/");
                } else {
                    echo'A technical error encountered, contact analikebridge@gmail.com or http://facebook.com/analikebridge';
                }
            } else {
                echo'<div class="msg">File not uploaded! Category not added</div>';
            }
        }
    }
    echo'<div class=gap></div> <h3>Add New Gallery Category</h3><br />
        <form action="#" method="post" enctype="multipart/form-data">
            <b>Name:</b><br /> <input type="text" name="name" /> <br />
            <b>Icon:</b><br /> <input type="file" name="icon" /> <br />
            <input type="submit" name="add" value="ADD" />
        </form>
    ';
    $backlink = '/gallery/index.php';
} elseif ($action == 'edit')
{
    if(isset($_POST["edit"]))
    {
        $id = (int)$_GET["fid"];
        $title = $_POST["title"];
        $desc = $_POST["desc"];
        if(strlen($title) < 5 || strlen($desc) < 10 )
        {
            echo'One or more values are either too small or empty';
        } else {
            $query = mysql_query("UPDATE `pbnl_gallery` SET `desc` = '$desc', `title` = '$title' WHERE `id` = $id");
            if($query)
            {
                header("LOcation: /gallery/?file=$id");
            } else {
                echo'<div class="msg">A technical error occured please contact <small>analikebridge@gmail.com</small></div>';
            }
        }
    }
    $id = (int)$_GET["fid"];
    $row = mysql_fetch_assoc(mysql_query("SELECT `title`, `desc` FROM `pbnl_gallery` WHERE `id` = $id"));
    $title = $row["title"];
    $desc = $row["desc"];
    echo'<form action="#" method="POST" enctype="multipart/form-data">
            <b>Title:</b> <br /> <input type="text" value="'.$title.'" name="title" /> <br /> <br />
            <b>Description: </b> <br /> <textarea name="desc" rows="8" cols="40">'.$desc.'</textarea> <br /><br />
            <input type="submit" name="edit" value="Edit" />
        </form>
        ';
    $backlink = '/gallery/?file='.$id;
} elseif($action == 'editcat') {
    if(isset($_POST["edit"]))
    {
        $id = (int)$_GET["cid"];
        $name = $_POST["name"];
        $iconname = $_FILES["icon"]["name"];
        $allowed = array("jpg", "bmp", "gif", "png", "jpeg");
        $ext = end(explode(".", $iconname));
        $asize = 200;
        $size = $_FILES["icon"]["size"];
        if(!empty($iconname) && !in_array("$ext", $allowed))
        {
            echo'<div class="msg">File type not allowed</div>';
        } elseif(!empty($iconname) && $size > ($asize * 1024)) {
            echo'<div class="msg">File size too large. Max Size shouldn\'t be more than '.get_size($asize * 1024).'</div>';
        } elseif(empty($name) || strlen($name) < 4) {
            echo'<div class="msg">The category name cannot be empty or less than 4</div>';
        } else {
            if(!empty($iconname) && !file_exists('icons'))
            {
                mkdir('icons');
            }
            if(!empty($iconname))
            {
                move_uploaded_file($_FILES["icon"]["tmp_name"], 'icons/'.$iconname.'');
                $string = "UPDATE `pbnl_gallery_cat` SET `name` = '$name', `icon` = '$iconname'";
            } else {
                $string = "UPDATE `pbnl_gallery_cat` SET `name` = '$name'";
            }
            $query = mysql_query($string);
            if($query)
            {
                header("Location: /gallery/?f=$id");
            } else {
                echo'<div class="msg">A technical error encountered, contact analikebridge@gmail.com or http://facebook.com/analikebridge</div>';
            }
        }
    }
    $id = $_GET["cid"];
    $row = mysql_fetch_assoc(mysql_query("SELECT * FROM `pbnl_gallery_cat` WHERE `id` = $id"));
    $name = $row["name"];
    echo'<div class=gap></div> <h3>Modify Gallery Category</h3><br />
        <form action="#" method="post" enctype="multipart/form-data">
            <b>Name:</b><br /> <input type="text" name="name" value="'.$name.'"/> <br />
            <b>Icon:</b><br /> <input type="file" name="icon" /> <br />
            <input type="submit" name="edit" value="Edit" />
        </form>
    ';
    $backlink = '/gallery/index.php';
}
echo'<div class="gap"></div><div class="link_button"><a href="'.$backlink.'">Go Back</a></div>';
include'../footer.php';
?>