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
?>
<div class="showOnDesktop col-12 pb-3 container">
<form method="post" class='row justify-content-center'>
    <a class="btn btn-success col-5 m-1" href='genQR.php?SBID=<?= $SBID?>'>QR Code</a>
    <input class="btn btn-success col-5 m-1" type="submit" value="Back Home" id="backHome" name="backHome">
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
