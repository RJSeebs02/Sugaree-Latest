<h1>Events</h1>
<div id="container">
    <h2>Manage Events</h2>
    <div class="sub-nav">
        <button><a href="profile.php?subpage=events&content=view">View</a></button>
        <button><a href="profile.php?subpage=events&content=add">Add</a></button>
    </div>
    <?php
    switch($content){
        case 'view':
            require_once 'calendar.php';
        break;
        case 'add':
            require_once 'add_event.php';
        break;
        default:
            require_once 'calendar.php';
        break;
    }
    ?>
    </div>
</div>