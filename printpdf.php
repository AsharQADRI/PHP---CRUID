<?php
require_once ('db.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOCS</title>
<!-- bootsstrap links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<!-- date form  -->
<form method="POST" action="" name="myForm">

<div class="row text-center p-3">
    <div class="col-1">
        <label for="getdate">Generating Date : </label>
    </div>
    <div class="col-2">
        <input value="<?php echo date('Y-m-d'); ?>" id="dateInput" name="getdate" class="form-control" type="date" />
    </div>
    <div class="col-1">
        <label for="getMonth">For the Month of : </label>
    </div>
    <div class="col-2">
        <input type="month" value="<?php echo date('Y-m'); ?>" name="getMonth" id="MonthInput" class="form-control">
    </div>
    
      <div class="col-1">
        <label for="due_date">Due Date : </label>
    </div>
    <div class="col-2">
        <input type="date" value="<?php echo date('Y-m-d'); ?>" name="due_date"  class="form-control">
    </div>
    
      <div class="col-1">
        <label for="getMonth">Expirey Date : </label>
    </div>
    <div class="col-2">
        <input type="date" value="<?php echo date('Y-m-d'); ?>" name="last_date" id="MonthInput" class="form-control">
    </div>
</div>
</body>
</html>