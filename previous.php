<?php
//show previous date data 
//show error page if previous date does not exist
$SBID = $_GET['SBID'] ?? '1';
$date = $_GET['date'] ?? '1';
$current_date = date("Y-m-d");



include "includes/header.php";
$previousDate = date_create($date)->modify('-1 days')->format('Y-m-d');
$nextDate = date_create($date)->modify('+1 days')->format('Y-m-d');
if(isset($_POST['previous'])){
    header("Location: previous.php?SBID=" . $SBID . "&date=" . $previousDate);

}
if(isset($_POST['next'])){
    if($nextDate === $current_date){
        header("Location: animal.php?SBID=" . $SBID);
    }else{
        header("Location: previous.php?SBID=" . $SBID . "&date=" . $nextDate);
    }

}
echo "<h2>" . $SBID . "</h2>";
echo "<h2>" . $date . "<h2>";

$queryAM = "SELECT `date`, `dry`, `wet`, `stools`, `urine`, `vomiting`, `behavior`, `SBID`, `comments`, `initials` FROM `RS_checkListsAM` WHERE date = '$date' AND SBID = $SBID";

// execute query
$resultAM = mysqli_query($db, $queryAM) or die('Error loading animal.');

// get one record from the database
$checkListAM = mysqli_fetch_array($resultAM, MYSQLI_ASSOC);
echo "<h2>AM</h2>";
echo "<div><span class='RSBold'>Appetite Dry:</span> " . $checkListAM['dry'] . "</div>";
echo "<div><span class='RSBold'>Appetite Wet:</span> " . $checkListAM['wet'] . "</div>";
echo "<div><span class='RSBold'>Stools:</span> " . $checkListAM['stools'] . "</div>";
echo "<div><span class='RSBold'>Urine:</span> " . $checkListAM['urine'] . "</div>";
echo "<div><span class='RSBold'>Vomiting:</span> " . $checkListAM['vomiting'] . "</div>";
echo "<div><span class='RSBold'>Behavior:</span> " . $checkListAM['behavior'] . "</div>";
echo "<div><span class='RSBold'>Comments:</span> " . $checkListAM['comments'] . "</div>";
echo "<div><span class='RSBold'>Initials:</span> " . $checkListAM['initials'] . "</div>";


$queryPM = "SELECT `date`, `dry`, `wet`, `stools`, `urine`, `vomiting`, `behavior`, `SBID`, `comments`, `initials` FROM `RS_checkListsPM` WHERE date = '$date' AND SBID = $SBID";

// execute query
$resultPM = mysqli_query($db, $queryPM) or die('Error loading animal.');

// get one record from the database
$checkListPM = mysqli_fetch_array($resultPM, MYSQLI_ASSOC);
echo "<h2>PM</h2>";
echo "<div><span class='RSBold'>Appetite Dry:</span> " . $checkListPM['dry'] . "</div>";
echo "<div><span class='RSBold'>Appetite Wet:</span> " . $checkListPM['wet'] . "</div>";
echo "<div><span class='RSBold'>Stools:</span> " . $checkListPM['stools'] . "</div>";
echo "<div><span class='RSBold'>Urine:</span> " . $checkListPM['urine'] . "</div>";
echo "<div><span class='RSBold'>Vomiting:</span> " . $checkListPM['vomiting'] . "</div>";
echo "<div><span class='RSBold'>Behavior:</span> " . $checkListPM['behavior'] . "</div>";
echo "<div><span class='RSBold'>Comments:</span> " . $checkListPM['comments'] . "</div>";
echo "<div><span class='RSBold'>Initials:</span> " . $checkListPM['initials'] . "</div>";


//echo $previousDate;
include "includes/footer.php";
?>
<form method="post"><input type="submit" id="previous" name="previous" value="previous"><input type="submit" id="next" name="next" value="next"></form>