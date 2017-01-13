<?php

/**
 * Plain
 *
 * Escape (though not from New York)
 *
 * @param  string $str
 * @return string
 */
function plain($str) {
    return htmlspecialchars($str, ENT_QUOTES);
}


/**
 * Format Page
 *
 * Cleans up, sanitizes, formats and generally prepares DB post for displaying
 *
 * @param   $items
 * @return  array
 */
function format_items_page($items) {
    // trim dat shit
    $items = array_map('trim', $items);

    // clean it up
    $items['title'] = plain($items['title']);
    // $items['text'] = plain($items['text']);
// format text
    $items['text'] = add_paragraphs($items['text']);

    return $items;
}


/**
 * Add Paragraphs
 *
 * Adds line breaks into text
 * And breaks it into paragraphs as needed
 *
 * @param  string  $str
 * @return mixed|string
 */
function add_paragraphs($str) {
    // Trim whitespace
    if (($str = trim($str)) === '')
        return '';

    // Standardize newlines
    $str = str_replace(array("\r\n", "\r"), "\n", $str);

    // Trim whitespace on each line
    $str = preg_replace('~^[ \t]+~m', '', $str);
    $str = preg_replace('~[ \t]+$~m', '', $str);

    // The following regexes only need to be executed if the string contains html
    if ($html_found = (strpos($str, '<') !== FALSE)) {
        // Elements that should not be surrounded by p tags
        $no_p = '(?:p|div|article|header|aside|hgroup|canvas|output|progress|section|figcaption|audio|video|nav|figure|footer|video|details|main|menu|summary|h[1-6r]|ul|ol|li|blockquote|d[dlt]|pre|t[dhr]|t(?:able|body|foot|head)|c(?:aption|olgroup)|form|s(?:elect|tyle)|a(?:ddress|rea)|ma(?:p|th))';

        // Put at least two linebreaks before and after $no_p elements
        $str = preg_replace('~^<' . $no_p . '[^>]*+>~im', "\n$0", $str);
        $str = preg_replace('~</' . $no_p . '\s*+>$~im', "$0\n", $str);
    }

    // Do the <p> magic!
    $str = '<p>' . trim($str) . '</p>';
    $str = preg_replace('~\n{2,}~', "</p>\n\n<p>", $str);

    // The following regexes only need to be executed if the string contains html
    if ($html_found !== FALSE) {
        // Remove p tags around $no_p elements
        $str = preg_replace('~<p>(?=</?' . $no_p . '[^>]*+>)~i', '', $str);
        $str = preg_replace('~(</?' . $no_p . '[^>]*+>)</p>~i', '$1', $str);
    }

    // Convert single linebreaks to <br />
    $str = preg_replace('~(?<!\n)\n(?!\n)~', "<br>\n", $str);

    return $str;
}
