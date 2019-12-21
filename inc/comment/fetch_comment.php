<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 


<?php
    session_start();
    require_once 'conn.php';

$query = "
SELECT * FROM tbl_comment 
WHERE parent_comment_id = '0' && active='1'
ORDER BY comment_id DESC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{ 
  ?>
 <br>
 <div class="card card-default">
  <div class="card-heading bg-light"><b> &nbsp; &nbsp; <?php echo $row["comment_sender_name"]?></b><i class="float-right"><?php echo $row["date"]?></i></div>
  <div class="card">&nbsp; &nbsp; &nbsp; <?php echo $row["comment"]?>
    <div class="" align="right">
      <button type="button" class="btn btn-info btn-sm reply" id="<?php echo $row["comment_id"]?>"><span class="fa fa-reply"></span></button>
      <?php
        if($_SESSION['email'] == $row["sender_email"]){
      ?>
          <button onclick="delete_comment(<?php echo $row['comment_id']?>)" type="button" class="btn btn-danger btn-sm" id="<?php echo $row['comment_id']?>"><span class="fa fa-trash"></span></button>
      <?php
        }
      ?>
    </div>
  </div>
 </div>
 <?php
   
 $output .= get_reply_comment($connect, $row["comment_id"]);
}

echo $output;

function get_reply_comment($connect, $parent_id = 0, $marginleft = 0)
{
 $query = "
 SELECT * FROM tbl_comment WHERE parent_comment_id = '".$parent_id."' && active='1'
  ORDER BY `parent_comment_id` ASC";
 $output = '';
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $count = $statement->rowCount();
 if($parent_id == 0)
 {
  $marginleft = 0;
 }
 else
 {
  $marginleft = $marginleft + 48;
 }
 if($count > 0)
 {
  foreach($result as $row)
  {
    ?>
   <div class="card card-default" style="margin-left:<?php echo $marginleft?>px">
    <div class="card-heading bg-light"><b>  &nbsp; &nbsp; <?php echo $row["comment_sender_name"];?> </b><i class="float-right"> <?php echo $row["date"]; ?></i></div>
    <div class="card"> &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $row["comment"]; ?>
      <div align="right">
        <button type="button" class="btn btn-info btn-sm reply" id="<?php echo $row['comment_id']?>"><span class="fa fa-reply"></button>
        <?php
          if($_SESSION['email'] == $row["sender_email"]){
        ?>
          <button onclick="delete_comment(<?php echo $row['comment_id'] ?>)" type="button" class="btn btn-danger btn-sm" id="<?php echo $row["comment_id"]?>"><span class="fa fa-trash"></span></button>
        <?php
          }
        ?>
      </div>
    </div>
   </div>

   <?php
   
   $output .= get_reply_comment($connect, $row["comment_id"], $marginleft);
  }
 }
 return $output;
}

?>

<script type="text/javascript">
  function delete_comment(dltId){
      let cnfrm = confirm("Are you Sure?");
      if (cnfrm==true) {
            $.ajax({
                url: "inc/comment/delete.php",
                type: 'post',
                data: {id:dltId},
                success:function(data,status){
                    load_commentnn();
                }
            });
        }
  }


function load_commentnn(){
  $.ajax({
   url:"inc/comment/fetch_comment.php",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
}
</script>