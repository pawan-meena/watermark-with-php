 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>MansaInfotech</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="images/favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
		<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
		<script src="https://unpkg.com/dropzone"></script>
		<script src="https://unpkg.com/cropperjs"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time();?>">
</head>
<body>









 <?php
 $servername = "localhost";
$username = "root";
$password = "";
$db = "mansainfotech";
$conn = new mysqli($servername, $username, $password, $db);
mysqli_set_charset($conn,'utf8');
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['submit'])) {

	$smpassword=password_hash($_POST['password'], PASSWORD_BCRYPT);
$em="SELECT * FROM mansainfotech WHERE email='{$_POST['email']}'";
$query=mysqli_query($conn,$em);
$ec=mysqli_num_rows($query);
if ($ec==0) { 
$em="SELECT * FROM mansainfotech WHERE username='{$_POST['username']}'";
$query=mysqli_query($conn,$em);
$ec=mysqli_num_rows($query);
if ($ec==0) { 
$sqlii = "INSERT INTO `mansainfotech` (`username`,`email`,`password`,`profile_pic`,`Full_Name`) VALUES ('".$_POST['username']."','".$_POST['email']."','".$smpassword."','".$_POST['imgname']."','".$_POST['fullname']."')"; 
   mysqli_query($conn,$sqlii);
?> <script type="text/javascript">
	
$(document).ready(function(){
    $("#cc").trigger("click");
});

</script> <?php
}else{
  ?> <script type="text/javascript">alert("please Choose another username")</script> <?php
}
}else{
    ?> <script type="text/javascript">alert("this email exist")</script> <?php
}
}

?>


<?php $msg ='login';
$d1='';

if (isset($_POST['send'])) {
$em="SELECT * FROM mansainfotech WHERE username='{$_POST['user']}'";
$query=mysqli_query($conn,$em);
$ec=mysqli_num_rows($query);
if ($ec==1) { 
$emailpass=mysqli_fetch_assoc($query);
$pass=$emailpass['password'];
$passv=password_verify($_POST['pass'],$pass);
}
if ($passv==1) {

$msg ="okay your Login";
$d1='d-none';

?> <script type="text/javascript">
	
$(document).ready(function(){
    $("#cc").trigger("click");
});

</script> <?php
}

}



?>


<div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <form method="post">
  <div class="modal-dialog" role="document">
  	
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><?php echo$msg ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5 <?php echo$d1; ?>">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="form3" name="user" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form3">username</label>
        </div>

        <div class="md-form mb-4 <?php echo$d1; ?>">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="text" id="form2"  name = "pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form2">password</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" name="send" class="btn btn-success">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
      </div>
    </div>
  </div>
  </form>
</div>



<div class="text-center">
  <a id="cc" href="" class="" data-toggle="modal" data-target="#modalSubscriptionForm"></a>
</div>
















<div class="container row font-regular ">
	<div class="col-3"></div>
	<div class="col-6">
	<br>
	<h3>Register Now!</h3>
	<br>
<form method="post" enctype="multipart/form-data">
	<input type="hidden" id="imgname" name="imgname">
  <div class="form-group">
    <label for="exampleFormControlInput1">Full Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="fullname" minlength="5" name="fullname" maxlength="40" required>
  </div>
<div class="form-group">
    <label for="exampleFormControlInput2">Username</label>
    <input type="text" name="username" minlength="5" maxlength="40" class="form-control" id="exampleFormControlInput2" placeholder="Username" required>
  </div>
<div class="form-group">
    <label for="exampleFormControlInput3">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleFormControlInput3" placeholder="name@example.com" minlength="5" maxlength="40" required>
  </div>
<div class="form-group">
    <label for="exampleFormControlInput4">Password
</label>
    <input type="Password" minlength="5" maxlength="40" class="form-control" id="exampleFormControlInput4" name="password" placeholder="Password" required>
  </div>
<label for="upload_image">

	 Profile add
						<img width="150px" src="images/favicon.png" id="uploaded_image" class="img-circle img-rounded" />
								<div class="overlay">
									<div class="text">Click to Change Profile Image</div>
								</div>
								<input type="file" accept="image/gif, image/jpeg, image/png" name="image" class="image" id="upload_image" style="display:none" required />
							</label>
<br> <br>
<div class="form-group">
    <button type="submit" name="submit" class="btn btn-success"> submit </button>
  </div>

</form>
</div>
<div class="col-3"></div>
</div>
<div class="container" align="center">
			<div class="row">
    		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			  	<div class="modal-dialog modal-lg" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title">Crop Image Before Upload</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">×</span>
			        		</button>
			      		</div>
			      		<div class="modal-body">
			        		<div class="img-container">
			            		<div class="row">
			                		<div class="col-md-8">
			                    		<img src="" id="sample_image" />
			                		</div>
			                		<div class="col-md-4">
			                    		<div class="preview"></div>
			                		</div>
			            		</div>
			        		</div>
			      		</div>
			      		<div class="modal-footer">
			      			<button type="button" id="crop" class="btn btn-primary">Crop</button>
			        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			      		</div>
			    	</div>
			  	</div>
			</div>			
		</div>
</div>
<script>
$(".custom-file-input").on("change", function() {
 if(this.files[0].size > 5242880){
       alert("File is too big!");
       this.value = "";
    };
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
$(document).ready(function(){

	var $modal = $('#modal');

	var image = document.getElementById('sample_image');

	var cropper;

	$('#upload_image').change(function(event){
		var files = event.target.files;

		var done = function(url){
			image.src = url;
			$modal.modal('show');
		};

		if(files && files.length > 0)
		{
			reader = new FileReader();
			reader.onload = function(event)
			{
				done(reader.result);
			};
			reader.readAsDataURL(files[0]);
		}
	});

	$modal.on('shown.bs.modal', function() {
		cropper = new Cropper(image, {
			aspectRatio: 1,
			viewMode: 3,
			preview:'.preview'
		});
	}).on('hidden.bs.modal', function(){
		cropper.destroy();
   		cropper = null;
	});

	$('#crop').click(function(){
		canvas = cropper.getCroppedCanvas({
			width:400,
			height:400
		});

		canvas.toBlob(function(blob){
			url = URL.createObjectURL(blob);
			var reader = new FileReader();
			reader.readAsDataURL(blob);
			reader.onloadend = function(){
				var base64data = reader.result;
				$.ajax({
					url:'upload.php',
					method:'POST',
					data:{image:base64data},
					success:function(data)
					{
				
					    $modal.modal('hide');
$('#imgname').val(data);
						$('#uploaded_image').attr('src', data);
					}
				});
			};
		});
	});
	
});



















</script>
</body>
</html>








