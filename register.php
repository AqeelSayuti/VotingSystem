<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin | Voting System</title>
 	

<?php include('./header.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");
?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    /*background: #007bff;*/
	}
	main#main{
		width:100%;
		height: calc(100%);
		background:white;
	}
	#login-right{
		position: absolute;
		right:0;
		width:40%;
		height: calc(100%);
		background:maroon;
		display: flex;
		align-items: center;
	}
	#login-left{
		position: absolute;
		left:0;
		width:60%;
		height: calc(100%);
		background:white
;
		display: flex;
		align-items: center;
	}
	#login-right .card{
		margin: auto
	}
	.logo {
    margin: auto;
    font-size: 8rem;
    background: white;
    padding: .5em 0.8em;
    border-radius: 50% 50%;
    color: #000000b3;
}
</style>

<body>


  <main id="main" class=" alert-info">
  		<div id="login-left">
  			<div class="logo">
  				<!-- <i class="fa fa-poll-h"></i> -->
				  <img src="kuptm.png" class="img-fluid" alt="Phone image">
  			</div>
  		</div>
  		<div id="login-right">
              <div class="card col-md-8">
                  <H1>Register Form |</H1>
  				<div class="card-body">
  					<form id="login-form" >
  						<div class="form-group">
  							<label for="name" class="control-label">Name</label>
  							<input type="text" id="name" name="name" class="form-control">
  						</div>
                          <div class="form-group">
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control">				
  						</div>
                          <div class="form-group">
  							<label for="cpassword" class="control-label">Repeat Password</label>
  							<input type="password" id="cpassword" name="cpassword" class="form-control">				
  						</div>
                        <div class="form-group">
			                <button class="btn btn-wave btn-primary">Register</button>
			                <a href="login.php" class="btn btn-wave btn-secondary" > Back to login </a>
		                </div>
  					</form>
  				</div>
  			</div>
  		</div>
   

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else if(resp == 2){
					location.href ='voting.php';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>