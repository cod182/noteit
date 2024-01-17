<?php
// Connect to DB and execute query
class Database
{
  // instance property
  public $connection;
  public $statement;

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
    $this->statement = $this->connection->prepare($queryString); // Preparing the statement to be sent to the server

    $this->statement->execute($params);
    // returning Database class
    return $this;
  }

  // function to fine one result in database
  public function find()
  {
    return $this->statement->fetch();
  }

  // function to finding one or aborting
  public function findOrFail()
  {
    $result = $this->find();
    if (!$result) {
      abort(Response::NOT_FOUND);
    }
    return $result;
  }

  // function to getting all results from database
  public function getAll()
  {
    return $this->statement->fetchAll();
  }
}
