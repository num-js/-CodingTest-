<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

<div class="container">
  <hr>
  <p align="">Any Error/Mistake/Comment/FeedBack</p>
    <div class="row">
      <div class="col-lg-6 col-sm-12 f-left">
       <form method="POST" id="comment_form" class="form">
        <div class="form-group  shadow-textarea">
         <input type="hidden" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Name" value="<?php echo $_SESSION['name']; ?>" required>
        </div>
        <div class="form-group">
         <textarea name="comment_content" id="comment_content" class="form-control fixed-div-top " rows="5" placeholder="Any Error/Mistake/Comment/FeedBack"></textarea>
        </div>
        <div class="form-group">
         <input type="hidden" name="comment_id" id="comment_id" value="0">
         <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit">
           
        </div>
       </form>
      </div> 
      <div style="overflow:auto; height:800px;" id="display_comment" class="col-lg-6 col-sm-12 f-right"></div>
    </div>

</div>
<br>

 </body>
</html>

<script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"inc/comment/add_comment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"inc/comment/fetch_comment.php",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_content').focus();
 });
 
});


</script>