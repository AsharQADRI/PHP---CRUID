<?php
include_once "./db.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="index.css">
</head>
<body>
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
        <td> <a href="update.php?id=<?php echo $rows['id']; ?>" id="edit"  class="btn btn-warning"  name="update" value="id">Edit</td></a>
        <td> <a href="Add.php?id=<?php echo $rows['id']; ?>" id="edit"   class="btn btn-warning"  name="Add" value="id">Add</td></a>
        <td>  <a href="item2.php?del&del_id=<?php echo $rows['id']; ?>"  class="btn btn-warning"  type="delete" name="delete" value="id">Delete</td></a>
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
             <center>
             <td>  <a href="item2.php" id="Exit"  class="btn btn-danger" type="delete" name="Exit" value="id">Exit</td></a>
             </center>
</body>
</html>