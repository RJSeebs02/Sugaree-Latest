<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Announcement Form</title>
    <!-- Include Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .input-field {
            padding: 10px;
            width: calc(100% - 22px);
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .input-field:focus {
            border-color: #007BFF;
            outline: none;
        }

        .review-box {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .review-box h3 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .review-box label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .review-box div {
            margin-bottom: 15px;
        }

        .review-box input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .review-box input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<form action="../process/process.events.php?action=new" method="post">
    <div class="review-box">
        <br>
        <h3>Add Event</h3>
        <div>
            <label>Event Name:</label>
            <input type="text" class="input-field" name="event_title" autocomplete="off" placeholder="Ex. New Dish Incoming!" required>
        </div>
        <br>
        <div>
            <label>Event Description:</label>
            <input type="text" class="input-field" name="event_description" autocomplete="off" placeholder="Ex. Exciting news about our latest dish!" required>
        </div>
        <br>
        <div>
            <label>Date:</label>
            <input type="text" id="date" class="input-field" name="event_date" placeholder="Select date" required>
        </div>
        <br>
        <div>
            <label>Time:</label>
            <input type="text" id="time" class="input-field" name="event_time" placeholder="Select time" required>
        </div>
        <br>
        <div><input type="submit" name="add_news" value="Post Event"></div>
    </div>
</form>

<!-- Include Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    // Initialize Flatpickr for Date
    flatpickr("#date", {
        dateFormat: "Y-m-d",
        minDate: "today"
    });

    // Initialize Flatpickr for Time
    flatpickr("#time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true
    });
</script>

</body>
</html>
