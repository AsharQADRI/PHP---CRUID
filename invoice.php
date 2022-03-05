<?php  
    require_once "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice.php</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="invoice.css">
    <style>
        #m_select{
      border: 3px solid blue;
        width: 5rem;
        background-color: blue;
        color: white;
    }
    </style>
</head>
<body>
     <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">Select Item</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Select Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table">
	            <tr>
		            <th colspan="7"><h2>Customer Record</h2></th>
		                </tr>
                            <th> ID </th>
			                <th> Customer Name </th>
			                <th>Customer Phone </th>
		        </tr>
                <?php
    if(isset($_POST["Select"])){
        $Name = $_POST["cName"];
        $Email = $_POST["Email"];
        $Phone = $_POST["Phone"];
        $id = $_POST["id"];

    // $Update = "UPDATE `customer` SET `Name`= '$_POST[Name]',`Email`='$_POST[Email]',`Phone`='$_POST[Phone]' WHERE `id` = '$_POST[id]'  ";
    //     $responseOfAdd = mysqli_query($con, $Update) or die(mysqli_error($con));
    //         header('location:invoice.php?id="'.$id.'"');

    //     if($responseOfAdd){
    //         $message = " Updated Successfully";
    //         $alert_type = "success";
    //     }else{
    //         $message = "There is problem while adding new admin try again";
    //         $alert_type = "danger";
    //     }
 }
    //   }
    $sql = "SELECT * FROM `customer`";
    $result = mysqli_query($con, $sql);

while($row=mysqli_fetch_array($result))
{
?>
<tr> <td><?php echo $row['id']; ?></td>
<td><?php echo $row['cName']; ?></td>
<td><?php echo $row['Email']; ?></td>
<td><?php echo $row['Phone']; ?></td><div class="container mt-3">
<td> <a href="invoice.php?id=<?php echo $row['id']; ?>"id="m_select"    class="btn" name="Select" value="id">Select</td></a>
         </tr>
<?php
}
?>
      </table>
<div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
<?php
if(isset($_GET["id"])){
  $select_query = "SELECT *FROM customer Where id = '".$_GET['id']."'";
      $result = mysqli_query($con, $select_query);
      $row = mysqli_fetch_array($result);
}
?>
<form class="form-control" action="invoice.php" method="POST">
<input  type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>" class="form-control">
            <label for="">Customer Name</label>
            <input type="text" name="cName" value="<?php echo $row['cName']; ?>">
            <label >Customer Phone</label>
            <input type="text" name="Phone" id="" value="<?php echo $row['Phone'];?>">


<p>_______________________________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">Select Item</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable"  tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
		                </tr>
      <?php

      $sql = "SELECT * FROM `item`";
       $result = $con->query($sql); 

      while($rows=mysqli_fetch_array($result))
		 {
      ?>
    <tr> <td><?php echo $rows['id']; ?></td>
		<td><?php echo $rows['itemcode']; ?></td>
		<td><?php echo $rows['Name']; ?></td>
	  <td><?php echo $rows['price']; ?></td><div class="container mt-3">
    <td> <a href="invoice.php?id=<?php echo $rows['id']; ?>"id="m_select"  type="hidden"  class="btn" name="Select_s" value="id">Select</td></a>
    </tr>
              <?php
         }
?>
<br>
</table>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
  if(isset($_GET["id"])){
    $select_query = "SELECT *FROM item WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($con, $select_query);
    $rows = mysqli_fetch_array($result);
      }
?>

<label for="">Item ID</label>
<input style="width: 5rem"  type="" name="id" id="id" value="<?php echo $rows['id']; ?>">
<label for="">Item Code</label>
<input type="text" name="itemcode"  value="<?php echo $rows['itemcode']; ?>">
<label >Item Name</label>
<input type="text" name="Name" id=""  value="<?php echo $rows['Name']; ?>">
<label >Item Price</label>
<input type="text" name="price" id="" value="<?php echo $rows['price'];?>">
<br>
<br>
<button type="submit" id="bt1" style="width: 9rem;" class="btn btn-success" name="add_s">Add</button>
</form>
<br>
<br>
<?php
                 ?>
          <?php
if(isset($_POST['add_s'])){

$id = $_POST['id'];
$itemcode = $_POST['itemcode'];
$Name = $_POST['Name'];
$price = $_POST['price'];
$cName = $_POST['cName'];
$Phone = $_POST['Phone']; 

        $sql = "INSERT INTO `invodb`(`id`, `itemcode`, `Name`, `price`, `Cusname`, `Cusphone`) VALUES (  '".$id."','".$itemcode."', '".$Name."', '".$price."', '".$cName."', '".$Phone."')";
        $result = mysqli_query($con,$sql) or die("erorr 129".mysqli_error($con));
  echo "<script>window.location='invoice.php?ash&id=".$id."';</script>";
                }

          ?>
    </form>
             <table class="table">
	            <tr>
               <br>
		            <th colspan="8"> <center><h2>Item Record</h2></center></th>
                      
              </tr>
                      <th> ID </th>
			                <th> Item Code </th>
			                <th> Item Name </th>
			                <th> Price </th>
			                <th> Customer Name </th>
			                <th> Customer Phone </th>
                      <th> Action </th>
		        </tr>
	
<?php

$sql = "SELECT *FROM `invodb`  ";
$rest = mysqli_query($con,$sql);
         while($row = mysqli_fetch_array($rest)){
		?>
    <!-- `id`, `itemcode`, `Name`, `price` -->
		<tr> <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['itemcode']; ?></td>
		<td><?php echo $row['Name']; ?></td>
		<td><?php echo $row['price']; ?></td>
		<td><?php echo $row['Name']; ?></td>
		<td><?php echo $row['Cusphone']; ?></td>
    <td><a class="btn btn-success" title="Print" target="_blank" href="print.php?&id=<?php echo $row["id"]; ?>"><i class="fa fa-print" aria-hidden="true"></i></a></td>  
    <td><a class="btn btn-danger" title="delete" target="_blank" href="invoice.php?del&del_id=<?php echo $rows['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>  
  </tr>
     <?php
     }

     if(isset($_GET["del"])){
      $id = $_GET["del_id"];
  
      $query = "DELETE FROM `invodb` WHERE id = '$id'";
      $responseOfDelete = mysqli_query($con,$query);
      
  
    }

// $sql = "SELECT *FROM `invoicecusdb` ";
// $result = mysqli_query($con,$sql);
//          while($row = mysqli_fetch_array($result))
          ?>
<center>
  <br>
  <br>
<td> <a href="invoice.php?list" id="List"   class="btn btn-success" name="Name" value="id">List</i></td></a>
        <td> <a href=".php" id="Save"   class="btn btn-primary" name="Save" value="id">Save</td></a>
        <td>  <a href="invoice.php" id="Exit"  class="btn btn-danger" type="delete" name="Exit" >Exit</td></a>
      </center>
</body>
</html>