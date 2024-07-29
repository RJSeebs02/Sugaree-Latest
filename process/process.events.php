<?php
include '../class/class.events.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
    case 'new':
        create_event();
        break;
    case 'update':
        update_event();
        break;
    case 'delete':
        delete_event();
        break;
}

function create_event(){
    $event = new Event();
    
    if(isset($_POST['event_title'], $_POST['event_description'], $_POST['event_date'], $_POST['event_time'])){
        $event_title = $_POST['event_title'];
        $event_description = $_POST['event_description'];
        $event_date = $_POST['event_date'];
        $event_time = $_POST['event_time'];

        $result = $event->new_event($event_title, $event_description, $event_date, $event_time);

        if ($result) {
            header("Location: ../module-profile/profile.php?subpage=events");
            exit();
        } else {
            echo "Failed to update announcement!";
        }
    } else {
        echo "Error: Missing form data.";
    }
}

function update_news() {
    $news = new News();
    
    $news_id = $_POST['nes_id'];
    $news_title = $_POST['news_title'];
    $news_description = $_POST['news_description'];
    
    $result = $news->update_news($news_id, $news_title, $news_description);
    
    if ($result) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Failed to update announcement!";
    }
}

?>
