<?php

include_once('DebugToConsole.php');

class ConnectionController {

  private $conn = null;

  public function __construct() {
    $this->createConnection();
  }
    
    function createConnection(){
      if($this->conn !== null){
        return;
      }

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "Test";
      
      // Create connection
      $this->conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($this->conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
      }

      $debugger = new DebugToConsole();
      $debugger->console_log("Connection successfully established!");
    }

    function closeConnection(){
      $this->conn->close();
    }

    function selectUsers($login){
      $sql = "SELECT * FROM users WHERE login='$login'";
      $result = $this->conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          return "uid: " . $row["uid"]. " - login: " . $row["login"]. " pass:" . $row["password"]. "<br>";
        }
      } else {
        return "0 results";
      }

      $this->closeConnection();
    }

}
?>