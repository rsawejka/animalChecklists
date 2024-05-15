<h2>Active Checklists</h2>
<?php 

$query = "SELECT `name`, `id`, `status` FROM RS_checkListsAnimals WHERE SBID = '$SBID'";

// execute query
$result = mysqli_query($db, $query) or die('Error loading animal.');

// get one record from the database
$animal = mysqli_fetch_array($result, MYSQLI_ASSOC);
$rowcountAnimal1 = mysqli_num_rows($result);
//echo "number of results. " . $rowcountAnimal1;
$status = $animal['status'];
$SBID = $_POST['deactivateX'];
$deactive = "deactive";
//echo $status;

if(isset($_POST['deactivateX'])){
//echo $SBID;

    
    $statusQuery = "UPDATE `RS_checkListsAnimals` SET `status` = ? WHERE `RS_checkListsAnimals`.`SBID` = $SBID";
    //print_r($statusQuery);
    $stmt = mysqli_prepare($db, $statusQuery) or die('Error in queryaaa.');
  

    mysqli_stmt_bind_param($stmt, "s",  $deactive);


    $result = mysqli_stmt_execute($stmt) or die('Error executing query.');

  
    if(mysqli_affected_rows($db)){
       echo "done";
       header("Location: index.php");
        
    }else{
        // let the user know
        echo "SOMETHING WENT WRONGgg";
    }

}





$activeQuery = "SELECT `name`, `SBID` FROM `RS_checkListsAnimals` WHERE status = 'active'";
$activeResult = mysqli_query($db, $activeQuery) or die('Error loading animal.');
while($row = mysqli_fetch_array($activeResult, MYSQLI_ASSOC)){
    if($row['name'] == ""){
        $name = $row['SBID'];
    }else{
        $name = $row['name'];

    }
    ?>
    <div class="active-list-deactivate d-flex">
    <form method="post">
        <input type="hidden" id="deactivateX" name="deactivateX" value="<?= $row['SBID']?>">
        <button type="submit" id="deactivateXButton" name="deactivateXButton">
        <i class='fa-solid fa-x'></i>
        </button>
       
    </form>
    <div>
        <a href='animal.php?SBID=<?= $row['SBID']?>'><?=$name?></a>
        </div>
        </div>
    <br>
    <?php
}

?>
