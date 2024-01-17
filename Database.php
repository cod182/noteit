<?php
// Connect to DB and execute query
class Database
{
  // instance property
  public $connection;

  // Constructor runs as soon as instance created
  public function __construct($config, $username = 'root', $password = '')
  {
    $dsn = 'mysql://' . http_build_query($config, '', ';');

    // Set this->connection instance property
    $this->connection = new PDO($dsn, $username, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
  }
  // Query function to execute query
  public function query($queryString, $params = [])
  {
    $statement = $this->connection->prepare($queryString); // Preparing the statement to be sent to the server

    $statement->execute($params);

    return $statement;
  }
}
