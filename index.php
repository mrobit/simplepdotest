<?php

require 'includes/HtmlBuilder.php';
require 'includes/database/database.php';

include 'header.php';
?>

<?php

$db = new Database;

$posts = $db->get('posts');

?>

<?php if (count($posts)): ?>

    <table class="posts">
        <thead>
            <tr>
                <td>
                    Post Title
                </td>
                <td>
                    Post Body
                </td>
                <td>
                    Actions
                </td>
            </tr>
        </thead>

        <tbody>
            <?php $count = 1; ?>

            <?php foreach($posts as $post): ?>
                <?php $stripe = $count % 2 == 1 ? 'odd' : 'even'; ?>
                <tr class="<?= $stripe; ?>">
                    <td><?= $post['name']; ?></td>
                    <td><?= $post['body']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $post['id']; ?>" class="edit">Edit</a>
                        <a href="delete.php?id=<?= $post['id']; ?>" class="edit">Delete</a>
                    </td>
                </tr>
                <?php $count++; ?>
            <?php endforeach; ?>

        </tbody>

    </table>

<?php else : ?>
    There are no posts to display.
<?php endif; ?>