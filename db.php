<?php 
    class DatabaseConnection {
        private $host = 'localhost';
        private $username = 'root';
        private $password = '';
        private $dbname = 'realisatie-stattrackers';
        private $pdo;

        public function __construct() {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}"; 
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];
            $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
        }

        public function query($sql, $bindparam = false, $bind = "") {

          if (!$bindparam) {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();

          } else if ($bindparam) {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($bind);
            return $stmt->fetchAll();
          }

        }
    }

    // VOORBEELD:
    // $db = new DatabaseConnection();
    // $result = $db->query("SELECT *");
    // foreach ($result as $row) {
    //     echo "{$row['naam']} ({$row['locatie']})<br>";
    // }
?>