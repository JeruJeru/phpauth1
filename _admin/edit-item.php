<?php

// include
require '../_inc/config.php';


$title = filter_var ( $_POST['title'], FILTER_SANITIZE_STRING );
$text = filter_var ( $_POST['text'], FILTER_SANITIZE_STRING );
$page_id = filter_var ( $_POST['page_id'], FILTER_SANITIZE_NUMBER_INT );


// add new title and text
$update_page = $db->prepare("
		UPDATE website_pages SET
			title = :title,
			text  = :text
		WHERE
			id = :page_id
	");

$update_page->execute([
    'title' => $title,
    'text' => $text,
    'page_id' => $page_id
]);


// redirect
if ($update_page->rowCount()) {
    //flash()->success('yay, changed it!');
    redirect('/page/'.$page_id);
}

//flash()->warning('sorry, girl');
redirect('back');
