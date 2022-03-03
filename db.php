    <?php
    $SERVER = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'invoicedb';

    $con = mysqli_connect($SERVER, $username, $password, $db);

    if($con){
        // echo "Conection successful";

    ?>
    <script>
        // alert('conection succesful');

    </script>
    <?php
    }else{
        dir("not con" , mysqli_connect_errno());
    }
    ?>