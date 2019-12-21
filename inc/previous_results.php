

<center>
<!-- The Modal -->
<div class="modal fade" id="myModal" style="width: 80%;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="color:white; background:linear-gradient(57deg,#1e4d92,#00c6a7);">
        <h4 class="modal-title">Previous Results</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="color:white; background:linear-gradient(57deg,#00c6a7,#1e4d92);">
        <table class="table table-hover text-center">
          <tr class="bg-secondary text-white">
            <th>Date</th>
            <th>Question Type</th>
            <th>Question Level</th>
            <th>Total Questions</th>
            <th>Correct Answers</th>
            <th>Wrong Answers</th>
            <th>Percentage</th>
          </tr>

          <?php
              $email=$_SESSION['email'];
              $password=$_SESSION['password'];
              $query = "SELECT * FROM `participants` WHERE email='$email' && password='$password' ORDER BY `id` DESC ";
              $query_run = mysqli_query($con,$query);
              $numRows = mysqli_num_rows($query_run);
              if ($numRows) {
                while ($row = mysqli_fetch_array($query_run)) {
          ?>
          <tr>
            <td><?php echo $row['date'];?></td>
            <td><?php echo $row['quest_type'];?></td>
            <td><?php echo $row['level'];?></td>
            <td><?php echo $row['total_quest'];?></td>
            <td><?php echo $row['corr_ans'];?></td>
            <td><?php echo $row['wrong_ans'];?></td>
            <td><?php echo $row['percentage'];?></td>
          </tr>
          <?php
                }
              }else{
                  echo "<tr><td colspan='7'><h3 style='color:red;'>No Result found</h3></td></tr>";
              }
          ?>


        </table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" style="color:white; background:linear-gradient(57deg,#1e4d92,#00c6a7);">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</center>