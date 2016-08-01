<?php include('../app/views/includes/header.php') ?>


	<!-- Log in Form -->
	<div class="row">
		
		<h1>Admin log in</h1>
		<?php if ($data) : ?>
			<p class="warning"><?= $data[0];  ?></p>
		<?php endif; ?>
		<br>
		<form id="sign_in" method="post" action=""> 
			<p> <input type="text" name="email" id="email" placeholder="E-mail"> </p>
			<p> <input type="password" name="password" id="password" placeholder="Password"> </p>
			<p>	<input type="submit" name="sign_in" value="Sign in"> </p> 
		</form>

	</div>


<?php include('../app/views/includes/footer.php') ?>
