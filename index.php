<?php

require 'includes/HtmlBuilder.php';
require 'includes/database/database.php';

?>

<?php

$database = new Database;

/**
 * Finding a row in the database.
 */
// $posts = $database->find('posts', 1);

/**
 * Inserting values into the database.
 */
// $values = array('name' => 'Inserted Post', 'body' => 'Inserted Body');
// $status = $database->insert('posts', $values);

/**
 * Deleting a row from the database.
 */

// $database->delete('posts', 6);

/**
 * Updating a row in the database.
 */

// $database->update('posts', array('name' => 'new name', 'body' => 'new body'), 12);