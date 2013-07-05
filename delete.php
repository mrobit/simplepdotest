<?php

require 'includes/database/database.php';

include 'header.php';

$db = new Database;

if ($_POST) {
    echo 'wat';
    $id = $_POST['id'];

    $db->delete('posts', $id);
    header('location: /');
}

?>

<div class="span6 offset3 confirm">
    Are you really sure you want to delete this post?

    <form method="post">
        <input type="hidden" name="id" value="<?= $_GET['id']; ?> ">
        <input type="submit" class="warning btn-block" value="Do it.">
    </form>
</div>

<?php

include 'footer.php';

?>