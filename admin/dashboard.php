<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>
<br>
<br>
<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Questions
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> View Question
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-stripped">
                        <thead>
                            <tr>
                                <th>Question ID</th>
                                <th>Question</th>
                                <th>Answer id</th>
                                <th>Delete Question</th>
                                <th>Edit Question</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                $i = 0;
                                $get_q = "select * from questions";
                                $run_q = mysqli_query($con,$get_q);
                                while($row_q = mysqli_fetch_array($run_q)){
                                    $qid = $row_q['qid'];
                                    $question = $row_q['question'];
                                    $ans_id = $row_q['ans_id'];
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $qid; ?></td>
                                <td><?php echo $question; ?></td>
                                <td width="300"><?php echo $ans_id?></td>
                                <td>
                                    <a href="index.php?delete_q=<?php echo $qid; ?>">
                                        <i class="fa fa-trash-o"></i> Delete
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?edit_q=<?php echo $qid; ?>">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a href="adminlogout.php" class=" text-center btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>