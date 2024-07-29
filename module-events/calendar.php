<div id="calendar">
    <?php
date_default_timezone_set('Asia/Manila');

function build_calendar($month, $year) {
    $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
    $numberDays = date('t', $firstDayOfMonth);
    $dateComponents = getdate($firstDayOfMonth);
    $monthName = $dateComponents['month'];
    $dayOfWeek = $dateComponents['wday'];
    $currentDay = date('j');
    $currentMonth = date('n');
    $currentYear = date('Y');

    $calendar = "<table class='calendar'>";
    $calendar .= "<caption>$monthName $year</caption>";
    $calendar .= "<tr>";

    foreach ($daysOfWeek as $day) {
        $calendar .= "<th class='header'>$day</th>";
    }

    $calendar .= "</tr><tr>";

    if ($dayOfWeek > 0) {
        $calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>";
    }

    $dayCounter = 1;

    while ($dayCounter <= $numberDays) {
        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }

        $currentDayRel = str_pad($dayCounter, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        if ($dayCounter == $currentDay && $month == $currentMonth && $year == $currentYear) {
            $calendar .= "<td class='day current-day' rel='$date'>$dayCounter</td>";
        } else {
            $calendar .= "<td class='day' rel='$date'>$dayCounter</td>";
        }

        $dayCounter++;
        $dayOfWeek++;
    }

    if ($dayOfWeek != 7) {
        $remainingDays = 7 - $dayOfWeek;
        $calendar .= "<td colspan='$remainingDays'>&nbsp;</td>";
    }

    $calendar .= "</tr>";
    $calendar .= "</table>";

    return $calendar;
}

$month = isset($_GET['month']) ? $_GET['month'] : date('m');
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');

$prevMonth = $month - 1;
$nextMonth = $month + 1;
$prevYear = $year;
$nextYear = $year;

if ($prevMonth == 0) {
    $prevMonth = 12;
    $prevYear--;
}

if ($nextMonth == 13) {
    $nextMonth = 1;
    $nextYear++;
}

echo "<div class='nav-buttons'>";
echo "<button onclick=\"navigate($prevMonth, $prevYear)\">Previous Month</button>";
echo "<button onclick=\"navigate($nextMonth, $nextYear)\">Next Month</button>";
echo "</div>";
echo build_calendar($month, $year);
?>
</div>
