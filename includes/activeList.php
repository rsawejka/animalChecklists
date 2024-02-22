<h2>Active Checklists</h2>
<?php 
$activeQuery = "SELECT `name`, `SBID` FROM `RS_checkListsAnimals` WHERE status = 'active'";
$activeResult = mysqli_query($db, $activeQuery) or die('Error loading animal.');
while($row = mysqli_fetch_array($activeResult, MYSQLI_ASSOC)){

    ?>
    
    <a href='animal.php?SBID=<?= $row['SBID']?>'><?= $row['name'] ?></a>
    <br>
    <?php
}

?>