<?php

use App\App;

	require '../vendor/autoload.php';
	$auth = App::getAuth()->requireRole('user', 'admin');
	require '../elements/header.php';
?>
<p>
	<a href="index.php">Home</a>
	<a class="ml-5 btn btn-warning" href="logout.php">Se déconnecter</a>
</p>
<div class="container mt-5">
	<h1 class="mb-5">Réservé à l'utilisateur</h1>

	<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, iure ad. Eius, inventore? Eligendi rerum exercitationem est commodi harum excepturi! Architecto exercitationem totam pariatur voluptatibus quaerat, quasi excepturi praesentium a!</p>
	<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, iure ad. Eius, inventore? Eligendi rerum exercitationem est commodi harum excepturi! Architecto exercitationem totam pariatur voluptatibus quaerat, quasi excepturi praesentium a!</p>
	<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, iure ad. Eius, inventore? Eligendi rerum exercitationem est commodi harum excepturi! Architecto exercitationem totam pariatur voluptatibus quaerat, quasi excepturi praesentium a!</p>
</div>
<?php require '../elements/footer.php' ?>