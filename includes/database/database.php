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
        try {
            $statement = $this->db->prepare("SELECT * FROM {$table}");
            $statement->execute();

            return $statement->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    /**
     * Retrieve data from the database
     * @param  string $sql
     * @return object
     */
    public function find($table, $id)
    {
        try {
            $statement = $this->db->prepare("SELECT * FROM {$table} where `id` = :id");

            $statement->execute(array(
                'id' => $id,
            ));

            return $statement->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

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
            echo $e->getMessage();
        }

    }

    /**
     * Update the specified row in the database.
     * @param  string $table
     * @param  array  $values
     * @param  int    $id
     * @return bool
     */
    public function update($table, $values = array(), $id)
    {
        try {
            $set = '';

            foreach($values as $key => $value) {
                $v = is_string($value) ? "\"$value\"" : $value;
                $set .= " {$key}={$v},";
            }

            $set = substr($set, 0, -1);

            $statement = $this->db->prepare("UPDATE {$table} SET{$set} WHERE id = :id");
            $statement->execute(array(
                'id' => $id
            ));

        } catch (PDOException $e) {
            echo $e->getMessage();
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
        try {
            $statement = $this->db->prepare('DELETE FROM {$table} WHERE id = `:id`;');
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }


    }

}