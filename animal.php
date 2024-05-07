<?php 

ob_start();  
$SBID = $_GET['SBID'] ?? '1';
//$current_date = "2023-04-13";
$current_date = date("Y-m-d");
// $previousDate = date('Y/m/d',strtotime("-44 days"));
// echo $previousDate;

if(isset($_POST['backHome'])){
    header("Location: index.php");
}
include "includes/header.php";



$checkqueryAM = "SELECT `date`, `dry`, `wet`, `stools`, `urine`, `vomiting`, `behavior`, `SBID`, `comments`, `initials` FROM `RS_checkListsAM` WHERE SBID = '$SBID'  ORDER BY `id` DESC LIMIT 3 ";

// execute query
$checkqueryresultAM = mysqli_query($db, $checkqueryAM) or die('Error loading animal. aaa');

// get one record from the database
//$checkListAM = mysqli_fetch_array($checkqueryresultAM, MYSQLI_ASSOC);
$poopCheckArrayAM = array();
$peeCheckArrayAM = array();
$dryCheckArrayAM = array();
$wetCheckArrayAM = array();
$vomitCheckArrayAM = array();



while($row = mysqli_fetch_array($checkqueryresultAM, MYSQLI_ASSOC)){
    array_push($poopCheckArrayAM, array($row['stools'], $row['date']));
    array_push($peeCheckArrayAM, array($row2['urine'], $row['date']));
    array_push($dryCheckArrayAM, array($row['dry'], $row['date']));
    array_push($wetCheckArrayAM, array($row['wet'], $row['date']));
    array_push($vomitCheckArrayAM, array($row['vomiting'], $row['date']));
   

}
$poopCheckArrayPM = array();
$peeCheckArrayPM = array();
$dryCheckArrayPM = array();
$wetCheckArrayPM = array();
$vomitCheckArrayPM = array();
$checkqueryPM = "SELECT `date`, `dry`, `wet`, `stools`, `urine`, `vomiting`, `behavior`, `SBID`, `comments`, `initials` FROM `RS_checkListsAM` WHERE SBID = '$SBID'  ORDER BY `id` DESC LIMIT 3 ";

// execute query
$checkqueryresultPM = mysqli_query($db, $checkqueryPM) or die('Error loading animal. pm');

while($row2 = mysqli_fetch_array($checkqueryresultPM, MYSQLI_ASSOC)){
    array_push($poopCheckArrayPM, array($row2['stools'], $row2['date']));
    array_push($peeCheckArrayPM, array($row2['urine'], $row2['date']));
    array_push($dryCheckArrayPM, array($row2['dry'], $row2['date']));
    array_push($wetCheckArrayPM, array($row2['wet'], $row2['date']));
    array_push($vomitCheckArrayPM, array($row2['vomiting'], $row2['date']));
}
?>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-direction-row">
        <div>
            <h5>AM</h5>
        <?php
        echo "<h6>Stool last 3 days: </h6>";
        echo "<div>" . $poopCheckArrayAM[0][0] . " | " . $poopCheckArrayAM[0][1] .  "</div>";
        echo "<div>" . $poopCheckArrayAM[1][0] . " | " . $poopCheckArrayAM[0][1] .  "</div>";
        echo "<div>" . $poopCheckArrayAM[2][0] . " | " . $poopCheckArrayAM[0][1] .  "</div>";
        echo "<h6>Urine last 3 days: </h6>";
        echo "<div>" . $peeCheckArrayAM[0][0] . " | " . $poopCheckArrayAM[0][1] .  "</div>";
        echo "<div>" . $peeCheckArrayAM[1][0] . " | " . $poopCheckArrayAM[0][1] .  "</div>";
        echo "<div>" . $peeCheckArrayAM[2][0] . " | " . $poopCheckArrayAM[0][1] .  "</div>";
        echo "<h6>Dry food habits the last 3 days: </h6>";
        echo "<div>" . $dryCheckArrayAM[0][0] . " | " . $poopCheckArrayAM[0][1] .  "</div>";
        echo "<div>" . $dryCheckArrayAM[1][0] . " | " . $poopCheckArrayAM[0][1] .  "</div>";
        echo "<div>" . $dryCheckArrayAM[2][0] . " | " . $poopCheckArrayAM[0][1] .  "</div>";
        echo "<h6>Wet food habits the last 3 days: </h6>";
        echo "<div>" . $wetCheckArrayAM[0][0] . " | " . $poopCheckArrayAM[0][1] .  "</div>";
        echo "<div>" . $wetCheckArrayAM[1][0] . " | " . $poopCheckArrayAM[0][1] .  "</div>";
        echo "<div>" . $wetCheckArrayAM[2][0] . " | " . $poopCheckArrayAM[0][1] .  "</div>";
        echo "<h6>Vomit in the last 3 days: </h6>";
        echo "<div>" . $vomitCheckArrayAM[0][0] . " | " . $poopCheckArrayAM[0][1] .  "</div>";
        echo "<div>" . $vomitCheckArrayAM[1][0] . " | " . $poopCheckArrayAM[0][1] .  "</div>";
        echo "<div>" . $vomitCheckArrayAM[2][0] . " | " . $poopCheckArrayAM[0][1] .  "</div>";
        ?>
        </div>
        <div>
            <h5>PM<h5>
                <?php
                         echo "<h6>Stool last 3 days: </h6>";
                         echo "<div>" . $poopCheckArrayPM[0][0] . " | " . $poopCheckArrayPM[0][1] .  "</div>";
                         echo "<div>" . $poopCheckArrayPM[1][0] . " | " . $poopCheckArrayPM[0][1] .  "</div>";
                         echo "<div>" . $poopCheckArrayPM[2][0] . " | " . $poopCheckArrayPM[0][1] .  "</div>";
                         echo "<h6>Urine last 3 days: </h6>";
                         echo "<div>" . $peeCheckArrayPM[0][0] . " | " . $poopCheckArrayPM[0][1] .  "</div>";
                         echo "<div>" . $peeCheckArrayPM[1][0] . " | " . $poopCheckArrayPM[0][1] .  "</div>";
                         echo "<div>" . $peeCheckArrayPM[2][0] . " | " . $poopCheckArrayPM[0][1] .  "</div>";
                         echo "<h6>Dry food habits the last 3 days: </h6>";
                         echo "<div>" . $dryCheckArrayPM[0][0] . " | " . $poopCheckArrayPM[0][1] .  "</div>";
                         echo "<div>" . $dryCheckArrayPM[1][0] . " | " . $poopCheckArrayPM[0][1] .  "</div>";
                         echo "<div>" . $dryCheckArrayPM[2][0] . " | " . $poopCheckArrayPM[0][1] .  "</div>";
                         echo "<h6>Wet food habits the last 3 days: </h6>";
                         echo "<div>" . $wetCheckArrayPM[0][0] . " | " . $poopCheckArrayPM[0][1] .  "</div>";
                         echo "<div>" . $wetCheckArrayPM[1][0] . " | " . $poopCheckArrayPM[0][1] .  "</div>";
                         echo "<div>" . $wetCheckArrayPM[2][0] . " | " . $poopCheckArrayPM[0][1] .  "</div>";
                         echo "<h6>Vomit in the last 3 days: </h6>";
                         echo "<div>" . $vomitCheckArrayPM[0][0] . " | " . $poopCheckArrayPM[0][1] .  "</div>";
                         echo "<div>" . $vomitCheckArrayPM[1][0] . " | " . $poopCheckArrayPM[0][1] .  "</div>";
                         echo "<div>" . $vomitCheckArrayPM[2][0] . " | " . $poopCheckArrayPM[0][1] .  "</div>";
                ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
