<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>
<?php
    if(isset($_GET['delete_q'])){
        $delete_id = $_GET['delete_q'];
        $delete_q = "delete from questions where qid='$delete_id'";
        $run_delete = mysqli_query($con,$delete_q);
        if($run_delete){
            echo "<script>alert('Question has been Deleted.')</script>";
            echo "<script>window.open('index.php?dashboard','_self')</script>";
        }
    }
    ?>
<?php } ?>