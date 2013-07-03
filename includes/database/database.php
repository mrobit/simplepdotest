<?php

class Database {

    private $db;

    /**
     * Creates a new database instance.
     */
    public function __construct()
    {
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=phpblog',
                           'phpblogadmin',
                           'phpblog');

            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db = $dbh;
        } catch ( PDOException $e ) {
            echo $e->getMessage();
        }
    }

    /**
     * Get all rows from the table.
     * @param  string $table
     * @return array
     */
    public function get($table)
    {
        $statement = $this->db->prepare("SELECT * FROM $table");
        $statement->execute();

        return $statement->fetchAll();
    }

    /**
     * Retrieve data from the database
     * @param  string $sql
     * @return object
     */
    public function find($table, $id)
    {

        $id = 1;
        $statement = $this->db->prepare("SELECT * FROM {$table} where `id` = :id");

        $statement->execute(array(
            'id' => $id,
        ));

        return $statement->fetchAll();
    }

    /**
     * Insert data into the database.
     * @param  string $sql
     * @param  array  $values
     * @return bool
     */
    public function insert($table, $values = array())
    {
        try {
            // Getting the column names to insert into.
            $columns = implode(',', array_keys($values));

            $statement = $this->db->prepare("INSERT INTO {$table}( {$columns} ) VALUES(:name, :body)");
            $success = $statement->execute($values);
        } catch (PDOException $e) {
            echo $e->errorMessage();
        }

    }

    /**
     * Delete a row from the table.
     * @param  string $table
     * @param  int $id
     * @return bool
     */
    public function delete($table, $id)
    {
        $statement = $this->db->prepare('DELETE FROM {$table} WHERE id = `:id`;');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }

}