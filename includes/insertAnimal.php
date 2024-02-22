<?php
//check and see if animal already exists or not

    if(isset($_POST['submit'])){
        $SBID = $_POST['SBID'] ?? '';
        $name = $_POST['name'] ?? '';
        $status = "active";


        $exAnimal_query = "SELECT * FROM `RS_checkListsAnimals` WHERE `SBID` = $SBID";
$exAnimal_result = mysqli_query($db, $exAnimal_query) or die('Error loading list.');
$rowcountAnimal = mysqli_num_rows($exAnimal_result);
$exAnimal_results = mysqli_fetch_array($exAnimal_result, MYSQLI_ASSOC);
if($rowcountAnimal === 1){
    echo "already exists";
}else{




        $query = "INSERT INTO `RS_checkListsAnimals` 
                    (`id`, `SBID`, `name`, `status`) 
                VALUES 
                    (NULL, ?, ?, ?)";


         $stmt = mysqli_prepare($db, $query) or die('Error in query.');


        mysqli_stmt_bind_param($stmt, "sss", $SBID, $name, $status);


        $result = mysqli_stmt_execute($stmt) or die('Error executing query.');


        if(mysqli_affected_rows($db))

     
         if($newId = mysqli_insert_id($db)){
            echo"done";
            ob_clean();
            header("Location: genQR.php?SBID=" . $SBID);
           
        }else{

            echo "SOMETHING WENT WRONG";
        }
     }
    }
?>
<h3>Add New Animal</h3>

<form method="post">
<div class="form-group">
    <label for="name">Animal Name:</label>
    <input type="text" class="form-control" id="name" name="name" >
  </div>
    <!-- <p>
        <label for="name">name:</label><br>
        <input type="text" name="name" id="name">
     
    </p> -->
    <!-- <p>
    <label for="SBID">SBID:</label><br>
        <input type="text" name="SBID" id="SBID">
     
    </p> -->
    <div class="form-group">
    <label for="SBID">SBID:</label>
    <input type="text" class="form-control" id="SBID" name="SBID" >
  </div>
    
    
    <p>
        <input type="submit" name="submit" value="Add Entry" class="btn btn-primary my-2">
    </p>
</form>