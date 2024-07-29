<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
  
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
   
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
   
    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
    
    <link rel="stylesheet" href="css/style3.css">
    
</head>

<body>

    <section style="background-image: url(assets/images/menu-bg.png);" class="our-menu section bg-light repeat-img" id="menu">
        <div class="sec-wp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sec-title text-center mb-5">
                            <h2 class="h2-title">Add Announcement</span></h2>
                        </div>
                    </div>
                </div>
                
        <form action="../process/process.news.php?action=new" method="post">
        <div class="review-box">
            <br>
                <h3>Fill in the details</h3>
            <div>
                <label>News Title: </label>  
                <input type="text" class="input-field" name="news_title" autocomplete="off" placeholder="Ex. New Dish Incoming!" required>
            </div>
            <br>
            <div>
                <label>News Description: </label>  
                <input type="text" class="input-field" name="news_description" autocomplete="off" placeholder="Ex. New Dish Incoming!" required>
            </div>
            <br>
            
            <div><input type="submit" name="add_news" value="Post Announcement"></div>
        </form>
        </div>
   
            </div>
        </div>
    </section>
</body>
</html>