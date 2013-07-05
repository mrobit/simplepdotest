<?php

require 'includes/HtmlBuilder.php';
require 'includes/database/database.php';

$db = new Database;

$post  = $db->find('posts', $_GET['id'])[0];

$title = $post['name'];
$body  = $post['body'];

include 'header.php';

if ( $_POST ) {
    $post_data = array('name' => $_POST['name'], 'body' => $_POST['body']);
    $db->update('posts', $post_data, $_GET['id']);
}

?>

<form method="post">

    <label for="name">Post Title</label>
    <input type="text" value="<?= $title; ?>" name="name" id="name">

    <label for="body">Post Body</label>
    <textarea name="body" id="body"><?= $body; ?></textarea>

    <input type="submit" value="Update Post">

</form>

<?php include 'footer.php'; ?>