<?php
$SBID = $_GET['SBID'] ?? '1';
include "includes/header.php";

$post = false;
$post = true;
$data = "https://employeeportal.hawspets.org/checklists/animal.php?SBID=$SBID";
$size = "500x500";
$color = "0000ff";
$qr = 'https://chart.googleapis.com/chart?cht=qr&chs='.$size.'&chl='.$data.'&chco='.$color;



if(isset($_POST['submit'])){
    ob_clean();
    header("Location: animal.php?SBID=" . $SBID);
}
?>
<div class="container">

<div class="row">
    <div class="col-md-4 offset-md-4">
        <div class="card mt-5">
            <div class="card-body">
                <div class="form-group text-center">
                            <img src="<?php echo $qr; ?>" class="img-fluid" alt="">
                        </div>
            </div>
        </div>
    </div>
</div>
<form method="post"><input type="submit" id="submit" value="contuinue" name="submit" class="noprint"></form>


<div class="noprint"><button onClick="window.print()">Print this page</button></div>

<?php

include "includes/footer.php"
?>