<?php

use App\App;

require "../vendor/autoload.php";
$users = App::getPDO()->query('SELECT * FROM users')->fetchAll();
$user = App::getAuth()->user();
require '../elements/header.php';
?>
    <h1>Accèder aux pages</h1>
    <?php if(isset($_GET['login'])) :?>
        <div class="alert alert-success">
            Vous êtes bien identifié
        </div>
    <?php endif ?>
    <?php if(isset($_GET['forbid'])) :?>
        <div class="alert alert-danger">
            Permission refusée
        </div>
    <?php endif ?>

    <?php if($user) :?>
        <p>
            Vous êtes connecté en tant que <?= $user->getUsername();?> -
            <a class="btn btn-warning" href="logout.php">Se déconnecter</a>
        </p>
    <?php endif ?>

    <ul>
        <li><a href="admin.php">Page réservée à l'administrateur</a></li>
        <li><a href="user.php">Page réservée à l'utilisateur connecté</a></li>
    </ul>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pseudo</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['role'] ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php require '../elements/footer.php' ?>