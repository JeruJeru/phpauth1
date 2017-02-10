<?php
try {
    $page = get_page(segment(2), false);
} catch (PDOException $e) {
    $page = false;
}

include "_partials/header.php";

if (!$page) {
    flash()->info('stránka neexistuje :-(');
    redirect('/');
}
?>

<section class="box">
    <form action="<?= BASE_URL ?>/_admin/edit-item.php" method="post" class="post">
        <header class="post-header">
            <h2 class="box-heading">
                Edit &ldquo;<?= plain($page['title']) ?>&rdquo;
            </h2>
        </header>

        <div class="form-group">
            <input type="text" name="title" class="form-control" value="<?= $page['title'] ?>" placeholder="title your shit">
        </div>

        <div class="form-group">
            <textarea class="form-control" name="text" rows="16" placeholder="write your shit"><?= $page['text'] ?></textarea>
        </div>

        <div class="form-group">
            <input name="page_id" value="<?= $page['id'] ?>" type="hidden">
            <button type="submit" class="btn btn-primary">Edit post</button>
            <span class="or">
                or <a href="<?= get_post_link($page) ?>">cancel</a>
            </span>
        </div>
    </form>
</section>

<?php include_once "_partials/footer.php" ?>