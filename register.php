<?php
include_once "_partials/header.php";
use \Tamtamchik\SimpleFlash\Flash;

// register form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $password_repeat = $_POST['repeat'];

    $register = $auth->register($email, $password, $password_repeat);

    if ($register['error']) {
        myalert($register['message'], 'alert-warning');
    } else {
        myalert('Vitaj! Teraz zadaj do formulára rovnaké údaje pre prihlásenie!', 'alert-info');
        redirect('/login');
    }
}
?>

<form method="post" action="" class="box box-auth">
    <h2 class="box-auth-heading">
        Register, you dumbass
    </h2>

    <input type="email" value="" class="form-control" name="email" placeholder="Email Address" required autofocus>
    <input type="password" class="form-control" name="password" placeholder="Password" required>
    <input type="password" class="form-control" name="repeat" placeholder="Password again, DO IT" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>

    <p class="alt-action text-center">
        or <a href="<?= $base_url ?>/login.php">come inside (of me)</a>
    </p>
</form>

<?php include_once "_partials/footer.php" ?>