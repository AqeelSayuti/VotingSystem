<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Admin | Voting System</title>

	<?php include('./header.php'); ?>
	<?php
	session_start();
	if (isset($_SESSION['login_id']))
		header("location:index.php?page=home");
	?>

</head>
<style>
	body {
		width: 100%;
		height: calc(100%);
		/*background: #007bff;*/
	}

	main#main {
		width: 100%;
		height: calc(100%);
		background: white;
	}

	#login-right {
		position: absolute;
		right: 0;
		width: 40%;
		height: calc(100%);
		background: maroon;
		display: flex;
		align-items: center;
	}

	#login-left {
		position: absolute;
		left: 0;
		width: 60%;
		height: calc(100%);
		background: white;
		display: flex;
		align-items: center;
	}

	#login-right .card {
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

	/* Password checker */
	form .indicator {
		height: 10px;
		display: flex;
		align-items: center;
		justify-content: space-between;
		margin: 10px 0;
		display: none;
	}

	form .indicator span {
		width: 100%;
		height: 100%;
		background: lightgrey;
		border-radius: 5px;
		position: relative;
	}

	form .indicator span.medium {
		margin: 0 3px;
	}

	form .indicator span:before {
		content: '';
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		border-radius: 5px;
	}

	form .indicator span.active.weak:before {
		background-color: #ff4757;
	}

	form .indicator span.active.medium:before {
		background-color: orange;
	}

	form .indicator span.active.strong:before {
		background-color: #23ad5c;
	}

	form .text {
		font-size: 1rem;
		font-weight: 600;
		margin-bottom: -10px;
		display: none;
	}

	form .text.weak {
		color: #ff4757;
	}

	form .text.medium {
		color: orange;
	}

	form .text.strong {
		color: #23ad5c;
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
				<H1>Register Form</H1>
				<div class="card-body">
					<form id="register-form">
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
							<input onkeyup="trigger()" type="password" id="password" name="password" class="form-control">
							<div class="indicator">
								<span class="weak"></span>
								<span class="medium"></span>
								<span class="strong"></span>
							</div>
							<div class="text"></div>
						</div>
						<div class="form-group">
							<label for="cpassword" class="control-label">Repeat Password</label>
							<input type="password" id="cpassword" name="cpassword" class="form-control">
						</div>
						<div class="form-group">
							<button class="btn btn-wave btn-primary">Register</button>
							<a href="login.php" class="btn btn-wave btn-secondary"> Back to login </a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
	<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
</body>
<script>
	$('#register-form').submit(function(e) {
		e.preventDefault()
		$('#register-form button[type="button"]').attr('disabled', true).html('Registering...');
		if ($(this).find('.alert-danger').length > 0)
			$(this).find('.alert-danger').remove();
		$.ajax({
			url: 'ajax.php?action=register',
			method: 'POST',
			data: $(this).serialize(),
			error: err => {
				console.log(err)
				$('#register-form button[type="button"]').removeAttr('disabled').html('Register');

			},
			success: function(resp) {
				if (resp == 1) {
					location.href = 'login.php';
					$('#login-form').prepend('<div class="alert alert-danger">Register Success</div>')
				} else if (resp == 2) {
					location.href = 'voting.php';
				} else if (resp == 3) {
					$('#register-form').prepend('<div class="alert alert-danger">Password not match.</div>')
				} else if (resp == 4) {
					$('#register-form').prepend('<div class="alert alert-danger">Please fill all fields</div>')
				} else {
					$('#register-form').prepend('<div class="alert alert-danger">Something wrong.</div>')
					$('#register-form button[type="button"]').removeAttr('disabled').html('Register');
				}
			}
		})
	})
</script>

<script>
	const indicator = document.querySelector(".indicator");
	const input = document.querySelector("#password");
	const weak = document.querySelector(".weak");
	const medium = document.querySelector(".medium");
	const strong = document.querySelector(".strong");
	const text = document.querySelector(".text");
	let regExpWeak = /[a-z]/;
	let regExpMedium = /\d+/;
	let regExpStrong = /.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/;

	function trigger() {
		if (input.value != "") {
			indicator.style.display = "block";
			indicator.style.display = "flex";
			if (input.value.length <= 3 && (input.value.match(regExpWeak) || input.value.match(regExpMedium) || input.value.match(regExpStrong))) no = 1;
			if (input.value.length >= 6 && (input.value.match(regExpWeak) && input.value.match(regExpMedium)) || (input.value.match(regExpMedium) && input.value.match(regExpStrong)) || (input.value.match(regExpWeak) && input.value.match(regExpStrong))) no = 2;
			if (input.value.length >= 6 && input.value.match(regExpWeak) && input.value.match(regExpMedium) && input.value.match(regExpStrong)) no = 3;

			if (no == 1) {
				weak.classList.add("active");
				text.style.display = "block";
				text.textContent = "Your password is too weak";
				text.classList.add("weak");
			}
			if (no == 2) {
				medium.classList.add("active");
				text.textContent = "Your password is medium";
				text.classList.add("medium");
			} else {
				medium.classList.remove("active");
				text.classList.remove("medium");

			}

			if (no == 3) {
				medium.classList.add("active");
				strong.classList.add("active");
				text.textContent = "Your password is strong";
				text.classList.add("strong");
			} else {
				strong.classList.remove("active");
				text.classList.remove("strong");

			}

		} else {
			indicator.style.display = "none";
			text.style.display = "none";
		}
	}
</script>

</html>