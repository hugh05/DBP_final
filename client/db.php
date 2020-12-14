<?php
    $con=mysqli_connect('localhost', 'dbp3', 'recycle12!!', 'dbp3');

    if(mysqli_connect_errno($con)){
        echo "connect fail" .mysqli_connect_error();
    }
?>