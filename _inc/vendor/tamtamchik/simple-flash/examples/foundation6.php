<?php

use Tamtamchik\SimpleFlash\TemplateFactory;
use Tamtamchik\SimpleFlash\Templates;

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

flash()->error(['Invalid email!', 'Invalid username!'])
    ->warning('Warning message.')
    ->info('Info message.')
    ->success('Success message!');

flash()->setTemplate(TemplateFactory::create(Templates::FOUNDATION_6));

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Foundation 6 template example.</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.1.1/foundation.min.css">
</head>
<body>

<br/>

<div class="row" style="width: 600px;">

    <?php include_once '_menu.php'; ?>

    <hr />

    <?= flash() ?>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/foundation/6.1.1/js/foundation.min.js"></script>

</body>
</html>
