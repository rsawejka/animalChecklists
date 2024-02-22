<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<?php
$exPM_query = "SELECT * FROM `RS_checkListsPM` WHERE `date` = '$current_date' AND `SBID` = $SBID";
$exPM_result = mysqli_query($db, $exPM_query) or die('Error loading list 1.');
$rowcountPM = mysqli_num_rows($exPM_result);
$exPM_results = mysqli_fetch_array($exPM_result, MYSQLI_ASSOC);
$idPM = $exPM_results['id'];



        $displayDryAM = "";
        $displayWetAM = "";
        $displayStoolsAM = "";
        $displayUrineAM = "";
        $displayVomitingAM = "";
        $displayBehaviorAM = "";
        $displayUrineCommentsAM = "";
        $displayStoolsCommentsAM = "";
        $displayInitialsAM = "";
        $displayCommentsAM = "";

        $displayDryPM = "";
        $displayWetPM = "";
        $displayStoolsPM = "";
        $displayUrinePM = "";
        $displayVomitingPM = "";
        $displayBehaviorPM = "";
        $displayUrineCommentsPM = "";
        $displayStoolsCommentsPM = "";
        $displayInitialsPM = "";
        $displayCommentsPM = "";



if(isset($_POST['submitPM'])){
    $dryPM = $_POST['dryPM'] ?? '';
    $wetPM = $_POST['wetPM'] ?? '';
    $stoolsPM = $_POST['stoolsPM'] ?? '';
    $urinePM = $_POST['urinePM'] ?? '';
    $vomitingPM = $_POST['vomitingPM'] ?? '';
    $behaviorPM = $_POST['behaviorPM'] ?? '';
    $urineCommentsPM = $_POST['urineCommentsPM'] ?? '';
    $stoolsCommentsPM = $_POST['stoolsCommentsPM'] ?? '';
    $initialsPM = $_POST['initialsPM'] ?? '';
    $commentsPM = $_POST['commentsPM'] ?? '';
    if($rowcountPM === 0){

   
    $query1 = "INSERT INTO `RS_checkListsPM` 
    (`date`, `id`, `dry`, `wet`, `stools`, `urine`, `vomiting`, `behavior`, `SBID`, `urineComments`, `stoolsComments`, `initials`, `comments`) 
VALUES 
    (?, NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    $stmt1 = mysqli_prepare($db, $query1) or die('Error in querya.');


    mysqli_stmt_bind_param($stmt1, "ssssssssssss", $current_date, $dryPM, $wetPM, $stoolsPM, $urinePM, $vomitingPM, $behaviorPM, $SBID, $stoolsCommentsPM, $urineCommentsPM, $initialsPM, $commentsPM);


    $result = mysqli_stmt_execute($stmt1) or die('Error executing query.');

  
    if(mysqli_affected_rows($db)) 

     if($newId = mysqli_insert_id($db)){

       echo "done!";
    }else{
        echo "SOMETHING WENT WRONGg";
    }
}
if($rowcountPM === 1){

   //update
    $query2 = "UPDATE `RS_checkListsPM` SET `dry` = ?, `wet` = ?, `stools` = ?, `urine` = ?, `vomiting` = ?, `behavior` = ?, `urineComments` = ?, `stoolsComments` = ?, `initials` = ?, `comments` = ?  WHERE `RS_checkListsPM`.`id` = $idPM;";
    $stmt2 = mysqli_prepare($db, $query2) or die('Error in queryaaa.');


    mysqli_stmt_bind_param($stmt2, "ssssssssss",  $dryPM, $wetPM, $stoolsPM, $urinePM, $vomitingPM, $behaviorPM, $stoolsCommentsPM, $urineCommentsPM, $initialsPM, $commentsPM);


    $result = mysqli_stmt_execute($stmt2) or die('Error executing query.');

  
    if(mysqli_affected_rows($db)){
       echo "done";
       header("Location: animal.php?SBID=" . $SBID);

        
    }else{
        // let the user know
        echo "SOMETHING WENT WRONGgg2";
    }
}
}


$exAM_query = "SELECT * FROM `RS_checkListsAM` WHERE `date` = '$current_date' AND `SBID` = $SBID";
$exAM_result = mysqli_query($db, $exAM_query) or die('Error loading list 2.');
$rowcountAM = mysqli_num_rows($exAM_result);
$exAM_results = mysqli_fetch_array($exAM_result, MYSQLI_ASSOC);
$idAM = $exAM_results['id'];

if(isset($_POST['submitAM'])){
    $dryAM = $_POST['dryAM'] ?? '';
    $wetAM = $_POST['wetAM'] ?? '';
    $stoolsAM = $_POST['stoolsAM'] ?? '';
    $urineAM = $_POST['urineAM'] ?? '';
    $vomitingAM = $_POST['vomitingAM'] ?? '';
    $behaviorAM = $_POST['behaviorAM'] ?? '';
    $urineCommentsAM = $_POST['urineCommentsAM'] ?? '';
    $stoolsCommentsAM = $_POST['stoolsCommentsAM'] ?? '';
    $initialsAM = $_POST['initialsAM'] ?? '';
    $commentsAM = $_POST['commentsAM'] ?? '';

    if($rowcountAM === 0){

    //echo "not ex";
        $query = "INSERT INTO `RS_checkListsAM` 
        (`date`, `id`, `dry`, `wet`, `stools`, `urine`, `vomiting`, `behavior`, `SBID`, `urineComments`, `stoolsComments`, `initials`, `comments`) 
    VALUES 
        (?, NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";


$stmt = mysqli_prepare($db, $query) or die('Error in query 2.');


mysqli_stmt_bind_param($stmt, "ssssssssssss", $current_date, $dryAM, $wetAM, $stoolsAM, $urineAM, $vomitingAM, $behaviorAM, $SBID, $stoolsCommentsAM, $urineCommentsAM, $initialsAM, $commentsAM);


$result = mysqli_stmt_execute($stmt) or die('Error executing query2.');


if(mysqli_affected_rows($db))


if($newId = mysqli_insert_id($db)){

echo "done!";
}else{

echo "SOMETHING WENT WRONGs";
}

}
    if($rowcountAM === 1){

   // echo "ex";
      //update
      $query2 = "UPDATE `RS_checkListsAM` SET `dry` = ?, `wet` = ?, `stools` = ?, `urine` = ?, `vomiting` = ?, `behavior` = ?, `stoolsComments` = ?, `urineComments` = ?, `initials` = ?, `comments` = ?  WHERE `RS_checkListsAM`.`id` = $idAM;";
      $stmt2 = mysqli_prepare($db, $query2) or die('Error in queryaaa.');
  
  
      mysqli_stmt_bind_param($stmt2, "ssssssssss",  $dryAM, $wetAM, $stoolsAM, $urineAM, $vomitingAM, $behaviorAM, $stoolsCommentsAM, $urineCommentsAM, $initialsAM, $commentsAM);
  
  
      $result = mysqli_stmt_execute($stmt2) or die('Error executing query.');
  
    
      if(mysqli_affected_rows($db)){
         
         header("Location: animal.php?SBID=" . $SBID);
         echo "done";
      }else{
          // let the user know
          echo "SOMETHING WENT WRONGgg1";
      }

}
 }

//$current_date = date("Y-m-d");
//$current_date = "2023-04-14";
$AM_query = "SELECT `date`, `dry`, `wet`, `stools`, `urine`, `vomiting`, `behavior`, `stoolsComments`, `urineComments`, `initials`, `comments` FROM `RS_checkListsAM` WHERE SBID = $SBID AND `date` = '$current_date'";

$AM_result = mysqli_query($db, $AM_query) or die('Error loading list 3.');

while($AM_row = mysqli_fetch_array($AM_result, MYSQLI_ASSOC)){
    if($current_date == $AM_row['date']){
    
        $displayDryAM = $AM_row['dry'];
        $displayWetAM = $AM_row['wet'];
        $displayStoolsAM = $AM_row['stools'];
        $displayUrineAM = $AM_row['urine'];
        $displayVomitingAM = $AM_row['vomiting'];
        $displayBehaviorAM = $AM_row['behavior'];
        $displayUrineCommentsAM = $AM_row['urineComments'];
        $displayStoolsCommentsAM = $AM_row['stoolsComments'];
        $displayInitialsAM = $AM_row['initials'];
        $displayCommentsAM = $AM_row['comments'];
    }
}


$PM_query = "SELECT `date`, `dry`, `wet`, `stools`, `urine`, `vomiting`, `behavior`, `stoolsComments`, `urineComments`, `initials`, `comments` FROM `RS_checkListsPM` WHERE SBID = $SBID AND `date` = '$current_date'";

$PM_result = mysqli_query($db, $PM_query) or die('Error loading list 4.');

while($PM_row = mysqli_fetch_array($PM_result, MYSQLI_ASSOC)){
    if($current_date == $PM_row['date']){

   
    $displayDryPM = $PM_row['dry'];
    $displayWetPM = $PM_row['wet'];
    $displayStoolsPM = $PM_row['stools'];
    $displayUrinePM = $PM_row['urine'];
    $displayVomitingPM = $PM_row['vomiting'];
    $displayBehaviorPM = $PM_row['behavior'];
    $displayUrineCommentsPM = $PM_row['urineComments'];
        $displayStoolsCommentsPM = $PM_row['stoolsComments'];
        $displayInitialsPM = $PM_row['initials'];
        $displayCommentsPM = $PM_row['comments'];

    }
}
?>
<div class="row">
<h2>AM</h2>
<form method="post">
    <!-- <input type="hidden" value="<?= $current_date ?>"> -->
    <p class="col">
        <label for="dryAM">Appetite Dry:</label><br>
        <select name="dryAM" id="dryAM" class="col-12">
  <option <?php if($displayDryAM=="") echo 'selected="selected"'; ?> value=""></option>
  <option <?php if($displayDryAM=="Normal") echo 'selected="selected"'; ?> value="Normal">Normal</option>
  <option <?php if($displayDryAM=="Nibbling") echo 'selected="selected"'; ?> value="Nibbling">Nibbling</option>
  <option <?php if($displayDryAM=="Not eating") echo 'selected="selected"'; ?> value="Not eating">Not eating</option>
</select>
     
    </p>
    <p class="col">
        <label for="wetAM">Appetite Wet:</label><br>
        <select name="wetAM" id="wetAM" class="col-12">
  <option <?php if($displayWetAM=="") echo 'selected="selected"'; ?> value=""></option>
  <option <?php if($displayWetAM=="Normal") echo 'selected="selected"'; ?> value="Normal">Normal</option>
  <option <?php if($displayWetAM=="Nibbling") echo 'selected="selected"'; ?> value="Nibbling">Nibbling</option>
  <option <?php if($displayWetAM=="Extra bowl") echo 'selected="selected"'; ?> value="Extra bowl">Extra bowl</option>
  <option <?php if($displayWetAM=="Not eating") echo 'selected="selected"'; ?> value="Not eating">Not eating</option>
</select>
     
    </p>
    
    <p class="col">
        <label for="stoolsAM">Stools:</label><br>
        <select name="stoolsAM" id="stoolsAM" class="col-12" onchange="displayStoolsCommentBoxAM()">
  <option <?php if($displayStoolsAM=="") echo 'selected="selected"'; ?> value=""></option>
  <option <?php if($displayStoolsAM=="Formed") echo 'selected="selected"'; ?> value="Formed">Formed</option>
  <option <?php if($displayStoolsAM=="Diarrhea") echo 'selected="selected"'; ?> value="Diarrhea">Diarrhea</option>
  <option <?php if($displayStoolsAM=="Bloody") echo 'selected="selected"'; ?> value="Bloody">Bloody</option>
  <option <?php if($displayStoolsAM=="Outside of litterbox") echo 'selected="selected"'; ?> value="Outside of litterbox">Outside of litterbox</option>
  <option <?php if($displayStoolsAM=="None") echo 'selected="selected"'; ?> value="None">None</option>
</select>
     
    </p>
    <script>
                    var stoolsAM = document.getElementById("stoolsAM").value;

document.addEventListener("DOMContentLoaded", () => {
    if(stoolsAM == "Outside of litterbox"){
        document.getElementById('displayStoolsCommentBox').innerHTML = '<p class="col" id="displayStoolsCommentBox"><label for="stoolsCommentsAM">stool comments:</label><br><textarea id="stoolsCommentsAM" name="stoolsCommentsAM" class="col-12"><?= $displayStoolsCommentsAM ?></textarea></p>';
    }else{
        document.getElementById('displayStoolsCommentBox').innerHTML = '';
    }
});
    function displayStoolsCommentBoxAM(){
            var stoolsAM = document.getElementById("stoolsAM").value;


            var stoolsAM = document.getElementById("stoolsAM").value;
            if(stoolsAM == "Outside of litterbox"){
                document.getElementById('displayStoolsCommentBox').innerHTML = '<p class="col" id="displayStoolsCommentBox"><label for="stoolsCommentsAM">stool comments:</label><br><textarea id="stoolsCommentsAM" name="stoolsCommentsAM" class="col-12"><?= $displayStoolsCommentsAM ?></textarea></p>';
            }else{
                document.getElementById('displayStoolsCommentBox').innerHTML = '';
            }
        }
    </script>
    <p class="col" id="displayStoolsCommentBox">
   
    </p>
   
    <p class="col">
        <label for="urineAM">Urine:</label><br>
        <select name="urineAM" id="urineAM" class="col-12" onchange="displayUrineCommentBoxAM()">
  <option <?php if($displayUrineAM=="") echo 'selected="selected"'; ?> value=""></option>
  <option <?php if($displayUrineAM=="Normal") echo 'selected="selected"'; ?> value="Normal">Normal</option>
  <option <?php if($displayUrineAM=="Excessive") echo 'selected="selected"'; ?> value="Excessive">Excessive</option>
  <option <?php if($displayUrineAM=="Bloody") echo 'selected="selected"'; ?> value="Bloody">Bloody</option>
  <option <?php if($displayUrineAM=="Outside of litterbox") echo 'selected="selected"'; ?> value="Outside of litterbox">Outside of litterbox</option>
  <option <?php if($displayUrineAM=="None") echo 'selected="selected"'; ?> value="None">None</option>
</select>
     
    </p>
    <script>
                    var urineAM = document.getElementById("urineAM").value;

document.addEventListener("DOMContentLoaded", () => {
    if(urineAM == "Outside of litterbox"){
        document.getElementById('displayUrineCommentBox').innerHTML = '<p class="col" id="displayUrineCommentBox"><label for="urineCommentsAM">Outside of litter box comments:</label><br><textarea id="urineCommentsAM" name="urineCommentsAM" class="col-12"><?= $displayUrineCommentsAM ?></textarea></p>';
    }else{
        document.getElementById('displayUrineCommentBox').innerHTML = '';
    }
});
    function displayUrineCommentBoxAM(){
            var urineAM = document.getElementById("urineAM").value;


            var urineAM = document.getElementById("urineAM").value;
            if(urineAM == "Outside of litterbox"){
                document.getElementById('displayUrineCommentBox').innerHTML = '<p class="col" id="displayUrineCommentBox"><label for="urineCommentsAM">Outside of litter box comments:</label><br><textarea id="urineCommentsAM" name="urineCommentsAM" class="col-12"><?= $displayUrineCommentsAM ?></textarea></p>';
            }else{
                document.getElementById('displayUrineCommentBox').innerHTML = '';
            }
        }
    </script>
    <p class="col" id="displayUrineCommentBox">
    
    </p>
   

    <p class="col">
        <label for="vomitingAM">Vomiting:</label><br>
        <select name="vomitingAM" id="vomitingAM" class="col-12">
  <option <?php if($displayVomitingAM=="") echo 'selected="selected"'; ?> value=""></option>
  <option <?php if($displayVomitingAM=="None") echo 'selected="selected"'; ?> value="None">None</option>
  <option <?php if($displayVomitingAM=="Food") echo 'selected="selected"'; ?> value="Food">Food</option>
  <option <?php if($displayVomitingAM=="Bile") echo 'selected="selected"'; ?> value="Bile">Bile</option>
  <option <?php if($displayVomitingAM=="Hairball") echo 'selected="selected"'; ?> value="Hairball">Hairball</option>
</select>
     
    </p>
    <p class="col">
        <label for="behaviorAM">Behavior:</label><br>
        <select name="behaviorAM" id="behaviorAM" class="col-12">
  <option <?php if($displayBehaviorAM=="") echo 'selected="selected"'; ?> value=""></option>
  <option <?php if($displayBehaviorAM=="Friendly") echo 'selected="selected"'; ?> value="Friendly">Friendly</option>
  <option <?php if($displayBehaviorAM=="Scared/shy") echo 'selected="selected"'; ?> value="Scared/shy">Scared/shy</option>
  <option <?php if($displayBehaviorAM=="Listless/depressed") echo 'selected="selected"'; ?> value="Listless/depressed">Listless/depressed</option>
  <option <?php if($displayBehaviorAM=="Aggressive or Feral") echo 'selected="selected"'; ?> value="Aggressive or Feral">Aggressive or Feral</option>
</select>
     
    </p>
    <p>
        <label for="commentsAM">General Comments<small> (FF amount, Amount of fluids given)</small></label>
        <textarea class="col-12" id="commentsAM" name="commentsAM"><?= $displayCommentsAM ?></textarea>
    </p>
    <p class="col">
        <label for="initialsAM">Initials:</label><br>
        <input type="text" id="initialsAM" name="initialsAM" value="<?= $displayInitialsAM ?>">
     
    </p>

    <p class="col">
        <input type="submit" name="submitAM" value="Add Entry">
    </p>
</form>
    </div>


        <div class="row">
        <h2>PM</h2>
<form method="post">
    <p class="col">
        <label for="dryPM">Dry:</label><br>
        <select name="dryPM" id="dryPM" class="col-12">
  <option <?php if($displayDryPM=="") echo 'selected="selected"'; ?> value=""></option>
  <option <?php if($displayDryPM=="Normal") echo 'selected="selected"'; ?> value="Normal">Normal</option>
  <option <?php if($displayDryPM=="Nibbling") echo 'selected="selected"'; ?> value="Nibbling">Nibbling</option>
  <option <?php if($displayDryPM=="Not eating") echo 'selected="selected"'; ?> value="Not eating">Not eating</option>
</select>
     
    </p>
    <p class="col">
        <label for="wetPM">Wet:</label><br>
        <select name="wetPM" id="wetPM" class="col-12">
  <option <?php if($displayWetPM=="") echo 'selected="selected"'; ?> value=""></option>
  <option <?php if($displayWetPM=="Normal") echo 'selected="selected"'; ?> value="Normal">Normal</option>
  <option <?php if($displayWetPM=="Nibbling") echo 'selected="selected"'; ?> value="Nibbling">Nibbling</option>
  <option <?php if($displayWetPM=="Extra bowl") echo 'selected="selected"'; ?> value="Extra bowl">Extra bowl</option>
  <option <?php if($displayWetPM=="Not eating") echo 'selected="selected"'; ?> value="Not eating">Not eating</option>
</select>
     
    </p>
    <p class="col">
        <label for="stoolsPM">Stools:</label><br>
        <select name="stoolsPM" id="stoolsPM" class="col-12" onchange="displayStoolsCommentBoxPM()">
  <option <?php if($displayStoolsPM=="") echo 'selected="selected"'; ?> value=""></option>
  <option <?php if($displayStoolsPM=="Formed") echo 'selected="selected"'; ?> value="Formed">Formed</option>
  <option <?php if($displayStoolsPM=="Diarrhea") echo 'selected="selected"'; ?> value="Diarrhea">Diarrhea</option>
  <option <?php if($displayStoolsPM=="Bloody") echo 'selected="selected"'; ?> value="Bloody">Bloody</option>
  <option <?php if($displayStoolsPM=="Outside of litterbox") echo 'selected="selected"'; ?> value="Outside of litterbox">Outside of litterbox</option>
  <option <?php if($displayStoolsPM=="None") echo 'selected="selected"'; ?> value="None">None</option>
</select>
     
    </p>
    <script>
                    var stoolsPM = document.getElementById("stoolsPM").value;

document.addEventListener("DOMContentLoaded", () => {
    if(stoolsPM == "Outside of litterbox"){
        document.getElementById('displayStoolsCommentBoxPM').innerHTML = '<p class="col" id="displayStoolsCommentBoxPM"><label for="stoolsCommentsPM">stool comments:</label><br><textarea id="stoolsCommentsPM" name="stoolsCommentsPM" class="col-12"><?= $displayStoolsCommentsPM ?></textarea></p>';
    }else{
        document.getElementById('displayStoolsCommentBoxPM').innerHTML = '';
    }
});
    function displayStoolsCommentBoxPM(){
            var stoolsPM = document.getElementById("stoolsPM").value;


            var stoolsPM = document.getElementById("stoolsPM").value;
            if(stoolsPM == "Outside of litterbox"){
                document.getElementById('displayStoolsCommentBoxPM').innerHTML = '<p class="col" id="displayStoolsCommentBoxPM"><label for="stoolsCommentsPM">stool comments:</label><br><textarea id="stoolsCommentsPM" name="stoolsCommentsPM" class="col-12"><?= $displayStoolsCommentsPM ?></textarea></p>';
            }else{
                document.getElementById('displayStoolsCommentBoxPM').innerHTML = '';
            }
        }
    </script>
    <p class="col" id="displayStoolsCommentBoxPM">
   
    </p>
    <p class="col">
        <label for="urinePM">Urine:</label><br>
        <select name="urinePM" id="urinePM" class="col-12" onchange="displayUrineCommentBoxPM()">
  <option <?php if($displayUrinePM=="") echo 'selected="selected"'; ?> value=""></option>
  <option <?php if($displayUrinePM=="Normal") echo 'selected="selected"'; ?> value="Normal">Normal</option>
  <option <?php if($displayUrinePM=="Excessive") echo 'selected="selected"'; ?> value="Excessive">Excessive</option>
  <option <?php if($displayUrinePM=="Bloody") echo 'selected="selected"'; ?> value="Bloody">Bloody</option>
  <option <?php if($displayUrinePM=="Outside of litterbox") echo 'selected="selected"'; ?> value="Outside of litterbox">Outside of litterbox</option>
  <option <?php if($displayUrinePM=="None") echo 'selected="selected"'; ?> value="None">None</option>
</select>
     
    </p>
    <script>
                    var urinePM = document.getElementById("urinePM").value;

document.addEventListener("DOMContentLoaded", () => {
    if(urinePM == "Outside of litterbox"){
        document.getElementById('displayUrineCommentBoxPM').innerHTML = '<p class="col" id="displayUrineCommentBoxPM"><label for="urineCommentsPM">Outside of litter box comments:</label><br><textarea id="urineCommentsPM" name="urineCommentsPM" class="col-12"><?= $displayUrineCommentsPM ?></textarea></p>';
    }else{
        document.getElementById('displayUrineCommentBoxPM').innerHTML = '';
    }
});
    function displayUrineCommentBoxPM(){
            var urinePM = document.getElementById("urinePM").value;


            var urinePM = document.getElementById("urinePM").value;
            if(urinePM == "Outside of litterbox"){
                document.getElementById('displayUrineCommentBoxPM').innerHTML = '<p class="col" id="displayUrineCommentBoxPM"><label for="urineCommentsPM">Outside of litter box comments:</label><br><textarea id="urineCommentsPM" name="urineCommentsPM" class="col-12"><?= $displayUrineCommentsPM ?></textarea></p>';
            }else{
                document.getElementById('displayUrineCommentBoxPM').innerHTML = '';
            }
        }
    </script>
    <p class="col" id="displayUrineCommentBoxPM">
    
    </p>
    <p class="col">
        <label for="vomitingPM">Vomiting:</label><br>
        <select name="vomitingPM" id="vomitingPM" class="col-12">
  <option <?php if($displayVomitingPM=="") echo 'selected="selected"'; ?> value=""></option>
  <option <?php if($displayVomitingPM=="None") echo 'selected="selected"'; ?> value="None">None</option>
  <option <?php if($displayVomitingPM=="Food") echo 'selected="selected"'; ?> value="Food">Food</option>
  <option <?php if($displayVomitingPM=="Bile") echo 'selected="selected"'; ?> value="Bile">Bile</option>
  <option <?php if($displayVomitingPM=="Hairball") echo 'selected="selected"'; ?> value="Hairball">Hairball</option>
</select>
     
    </p>
    <p class="col">
        <label for="behaviorPM">Behavior:</label><br>
        <select name="behaviorPM" id="behaviorPM" class="col-12">
  <option <?php if($displayBehaviorPM=="") echo 'selected="selected"'; ?> value=""></option>
  <option <?php if($displayBehaviorPM=="Friendly") echo 'selected="selected"'; ?> value="Friendly">Friendly</option>
  <option <?php if($displayBehaviorPM=="Scared/Shy") echo 'selected="selected"'; ?> value="Scared/Shy">Scared/Shy</option>
  <option <?php if($displayBehaviorPM=="Listless/depressed") echo 'selected="selected"'; ?> value="Listless/depressed">Listless/depressed</option>
  <option <?php if($displayBehaviorPM=="Aggressive or Feral") echo 'selected="selected"'; ?> value="Aggressive or Feral">Aggressive or Feral</option>
</select>
     
    </p>
    <p>
        <label for="commentsPM">General Comments<small> (FF amount, Amount of fluids given)</small></label>
        <textarea class="col-12" id="commentsPM" name="commentsPM"><?= $displayCommentsPM ?></textarea>
    </p>
    <p class="col">
        <label for="initialsPM">Initials:</label><br>
        <input type="text" id="initialsPM" name="initialsPM" value="<?= $displayInitialsPM ?>">
     
    </p>

    <p class="col">
        <input type="submit" name="submitPM" value="Add Entry">
    </p>
</form>
    </div>
    <div class="row"> <div class="col"><form method="post"><input type="submit" id="previous" name="previous" value="yesterday"></form></div></div>
<?php

//add buttons to go back and fourth through dates
$previousDate = date('Y-m-d',strtotime("-1 days"));
if(isset($_POST['previous'])){
     
    header("Location: previous.php?SBID=" . $SBID . "&date=" . $previousDate);

}
?>