<h1>Events</h1>
<div id="container">
    <h2>Manage Announcements</h2>
    <div class="sub-nav">
        <button><a href="profile.php?subpage=announcements&content=view">View</a></button>
        <button><a href="profile.php?subpage=announcements&content=add">Add</a></button>
    </div>
    <?php
    switch($content){
        case 'view':
            require_once 'view_announcements.php';
        break;
        case 'add':
            require_once 'add_announcements.php';
        break;
        default:
            require_once 'view_announcements.php';
        break;
    }
    ?>
    </div>
</div>