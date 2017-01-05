<?php
try {
    $page = get_page(1);
} catch (PDOException $e) {
    // also handle errors maybe
    $results = [];
}

include_once "_partials/header.php";
include "_partials/jumbotron.php";
?>

<section class="box">
    <article class="page full-post">

        <header class="post-header">
            <h1 class="box-heading">
                <?= $page['title'] ?>
            </h1>
        </header>

        <div class="post-content">
            <?= $page['text'] ?>
        </div>

    </article>
</section>


<?php include "_partials/footer.php" ?>
