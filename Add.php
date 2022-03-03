<?php
include_once "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<style>
    .table{
        border: 8px;
        color: black;
    }
        #edit{
width: 8rem;
        }
    .sub{
        background-color: aqua;
        color: green;
        border-radius: 31rem;
    }
    #Save{
        border: 3px solid blue;
        width: 8rem;
    }

    #Exit{
        border: 3px solid red;
        width: 8rem;
    }
    #m_select{
      border: 3px solid blue;
        width: 8rem;
        background-color: blue;
        color: white;
    }
    </style>
<body>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">Select Item</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Select Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table">
	            <tr>
		            <th colspan="4"><h2>Item Record</h2></th>
		                </tr>
                            <th> ID </th>
			                <th> Item Code </th>
			                <th>Item Name </th>
			                <th> Price </th>
                      <th> Action </th>
		        </tr>

      <?php
           
           if(isset($_GET["id"])){
     $select_query = "SELECT *FROM item WHERE id = '".$_GET["id"] . "'";
     $result = mysqli_query($con, $select_query);
     $row = mysqli_fetch_array($result);
}

       $sql = "SELECT * FROM `item`";
       $result = $con->query($sql);


      while($rows=mysqli_fetch_array($result))
		 {
             ?>
     	<tr> <td><?php echo $rows['id']; ?></td>
		 <td><?php echo $rows['itemcode']; ?></td>
		<td><?php echo $rows['Name']; ?></td>
		<td><?php echo $rows['price']; ?></td><div class="container mt-3">
        <td> <a href="Add.php?id=<?php echo $rows['id']; ?>" id="m_select"   class="btn" name="Select" value="id">Select</td></a>
              </tr>
              <?php
         }
?>
</table>
      </div>
        </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<form class="form-control" action="Add.php" method="POST">
<label for="">Item ID</label>
<input style="width: 5rem"  type="" name="id" id="id" value="<?php echo $row['id']; ?>"> 
<label for="">Item Code</label>
<input type="text" name="itemcode"  value="<?php echo $row['itemcode']; ?>">
<label >Item Name</label>
<input type="text" name="Name" id=""  value="<?php echo $row['Name']; ?>">
<label >Item Price</label>
<input type="text" name="price" id="" value="<?php echo $row['price'];?>">
</form>


<p>______________________________________________________________________________________________________________________________________________________________________________________________________________________________________</p>


<form class="form-control" action="Add.php" method="POST">
  <input type="hidden" name="id" value="itmtbl<?php echo $_GET['id'];?>">
            <label for="">Item Code</label>
            <input type="text" name="itemCode"> 
            <label >Item Name</label>
            <input type="text" name="Name" id="">
            <label >Item Price</label>
            <input  type="text" name="price" id="" >
            <td> <input type="submit" id="edit"   class="btn btn-primary" name="ADD" value="ADD"></td>
    </form>
             <table class="table">
	            <tr>
		            <th colspan="4"><h2>Item Record</h2></th>
		                </tr>
                      <th> ID </th>
			                <th> Item Code </th>
			                <th>Item Name </th>
			                <th> Price </th>
                      <th> Action </th>
		        </tr>
		<?php


if(isset($_POST['ADD'])){



  $itemCode = $_POST['itemCode'];
$name = $_POST['Name'];
$price = $_POST['price'];
$id = $_POST['id'];

          $sql = "INSERT INTO `invoice`(`itemCode`, `Name`, `price`, `msid`) VALUES ('".$itemCode."', '".$name."', '".$price."',  '".$id."')";
        $result = mysqli_query($con,$sql) or die("erorr 129".mysqli_error($con));

  echo "<script>window.location='Add.php?ash&id=".$id."';</script>";
                }

          ?>

<?php
if(isset($_GET['ash'])){
$sql = "SELECT * FROM `invoice` WHERE msid = '".$_GET['id']."'";
$result = mysqli_query($con,$sql);
$sno = 0;
         while($row=mysqli_fetch_array($result))
		 {$sno++;
		?>
		<tr> <td><?php echo $sno; ?></td>
		<td><?php echo $row['itemcode']; ?></td>
		<td><?php echo $row['Name']; ?></td>
		<td><?php echo $row['price']; ?></td><div class="container mt-3">
    <td> <a href="Add.php?id=<?php echo $_GET['id']; ?>&del&delt_id=<?php echo $row['id']; ?>"  class="btn " type="delete" name="delete" value="id">Delete</td></a>
     </tr>
<?php }
}
  if(isset($_GET["del"])){
    $id = $_GET["delt_id"];

    $query = "DELETE FROM `invoice` WHERE id = '$id'";
    $responseOfDelete = mysqli_query($con,$query);

    echo "<script>window.location='Add.php?ash&id=".$id."';</script>";
  }
    $selectitem = "SELECT * FROM `invoice`";
    $response = mysqli_query($con,$selectitem);
?>
______________________________________________________________________________________________________________________________________________________________________________________________________________________________________

             </table>
<p>______________________________________________________________________________________________________________________________________________________________________________________________________________________________________</p>

<center>
<td> <a href="item2.php?List" id="item2.php?List" style="width: 8rem;  border: 3px solid darkgreen;"  class="btn btn-success" name="List" value="id">List</td></a>
        <td> <a href="itmtbl.php" id="Save"   class="btn btn-primary" name="Save" value="id">Save</td></a>
        <td>  <a href="" id="Exit"  class="btn btn-danger" type="delete" name="Exit" value="id">Exit</td></a>
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
        <td> <a href="update.php?id=<?php echo $rows['id']; ?>" id="edit"  class="btn btn-warning"  name="update" value="id">Edit</td></a>
        <td> <a href="Add.php?id=<?php echo $rows['id']; ?>" id="edit"   class="btn btn-warning"  name="Add" value="id">Add</td></a>
        <td>  <a href="item2.php?del&del_id=<?php echo $rows['id']; ?>"  class="btn btn-warning"  type="delete" name="delete" value="id">Delete</td></a>
              </tr>
	<?php
                }
              }
                ?>
	</table>
</body>
</html>