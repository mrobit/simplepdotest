<?php

require 'includes/database/database.php';

include 'header.php';

$db = new Database;

if ($_POST) {
    $post_data = array('name' => $_POST['name'], 'body' => $_POST['body']);
    $db->insert('posts', $post_data);
    header('location: /');
}

?>

<div class="span6 offset3">
    <form method="post">
        <label for="name">
            Post Name
        </label>
        <input type="text" name="name" value="" id="name">

        <label for="body">
            Post Body
        </label>
        <textarea id="body" name="body"></textarea>

        <input type="submit" value="Add Post" class="btn-block">
    </form>
</div>

<?php

include 'footer.php';

?>