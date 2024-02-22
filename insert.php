<?php
$current_date = date("Y-m-d");
echo $current_date . "<br>";
include "includes/header.php";


    if(isset($_POST['submit1'])){
        $option5 = $_POST['option5'] ?? '';
        $option6 = $_POST['option6'] ?? '';
        $option7 = $_POST['option7'] ?? '';
        $option8 = $_POST['option8'] ?? '';

        $query1 = "INSERT INTO `RS_checkListsPM` 
        (`date`, `id`, `option5`, `option6`, `option7`, `option8`) 
    VALUES 
        (?, NULL, ?, ?, ?, ?);";

        $stmt1 = mysqli_prepare($db, $query1) or die('Error in querya.');


        mysqli_stmt_bind_param($stmt1, "sssss", $current_date, $option5, $option6, $option7, $option8);


        $result = mysqli_stmt_execute($stmt1) or die('Error executing query.');

      
        if(mysqli_affected_rows($db)) 

         if($newId = mysqli_insert_id($db)){

           echo "done!";
        }else{
            echo "SOMETHING WENT WRONG";
        }

    }
    if(isset($_POST['submit'])){
        $option1 = $_POST['option1'] ?? '';
        $option2 = $_POST['option2'] ?? '';
        $option3 = $_POST['option3'] ?? '';
        $option4 = $_POST['option4'] ?? '';


        $query = "INSERT INTO `RS_checkListsAM` 
                    (`date`, `id`, `option1`, `option2`, `option3`, `option4`) 
                VALUES 
                    (?, NULL, ?, ?, ?, ?);";


         $stmt = mysqli_prepare($db, $query) or die('Error in query 2.');


        mysqli_stmt_bind_param($stmt, "sssss", $current_date, $option1, $option2, $option3, $option4);


        $result = mysqli_stmt_execute($stmt) or die('Error executing query2.');


        if(mysqli_affected_rows($db))

     
         if($newId = mysqli_insert_id($db)){

           echo "done!";
        }else{

            echo "SOMETHING WENT WRONG";
        }
     }

?>
<div class="main">
<div id="left">
<form method="post">
    <!-- <input type="hidden" value="<?= $current_date ?>"> -->
    <p>
        <label for="option1">option1:</label><br>
        <select name="option1" id="option1">
  <option value="value1">1</option>
  <option value="value2">2</option>
  <option value="value3">3</option>
  <option value="value5">4</option>
</select>
     
    </p>
    <p>
        <label for="option2">option2:</label><br>
        <select name="option2" id="option2">
  <option value="value1">1</option>
  <option value="value2">2</option>
  <option value="value3">3</option>
  <option value="value5">4</option>
</select>
     
    </p>
    <p>
        <label for="option3">option3:</label><br>
        <select name="option3" id="option3">
  <option value="value1">1</option>
  <option value="value2">2</option>
  <option value="value3">3</option>
  <option value="value5">4</option>
</select>
     
    </p>
    <p>
        <label for="option4">option4:</label><br>
        <select name="option4" id="option4">
  <option value="value1">1</option>
  <option value="value2">2</option>
  <option value="value3">3</option>
  <option value="value5">4</option>
</select>
     
    </p>
    
    <p>
        <input type="submit" name="submit" value="Add Entry">
    </p>
</form>
    </div>

    <div id="right">
<form method="post">
<!-- <input type="hidden" value="<?= $current_date ?>"> -->
    <p>
        <label for="option5">option5:</label><br>
        <select name="option5" id="option5">
  <option value="value1">1</option>
  <option value="value2">2</option>
  <option value="value3">3</option>
  <option value="value5">4</option>
</select>
     
    </p>
    <p>
        <label for="option6">option6:</label><br>
        <select name="option6" id="option6">
  <option value="value1">1</option>
  <option value="value2">2</option>
  <option value="value3">3</option>
  <option value="value5">4</option>
</select>
     
    </p>
    <p>
        <label for="option7">option7:</label><br>
        <select name="option7" id="option7">
  <option value="value1">1</option>
  <option value="value2">2</option>
  <option value="value3">3</option>
  <option value="value5">4</option>
</select>
     
    </p>
    <p>
        <label for="option8">option8:</label><br>
        <select name="option8" id="option8">
  <option value="value1">1</option>
  <option value="value2">2</option>
  <option value="value3">3</option>
  <option value="value5">4</option>
</select>
     
    </p>
    
    <p>
        <input type="submit" name="submit1" value="Add Entry">
    </p>
</form>
    </div>
    </div>


<?php
include "includes/footer.php"
?>