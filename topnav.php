<?php
// Enable error reporting for debugging purposes (change this in production)
error_reporting(E_ALL);

/*
Project: Aljbook 1.0
*/

// Include your database connection file here
include 'db_connection.php'; // Replace with the actual file name

?>

<div class="alj1">
<?php
if (isloggedin()) {
    $username = user_info($user, 'username');
    $uid = user_info($user, 'userID');
    $level = user_info($user, 'level');
    $status = cleanvalues2(user_info2($uid, 'status'));
    $position = user_info($user, 'position');
    $school = user_info($user, 'school');
    $ip = $_SERVER['REMOTE_ADDR'];
    
    // Create a MySQLi connection
    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);

    // Check for connection errors
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Update the user's IP address in the database
    $updateIpQuery = "UPDATE b_users SET ip = ? WHERE username = ?";
    $stmt = $mysqli->prepare($updateIpQuery);
    $stmt->bind_param("ss", $ip, $username);
    $stmt->execute();
    $stmt->close();

    // Count unread messages
    $pmQuery = "SELECT COUNT(*) AS unread_count FROM b_pms WHERE reciever = ? AND hasread = 0";
    $stmt = $mysqli->prepare($pmQuery);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $unreadCount = $result->fetch_assoc()['unread_count'];
    $stmt->close();

    echo "<div class='a5' style='padding: 13px;'>
    <a href='../mail/inbox.php'>الرسائل الخاصة (<font color='#ff0000'><b>$unreadCount</b></font>)</a>
    <br>
    <span class='d_board_right'><a href='../index.php'>البداية</a> | <a href='../member/settings.php'>اعدادات الحساب</a> | <a href='../music/upload.php'>تحميل الموسيقى</a> | <a href='../logout.php'>تسجيل خروج</a>";

    if ($level == 2) {
        echo "<br>&nbsp; [<a href=\"../admincp/index.php\" style=\"color:red\"><b>دخول الادمن</b></a>]";
    }
    
    if ($level == 1) {
        echo "&nbsp;| <a href=\"../modcp/index.php\" style=\"color:white\"><b>برج المراقبة</b></a>";
    }
    
    echo "</div></span>";
    
    // Fetch shoutbox option from settings and call the shoutbox function
    $query = "SELECT shout FROM b_settings";
    $result = $mysqli->query($query);
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $option = $row["shout"];
        
        if ($option == "0") {
            shoutbox();
        }
    }

    // Close the MySQLi connection
    $mysqli->close();
} else {
    echo "مرحبًا بك يا <b>زائر</b>. ارجو منك <a href='../register.php'><b>التسجيل</b></a> او <a href='../index.php'><b>الدخول</b></a> لتستمتع بخدماتنا";
}
?>
حدث هذا الملف ليدعم mysqli
</div>
