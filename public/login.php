<?php
require "../vendor/autoload.php";

use App\App;

	session_start();
	$error = false;

	$auth = App::getAuth();
	if($auth->user())
	{
		header("Location: index.php");
		exit();
	}
	if(!empty($_POST['login']) && !empty($_POST['password']))
	{
		$user = $auth->login(htmlentities($_POST['login']),htmlentities($_POST['password']));
		if($user)
		{
			header("Location: index.php?login=1");
			exit();
		} 
		$error = true;
	}
	
	require '../elements/header.php';
?>

<div class="container mt-5">
	<h1>Se connecter</h1>
	<?php if($error):?>
		<div class="alert alert-danger">
			Mot de passe ou pseudo erronés.
		</div>
	<?php endif ?>

	<form action="" method="post" class="mt-3">
		<div class="mb-3">
			<input type="text" name="login" id="login" class="form-control" placeholder="Votre pseudo">
		</div>
		<div class="mb-3">
			<input type="password" name="password" id="password" class="form-control" placeholder="Votre mot de passe">
		</div>
		<button type="submit" class="btn btn-primary">Se connecter</button>
	</form>

</div>
<?php require '../elements/footer.php' ?>