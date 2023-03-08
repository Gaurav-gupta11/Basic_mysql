<?php

/**
 * @file
 * Provides a class to handle database operations.
 */

/**
 * Class to handle database operations.
 */
class Database {

  /**
   * The database host.
   *
   * @var string
   */
  public $host;

  /**
   * The database username.
   *
   * @var string
   */
  public $username;

  /**
   * The database password.
   *
   * @var string
   */
  public $password;

  /**
   * The database name.
   *
   * @var string
   */
  public $database;

  /**
   * The database connection object.
   *
   * @var mysqli
   */
  public $conn;

  /**
   * Constructor for the Database class.
   *
   * @param string $host
   *   The database host.
   * @param string $username
   *   The database username.
   * @param string $password
   *   The database password.
   * @param string $database
   *   The database name.
   */
  public function __construct($host, $username, $password, $database) {
    $this->host = $host;
    $this->username = $username;
    $this->password = $password;
    $this->database = $database;
  }

  /**
   * Connect to the database.
   *
   * @return mysqli|false
   *   The database connection object or false on failure.
   */
  public function connect() {
    $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    if (!$this->conn) {
      return FALSE;
    }
    return $this->conn;
  }

  /**
   * Execute a database query.
   *
   * @param string $query
   *   The query to execute.
   *
   * @return mysqli_result
   *   The result object or false on failure.
   */
  public function query($query) {
    return mysqli_query($this->conn, $query);
  }

  /**
   * Fetch data from a result object.
   *
   * @param mysqli_result $result
   *   The result object.
   *
   * @return array
   *   The data array.
   */
  public function fetch($result) {
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
    }
    return $data;
  }

  /**
   * Close the database connection.
   */
  public function close() {
    mysqli_close($this->conn);
  }

}

// Create a new instance of the Database class.
$database = new Database('localhost', 'gaurav', 'Gaurav@123', 'IPLMatch');

// Connect to the database.
$conn = $database->connect();

// Check if connection was successful.
if (!$conn) {
  die("Sorry we failed to connect: " . mysqli_connect_error());
}

// Define the query.
$query = "SELECT t2.venue_name , t1.match_date , t3.name AS team1 , t4.name AS team2, t3.captain AS t1captain, t4.captain AS t2captain , t5.name as tosswonby, t6.name as matchwonby
          FROM matches t1
          INNER JOIN venues t2 ON t1.venue_id = t2.id
          INNER JOIN teams t3 ON t1.team1_id = t3.id
          INNER JOIN teams t4 ON t1.team2_id = t4.id
          INNER JOIN teams t5 ON t1.toss_won_by_team_id = t5.id
          LEFT JOIN teams t6 ON t1.match_won_by_team_id = t6.id";
// Execute the query.
$result = $database->query($query);

// Fetch the data.
$data = $database->fetch($result);

// Close the database connection.
$database->close();

?>
