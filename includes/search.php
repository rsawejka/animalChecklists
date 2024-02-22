<?php 
$searchFor = $_POST['searchForAnimal'];
if(isset($_POST['searchForAnimalSubmit'])){
    header("Location: animal.php?SBID=" . $searchFor);

}
?>
<h3>Search For Animal</h3>

<form method="post">
<div class="form-group">
    <label for="searchForAnimal">Search For Animal by SB ID</label>
    <input type="text" name="searchForAnimal" class="form-control" id="searchForAnimal">
  </div>
<!-- <label for="searchForAnimal">Search By ID</label>
<input type="text" name="searchForAnimal" id="searchForAnimal"> -->
<input type="submit" name="searchForAnimalSubmit" id="searchForAnimalSubmit" class="btn btn-primary my-2">
</form>