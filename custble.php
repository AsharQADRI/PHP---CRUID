<?php
include_once "./db.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="cus.css">

</head>
<style>

    #Exit{
        color: black;
        border: 3px solid red;
    }
</style>
<body>

<table class="table">
	            <tr>
		            <th colspan="7"><h2>Customer Record</h2></th>
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
        <td> <a href="updatecus.php?id=<?php echo $rows['id']; ?>" id="edit"   class="btn btn-warning" name="update" value="id">Edit</td></a>
        <td>  <a href="cus.php?del&del_id=<?php echo $rows['id']; ?>"  class="btn btn-warning" type="delete" name="delete" value="id">Delete</td></a>
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
<center>
<td>  <a href="cus.php" id="Exit"  class="btn btn-danger" type="btn" name="Exit" value="id">Exit</td></a>
</center>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>