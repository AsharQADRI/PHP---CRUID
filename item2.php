<?php
include_once("db.php");
?>
<?php

if(isset($_POST['submit'])){
    $itemCode = $_POST['itemCode'];
$name = $_POST['Name'];
$price = $_POST['price'];
$id = $_POST['id'];

$query = " INSERT INTO `item`(`itemCode`, `Name`, `price`, `id`) VALUES ('".$itemCode."', '".$name."', '".$price."', '".$id."')";
$result = mysqli_query($con, $query);
header('location:item2.php');

if($result){
?>
 <script>
alert("Data insert properly")
</script>
<?php
}else{
?>
 <script>
alert("Data not inserted ");
</script>
<?php
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="index.css">
</head>
<style>
    #Save{

        border: 3px solid darkgreen;
        width: 8rem;
    }
    #List{

        border: 3px solid darkblue;
        width: 8rem;

    }
    #Exit{
        border: 3px solid red;
        width: 8rem;
    }
    h1{
        margin-left: 33rem;
    }
</style>
<body>
    <div>
    <img id="img_logo" src="./images/3034007-inline-i-applelogo.png" alt="">
<div class="first_line">  
    <p>Address :</p>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. MPerspiciatis vitae cupiditate sapiente neque ad error.</p>
</div>
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
    <h1>Item Registration</h1>
    <br>
<br>

    <form class="form1" action="item2.php" method="POST">
<img src="" alt="">
    <label for="" style="width: 9.5rem;">Item Code:</label>
            <input type="text" name="itemCode"> <br>
            <label >Item Name:</label>
            <input type="text" name="Name" id=""><br>
            <label >Item Price: </label>
            <input type="text" name="price" id="" ><br>
            <div class="form-group">
                        <!-- <label for="">Select Image:</label> -->
                        <!-- <input type="file" name="uploadedImage" class="form-control image_file" id=""> -->
                    </div><br>
            <button class="btn btn-primary" style="border: 2px solid blue; width: 8rem;" name="submit">Submit</button>
            <br>
            <br>
    </form>
             <table class="table">
	            <tr>
		            <th colspan="7"><h2 style="text-align: center;">Item Record</h2></th>
		                </tr>
                            <th> ID </th>
			                <th> Item Code </th>
			                <th>Item Name </th>
			                <th> Price </th>
                            <th> Action </th>
		        </tr>
		<?php
        $sql = "SELECT * FROM `item`";
        $result = mysqli_query($con,$sql);

         while($rows=mysqli_fetch_array($result))
		 {
		?>
		<tr> <td><?php echo $rows['id']; ?></td>
		 <td><?php echo $rows['itemcode']; ?></td>
		<td><?php echo $rows['Name']; ?></td>
		<td><?php echo $rows['price']; ?></td><div class="container mt-3">
        <td> <a href="update.php?id=<?php echo $rows['id']; ?>" id="edit"  class="btn btn-success"  name="update" value="id">Edit</td></a>
        <td> <a href="Add.php?id=<?php echo $rows['id']; ?>" id="edit"   class="btn btn-primary"  name="Add" value="id">Add</td></a>
        <td>  <a href="item2.php?del&del_id=<?php echo $rows['id']; ?>"  class="btn btn-danger"  type="delete" name="delete" value="id">Delete</td></a>
              </tr>
	<?php
                }
                
                  if(isset($_GET["del"])){
                    $id = $_GET["del_id"];
                
                    $query = "DELETE FROM `item` WHERE id = '$id'";
                    $responseOfDelete = mysqli_query($con,$query);
                    
                
                  }
            
                
                    $selectitem = "SELECT *FROM item";
                    $response = mysqli_query($con,$selectitem);
          ?> 
             </table>
             <p>______________________________________________________________________________________________________________________________________________________________________________________________________________________________________</p>

<center>
<td> <a href="item2.php?list" id="List"   class="btn btn-primary" name="List" value="id">List</td></a>
        <td> <a href="itmtbl.php" id="Save"   class="btn btn-success" name="Save" value="id">Save</td></a>
        <td>  <a href="item2.php" id="Exit"  class="btn btn-danger" type="delete" name="Exit" value="id">Exit</td></a>
        </center>
        <?php
        if(isset($_GET['list'])){
        ?>
        <table class="table">
	            <tr>
		            <th colspan="7"><h2 style="text-align: center;">Item Record</h2></th>
		                </tr>
                            <th> ID </th>
			                <th> Item Code </th>
			                <th>Item Name </th>
			                <th> Price </th>
                            <th> Action </th>
		        </tr>
		<?php
        $sql = "SELECT * FROM `item`";
        $result = mysqli_query($con,$sql);

         while($rows=mysqli_fetch_array($result))
		 {
		?>
		<tr> <td><?php echo $rows['id']; ?></td>
		 <td><?php echo $rows['itemcode']; ?></td>
		<td><?php echo $rows['Name']; ?></td>
		<td><?php echo $rows['price']; ?></td><div class="container mt-3">
        <td> <a href="update.php?id=<?php echo $rows['id']; ?>" id="edit"  class="btn btn-success"  name="update" value="id">Edit</td></a>
        <td> <a href="Add.php?id=<?php echo $rows['id']; ?>" id="edit"   class="btn btn-primary"  name="Add" value="id">Add</td></a>
        <td>  <a href="item2.php?del&del_id=<?php echo $rows['id']; ?>"  class="btn btn-danger"  type="delete" name="delete" value="id">Delete</td></a>
              </tr>
	<?php
                }
                
                  if(isset($_GET["del"])){
                    $id = $_GET["del_id"];
                
                    $query = "DELETE FROM `item` WHERE id = '$id'";
                    $responseOfDelete = mysqli_query($con,$query);
                    
                
                  }
            
                
                    $selectitem = "SELECT *FROM item";
                    $response = mysqli_query($con,$selectitem);
                }
          ?> 
             </table>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>