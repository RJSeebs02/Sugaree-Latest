<?php
include_once '../config/config.php';
include_once '../class/class.user.php';

/* Define Object */
$user = new User();

/* Checks if the user is logged in */
if(!$user->get_session()){
    header("location: ../login/login_register.php");
    exit();
}

/*Parameter variables for the navbar*/
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$content = (isset($_GET['content']) && $_GET['content'] != '') ? $_GET['content'] : '';

/* Get user logged in details */
$user_identifier = $_SESSION['user_identifier'];
$user_id = $user->get_user_id($user_identifier);
$user_name = $user->get_user_name($user_id);
$user_email = $user->get_user_email($user_id);
$user_firstname = $user->get_user_fname($user_id);
$user_lastname = $user->get_user_lname($user_id);
$user_review = $user->get_user_review($user_id);
$user_rating = $user->get_user_rating($user_id);
$user_status = $user->get_user_status($user_id);
$user_role = $user->get_user_role($user_id);

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmtNews = $pdo->query("SELECT * FROM tbl_news");
    $news = $stmtNews->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="../css/styleprofile.css">
    <style>
    .calendar {
        border-collapse: collapse;
        width: 100%;
    }
    .calendar caption {
        text-align: center;
        padding: 10px;
        font-size: 24px;
    }
    .calendar th {
        background-color: #f2f2f2;
        padding: 10px;
    }
    .calendar td {
        padding: 10px;
        text-align: center;
        border: 1px solid #ddd;
    }
    .calendar .header {
        background-color: #f4f4f4;
    }
    .nav-buttons {
        text-align: center;
        margin-bottom: 20px;
    }
    .nav-buttons button {
        padding: 10px;
        font-size: 16px;
        margin: 5px;
    }
    .calendar .current-day {
        background-color: #FFFAD0;
        color: #000;
        font-weight: bold;
    }
</style>

    <script>
        function navigate(month, year) {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `../module-events/calendar.php?month=${month}&year=${year}`, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('calendar').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>
</head>
<body>
<nav>
    <img src="../img/logo.png">
    <label class="logo">Sugaree</label>
        <div class="center">
            <div class="prof_nav">
                <ul>
                    <div class="nav-options">
                        <li><button><a href="profile.php?subpage=profile">Profile</a></button></li>
                        <li><button><a href="profile.php?subpage=review">Review</a></button></li>
                        <li><button><a href="profile.php?subpage=announcements">Announcements</a></button></li>
                        <li><button><a href="profile.php?subpage=events">Events</a></button></li>
                    </div>
                </ul>
            </div>
        </div>
        <div class="main_nav">
            <ul>
                <li><span class="home"><button><a href="../index.php">Home</a></button></span></li>
                <li><span class="logout"><button><a href="../login/logout.php">Logout</a></button></span></li>
            </ul>
        </div>
</nav>
    
<?php
switch($subpage){
    case 'profile':
        require_once 'profile-about.php';
    break;
    case 'review':
        require_once '../module-review/review.php';
    break;
    case 'announcements':
        require_once '../module-announcements/announcements.php';
    break;
    case 'events':
        require_once '../module-events/events.php';
    break;
    default:
        require_once 'profile-about.php';
    break;
}
?>

<h4>Copyright @ 2024 By Ibento Creatives</h4>

</body>
</html>