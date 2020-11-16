<?php

class Database
{
    public function getConnection(): mysqli
    {
        $connection = mysqli_connect("database", "root", "password", "Database");
        if (empty($connection)) {
            throw new Exception("Failed to connect to database");
        }
        return $connection;
    }
}