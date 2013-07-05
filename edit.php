<?php

require 'includes/HtmlBuilder.php';
require 'includes/database/database.php';

$db = new Database;

$post = $db->find('posts', $_GET['id'])[0];
$title = $post['name'];
$body  = $post['body'];

?>

<form method="post">

    <label for="post_title">Post Title</label>
    <input type="text" value="<?= $title; ?>" name="post_title" id="post_title">

    <label for="post_body">Post Body</label>
    <textarea name="post_body" id="post_body">
        <?= $body; ?>
    </textarea>

    <input type="submit" value="Update Post">

</form>