<?php
include_once("db.php");
?>
<?php

if(isset($_POST['submit'])){
    $Name = $_POST['Name'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
$id = $_POST['id'];

$query = "INSERT INTO `customer`(`id`, `Name`, `Email`, `Phone`) VALUES ('".$id."','".$Name."','".$Email."','".$Phone."')";
$result = mysqli_query($con, $query);

header('location:cus.php');

// if($result){
// ?>
 <script>
// alert("Data insert properly")
// </script>
<?php
// }else{
// ?>
 <script>
// alert("Data not inserted ");
</script>
<?php
}
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customerdb</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="cus.css">
</head>
<style>
    #Save{

border: 3px solid darkblue;
width: 8rem;
}
#List{

border: 3px solid darkgreen;
width: 8rem;

}
#Exit{
border: 3px solid red;
width: 8rem;
}
</style>
<body>
<div class="first_line">
    <p>Address :</p>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. MPerspiciatis vitae cupiditate sapiente neque ad error.</p>
</div>
<div class="sec_line">
    <p>Tel: 098124578</p>
    <p>Email: ashar@gmail.com</p>
    <p>website: Brandlook</p>
</div>
<div class="third_line">
    <p>Department: ACCOUNTS-KASHIF KHAN(admin)</p>
</div>
<br>
<br>
    <h1>Customer Registration</h1>
    <br>
<br>
    <form class="form1" action="cus.php" method="POST">
            <label for="">Name</label>
            <input type="text" name="Name"> <br>
            <label > Email</label>
            <input type="email" name="Email" id=""><br>
            <label >Phone</label>
            <input type="text" name="Phone" id="" ><br>
            <br>
            <button class="btn btn-primary" name="submit">Register</button>
    </form>
             <table class="table">
	            <tr>
		            <th colspan="7"><center><h2>Customer Record</h2></center></th>
		                </tr>
                            <th> ID </th>
			                <th> Name</th>
			                <th> Email </th>
                            <th> Phone </th>
                            <th> Action</th>
		        </tr>
		<?php
        $sql = "SELECT * FROM `customer` WHERE 1";
        $result = mysqli_query($con, $sql);

         while($rows=mysqli_fetch_array($result))
		 {
		?>
		<tr> <td><?php echo $rows['id']; ?></td>
		<td><?php echo $rows['Name']; ?></td>
		<td><?php echo $rows['Email']; ?></td>
		<td><?php echo $rows['Phone']; ?></td><div class="container mt-3">
        <td> <a href="updatecus.php?id=<?php echo $rows['id']; ?>" id="edit"   class="btn btn-success" name="update" value="id">Edit</td></a>
        <td>  <a href="cus.php?del&del_id=<?php echo $rows['id']; ?>"  class="btn btn-danger" type="delete" name="delete" value="id">Delete</td></a>
              </tr>
              <?php
        }
        
          if(isset($_GET["del"])){
            $id = $_GET["del_id"];
        
            $query = "DELETE FROM `customer` WHERE id = '$id'";
            $responseOfDelete = mysqli_query($con,$query);
            
            echo "<script>window.location='cus.php?ash&id=".$id."';</script>";
          }
    
        
            $selectitem = "SELECT *FROM item";
            $response = mysqli_query($con,$selectitem);
  ?> 
	</table>
    <p>______________________________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
<center>

<td> <a href="cus.php?list" id="List"   class="btn btn-success" name="Name" value="id">List</td></a>
        <td> <a href="custble.php" id="Save"   class="btn btn-primary" name="Save" value="id">Save</td></a>
        <td>  <a href="cus.php" id="Exit"  class="btn btn-danger" type="delete" name="Exit" value="id">Exit</td></a>
        </center>
        <?php
        if(isset($_GET['list'])){
        ?>
             <table class="table">
	            <tr>
		            <th colspan="4"><h2>Customer Record</h2></th>
		                </tr>
                            <th> ID </th>
			                <th> Name</th>
			                <th> Email </th>
                            <th> Phone </th>
                            <th> Action</th>
		        </tr>
		<?php
        $sql = "SELECT * FROM `customer` WHERE 1";
        $result = mysqli_query($con, $sql);

         while($rows=mysqli_fetch_array($result))
		 {
		?>
		<tr> <td><?php echo $rows['id']; ?></td>
		<td><?php echo $rows['Name']; ?></td>
		<td><?php echo $rows['Email']; ?></td>
		<td><?php echo $rows['Phone']; ?></td><div class="container mt-3">
        <td> <a href="updatecus.php?id=<?php echo $rows['id']; ?>" id="edit"   class="btn btn-success" name="update" value="id">Edit</td></a>
        <td>  <a href="cus.php?del&del_id=<?php echo $rows['id']; ?>"  class="btn btn-danger" type="delete" name="delete" value="id">Delete</td></a>
              </tr>
              <?php
        }
        
          if(isset($_GET["del"])){
            $id = $_GET["del_id"];
        
            $query = "DELETE FROM `customer` WHERE id = '$id'";
            $responseOfDelete = mysqli_query($con,$query);
            
            echo "<script>window.location='cus.php?ash&id=".$id."';</script>";
          }
    
        
            $selectitem = "SELECT *FROM item";
            $response = mysqli_query($con,$selectitem);
        }
?>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>