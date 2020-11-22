<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>
<?php
    if(isset($_GET['edit_q'])){
        $edit_q = $_GET['edit_q'];
        $edit_cat = "select * from questions where qid='$edit_q'";
        $run_edit = mysqli_query($con,$edit_cat);
        $row_edit = mysqli_fetch_array($run_edit);
        $q_id = $row_edit['qid'];
        $q_question = $row_edit['question'];
        $q_ansid = $row_edit['ans_id'];
    }
?>
<br>
<br>
<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Dashboard / Edit Question
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Edit Question
                </h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Question</label>
                        <textarea type="text" name="question" class="form-control">
                                <?php echo $q_question; ?>
                            </textarea>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Ans id</label>
                        <div class="col-md-6">
                            <input type="number" name="ans_id" class="form-control" value="<?php echo $q_ansid; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="update" value="submit" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['update'])){
        $cat_question = $_POST['question'];
        $cat_ansid = $_POST['ans_id'];
        $update_cat = "update questions set question='$cat_question', ans_id='$cat_ansid' where qid='$q_id'";
        $run_cat = mysqli_query($con,$update_cat);
        if($run_cat){
            echo "<script>alert('Question Updated Successfully')</script>";
            echo "<script>window.open('index.php?dashboard','_self')</script>";
        }
    }
?>
<?php } ?>