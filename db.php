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
  public function fetch($results) {
    $data = array();
    $num_results = count($results); // get the number of result sets
    for ($i = 0; $i < $num_results; $i++) {
        $j = 0; // initialize index counter
        while ($row = mysqli_fetch_assoc($results[$i])) {
            $data[$i][$j] = $row;
            $j++;
        }
    }
    return $data;
  }


  /**
   * Execute a database query1.
   *
   * @param string $query1
   *   The query1 to execute.
   *
   * @return mysqli_result
   *   The result object or false on failure.
   */
  public function query1($query1) {
    return mysqli_query($this->conn, $query1);
  }

  /**
   * Fetch data from a result object.
   *
   * @param mysqli_result $result1
   *   The result object.
   *
   * @return array
   *   The data array.
   */
  public function fetch1($results1) {
    $data1 = array();
    $num_results = count($results1); // get the number of result sets
    for ($i = 0; $i < $num_results; $i++) {
        $j = 0; // initialize index counter
        while ($row = mysqli_fetch_assoc($results1[$i])) {
            $data1[$i][$j] = $row;
            $j++;
        }
    }
    return $data1;
  }

  /**
   * Close the database connection.
   */
  public function close() {
    mysqli_close($this->conn);
  }

}

// Create a new instance of the Database class.
$database = new Database('localhost', 'gaurav', 'Gaurav@123', 'employee');

// Connect to the database.
$conn = $database->connect();

// Check if connection was successful.
if (!$conn) {
  die("Sorry we failed to connect: " . mysqli_connect_error());
}

// Define an empty array for storing query results.
$result = array();

// Define an empty array for storing SQL queries.
$query = array();

// Define the first query to retrieve all data from the employee_code_table.
$query[0] = "SELECT * FROM employee_code_table";

// Define the second query to retrieve all data from the employee_salary_table.
$query[1] = "SELECT * FROM employee_salary_table";

// Define the third query to retrieve all data from the employee_details_table.
$query[2] = "SELECT * FROM employee_details_table";

// Execute the first query and store the result in the $result array.
$result[0] = $database->query($query[0]);

// Execute the second query and store the result in the $result array.
$result[1] = $database->query($query[1]);

// Execute the third query and store the result in the $result array.
$result[2] = $database->query($query[2]);

// Fetch the data from the database.
$data = $database->fetch($result);

// Define an empty array for storing query results.
$result1 = array();

// Define an empty array for storing SQL queries.
$query1 = array();

// Define the first query to retrieve employee_first_name from employee_salary_table and employee_details_table.
$query1[0] = "SELECT employee_details_table.employee_first_name
              FROM employee_salary_table
              INNER JOIN employee_details_table ON employee_salary_table.employee_id = employee_details_table.employee_id
              WHERE employee_salary_table.employee_salary > '50k'";

// Define the second query to retrieve employee_last_name from employee_details_table where graduation_percentile is greater than 70%.
$query1[1] = "SELECT employee_last_name
              FROM employee_details_table
              WHERE graduation_percentile > '70%'";

// Define the third query to retrieve employee_code_name from employee_salary_table, employee_details_table, and employee_code_table where graduation_percentile is less than 70%.
$query1[2] = "SELECT employee_code_table.employee_code_name
              FROM employee_salary_table
              INNER JOIN employee_details_table ON employee_details_table.employee_id = employee_salary_table.employee_id
              INNER JOIN employee_code_table ON employee_code_table.employee_code = employee_salary_table.employee_code
              WHERE graduation_percentile < '70%'";

// Define the fourth query to retrieve full name from employee_salary_table, employee_details_table, and employee_code_table where employee_domain is not Java.
$query1[3] = "SELECT CONCAT(employee_first_name, ' ', employee_last_name) AS full_name
              FROM employee_salary_table
              INNER JOIN employee_details_table ON employee_details_table.employee_id = employee_salary_table.employee_id
              INNER JOIN employee_code_table ON employee_code_table.employee_code = employee_salary_table.employee_code
              WHERE employee_domain <> 'Java'";

// Define the fifth query to retrieve total salary for each employee_domain from employee_salary_table and employee_code_table where employee_salary is greater than or equal to 30k.
$query1[4] = "SELECT employee_domain, SUM(employee_salary) AS total_salary
              FROM employee_salary_table
              INNER JOIN employee_code_table ON employee_salary_table.employee_code = employee_code_table.employee_code
              WHERE employee_salary >= '30k'
              GROUP BY employee_domain";

// Define the sixth query to retrieve total salary for each employee_domain from employee_salary_table and employee_code_table where employee_salary is greater than or equal to 30k.
$query1[5] = "SELECT employee_domain, SUM(employee_salary) AS total_salary
              FROM employee_salary_table
              INNER JOIN employee_code_table ON employee_salary_table.employee_code = employee_code_table.employee_code
              WHERE employee_salary >= '30k'
              GROUP BY employee_domain";

// Define the sixth query to retrieve employee_id from employee_salary_table where employee_code is null.
$query1[6] = "SELECT employee_id
              FROM employee_salary_table
              WHERE employee_code IS NULL";

// Execute the first query1 and store the result in the $result1 array.
$result1[0] = $database->query1($query1[0]);

// Execute the second query1 and store the result in the $result1 array.
$result1[1] = $database->query1($query1[1]);
// Execute the query1.
$result1[2] = $database->query1($query1[2]);

// Execute the third query1 and store the result in the $result1 array.
$result1[2] = $database->query1($query1[2]);

// Execute the fourth query1 and store the result in the $result1 array.
$result1[3] = $database->query1($query1[3]);

// Execute the fifth query1 and store the result in the $result1 array.
$result1[4] = $database->query1($query1[4]);

// Execute the sixth query1 and store the result in the $result1 array.
$result1[5] = $database->query1($query1[5]);

// Execute the seventh query1 and store the result in the $result1 array.
$result1[6] = $database->query1($query1[6]);

// Fetch the data from $result1.
$data1 = $database->fetch1($result1);

// Close the database connection.
$database->close();

?>