// print_r($poopCheckArray);
// print_r($peeCheckArrayAM);
// print_r($dryCheckArrayAM);
// print_r($wetCheckArrayAM);
// print_r($vomitCheckArrayAM);

?>

<div class="showOnDesktop col-12 pb-3 container">
<form method="post" class='d-flex flex-row justify-content-space-around'>
   <div class="col-4"> <input type="button" class="btn btn-success col-11" data-bs-toggle="modal" data-bs-target="#exampleModal" value="last 3 days"></div>
   <div class="col-4"><a class="btn btn-success col-11" href='genQR.php?SBID=<?= $SBID?>'>QR Code</a></div>
   <div class="col-4"> <input class="btn btn-success col-11" type="submit" value="Back Home" id="backHome" name="backHome"></div>
</form>
    </div>
<?php

$query = "SELECT `name`, `id`, `status` FROM RS_checkListsAnimals WHERE SBID = '$SBID'";

// execute query
$result = mysqli_query($db, $query) or die('Error loading animal.');

// get one record from the database
$animal = mysqli_fetch_array($result, MYSQLI_ASSOC);
$rowcountAnimal1 = mysqli_num_rows($result);
//echo "number of results. " . $rowcountAnimal1;
if($rowcountAnimal1 === 1){
$status = $animal['status'];
//echo $status;

if(isset($_POST['checkBoxSubmit'])){
    if($status == $_POST["activateDeactivate"]){
        echo "already that status";
    }else{

    
    $statusQuery = "UPDATE `RS_checkListsAnimals` SET `status` = ? WHERE `RS_checkListsAnimals`.`SBID` = $SBID";
    $stmt = mysqli_prepare($db, $statusQuery) or die('Error in queryaaa.');


    mysqli_stmt_bind_param($stmt, "s",  $_POST["activateDeactivate"]);


    $result = mysqli_stmt_execute($stmt) or die('Error executing query.');

  
    if(mysqli_affected_rows($db)){
       echo "done";
       header("Location: animal.php?SBID=" . $SBID);
        
    }else{
        // let the user know
        echo "SOMETHING WENT WRONGgg";
    }
}
}


?>
<div class="showOnDesktop">
<form method="post">
<div class="ps-4 pe-4 pb-2 text-center">
<input type="radio" id="activate" name="activateDeactivate" value="active" <?php if($animal['status']=="active") echo 'checked'; ?>>
<label for="activate">Active</label>

<input type="radio" id="deactivate" name="activateDeactivate" value="deactive" <?php if($animal['status']=="deactive") echo 'checked'; ?>>
<label for="deactivate">Deactive</label>
</div>
<div class="ps-4 pe-4">
<input class="btn btn-success col-12" type="submit" name="checkBoxSubmit" value="Submit | Activate/Deactivate Checklist">
</div>
</form>
</div>

<?php
//echo $_POST['activateDeactivate'];

?>
<div class="container">
<div class="row">
<h1><?= $SBID ?></h1>
<h2><?=  $animal['name'] ?></h2>
</div>

</div>




<?php
include "includes/showCheckList.php";
}else{
    echo "does not exits";
}
include "includes/footer.php";
?>
