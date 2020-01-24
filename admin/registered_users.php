<table class="table table-hover text-center table-responsive">
  <tr class="bg-dark text-light">
    <th>DATE</th>
    <th>ID</th>
    <th>NAME</th>
    <th>E-MAIL</th>
    <th>Password</th>
    <th>College</th>
    <th>Course</th>
    <th>Action</th>
  <tr>
<?php
    $query = " SELECT * FROM `register` ORDER BY id DESC ";
    $queryRun = mysqli_query($con,$query);
    $result = mysqli_num_rows($queryRun);
    if($result){
      while($row=mysqli_fetch_assoc($queryRun)){
?>
       <tr>
        <td><?php echo $row['date'];?></td>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['password'];?></td>
        <td><?php echo $row['college'];?></td>
        <td><?php echo $row['course'];?></td>
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
                    window.location="?page=zupdate_user";
                    </script>
                ';
            }
            ?>
            &emsp;
                <form action="?page=zdelete_user" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>
                </form>
          </div>
        </td>
       </tr>
<?php
      }
    }else{
        echo "<h3>EMPTY</h3>";
    }

?>
</table>