<?php

$id = segment(2);

try {
    $page = get_page($id);
} catch (PDOException $e) {
    // also handle errors maybe
    $results = [];
}

include_once "_partials/header.php";
?>

<section class="box">
    <article class="page full-post">

        <header class="post-header">
            <h1 class="box-heading">
                <?= $page['title'] ?>
            </h1>
            <?php if ($auth->isLogged()) echo '<a href="' . BASE_URL . '/edit/' . $page['id'] . '">edit</a>' ; ?>
        </header>

        <div class="post-content">
            <?= $page['text'] ?>
        </div>

    </article>
</section>


<?php include "_partials/footer.php" ?>
