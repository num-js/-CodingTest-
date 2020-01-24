<table class="table table-hover text-center table-responsive table-fixed"  style="height:420px; tablel-layout:fixed;">
  <thead>
  <tr class="bg-dark text-white" style="">
    <th>DATE</th>
    <th>ID</th>
    <th>NAME</th>
    <th>E-MAIL</th>
    <th>Password</th>
    <th>Question Type</th>
    <th>Level</th>
    <th>Total Question</th>
    <th>Attempted</th>
    <th>Correct Answers</th>
    <th>Wrong Answers</th>
    <th>Not Attempted</th>
    <th>Percentage</th>
    <th>Action</th>
  <tr>
  </thead>

<?php
    $query = " SELECT * FROM `participants` ORDER BY id DESC ";
    $queryRun = mysqli_query($con,$query);
    $result = mysqli_num_rows($queryRun);
    if($result){
      while($row=mysqli_fetch_assoc($queryRun)){
?>

      <tbody>
       <tr>
        <td><?php echo $row['date'];?></td>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['password'];?></td>
        <td><?php echo $row['quest_type'];?></td>
        <td><?php echo $row['level'];?></td>
        <td><?php echo $row['total_quest'];?></td>
        <td><?php echo $row['attempted'];?></td>
        <td><?php echo $row['corr_ans'];?></td>
        <td><?php echo $row['wrong_ans'];?></td>  
        <td><?php echo $row['no_attempt'];?></td>  
        <td><?php echo $row['percentage'];?></td>  
        <td>
          <div class="row">
            <form action="" method="post">
                <input type="hidden" name="uid" value="<?php echo $row['id']; ?>">
                <button type="submit" name="edit" class="btn btn-warning btn-sm"><span class="fa fa-edit"></span></button>
            </form>
            <?php

            if(isset($_POST['edit'])){
                echo $uid = $_POST['uid'];
                $_SESSION['uid'] = $uid;              
                
                echo '
                    <script>
                    window.location="?page=participant_update";
                    </script>
                ';
            }
            ?>
            &emsp;
                <form action="?page=participant_delete" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>
                </form>
          </div>
        </td>
       </tr>
      </tbody>

<?php
      }
    }else{
        echo "<h3>EMPTY</h3>";
    }

?>
</table>