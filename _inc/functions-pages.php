<?php

/**
 * Get PageTitle
 *
 *
 */
function get_page($id_page = 0) {

    // if id no $id_page
    if (!$id_page) {
        return false;
    }

    // $id_page must be integer
    if (!filter_var($id_page, FILTER_VALIDATE_INT)) {
        return false;
    }

    global $db;

    $query = $db->prepare("SELECT * FROM website_pages WHERE id = :id");
    $query->execute([ 'id' => $id_page]);

    if ($query->rowCount() === 1) {
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $result = format_items_page($result, true);
    } else {
        $result = [];
    }

    return $result;
}
