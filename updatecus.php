<?php
include_once "./db.php";

if(isset($_POST["Update"])){

    $Name = $_POST["Name"];
    $Email = $_POST["Email"];
    $Phone = $_POST["Phone"];
    $id = $_POST["id"];

    $query = "INSERT INTO `customer`(`Name`, `Email`, `Phone`, `id`) VALUES ($Name,$Email,$Email,$id,)";
    $responseOfAdd = mysqli_query($con,$query);
    
    if($responseOfAdd){
        $message = "New Customer added Successfully";
        $alert_type = "success";
    }else{
        $message = "There is problem while adding new admin try again";
        $alert_type = "danger";
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
    .table{
        border: 8px;
        color: white;
        background-color: black;
    }
</style>
<body>

    <?php
    

    if(isset($_POST["Update"])){
        $Name = $_POST["Name"];
        $Email = $_POST["Email"];
        $Phone = $_POST["Phone"];
        $id = $_POST["id"];

    $Update = "UPDATE `customer` SET `Name`= '$_POST[Name]',`Email`='$_POST[Email]',`Phone`='$_POST[Phone]' WHERE `id` = '$_POST[id]'  ";
        $responseOfAdd = mysqli_query($con, $Update) or die(mysqli_error($con));
            header('location:cus.php?id="'.$id.'"');

        if($responseOfAdd){
            $message = " Updated Successfully";
            $alert_type = "success";
        }else{
            $message = "There is problem while adding new admin try again";
            $alert_type = "danger";
        }
        
      }
if(isset($_GET["id"])){
      $select_query = "SELECT *FROM customer WHERE id ='".$_GET["id"] . "'";
      $result = mysqli_query($con, $select_query);
      $row = mysqli_fetch_array($result);
}
    ?>
<form class="form-control" action="updatecus.php" method="POST">
<input  type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>" class="form-control">
            <label for="">Customer Name</label>
            <input type="text" name="Name"  value="<?php echo $row['Name']; ?>">
            <label >Customer Email</label>
            <input type="text" name="Email" id=""  value="<?php echo $row['Email']; ?>">
            <label >Customer Phone</label>
            <input type="text" name="Phone" id="" value="<?php echo $row['Phone'];?>">
<button type="submit"  class="btn btn-info" name="Update">Update</button>
</form>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>