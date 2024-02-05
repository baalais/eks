<?php

class Guestbook
{
    private $conn;

    public function __construct($servername, $username, $password, $database)
    {
        $this->conn = new mysqli($servername, $username, $password, $database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function addEntry($name, $email, $message)
    {
        $sql = "INSERT INTO guestbook (Name, Email, Message) VALUES ('$name', '$email', '$message')";
        $this->conn->query($sql);
    }

    public function getEntries($sortColumn = 'Timestamp', $sortOrder = 'DESC', $searchTerm = '')
    {
        $sql = "SELECT * FROM Guestbook";

        if (!empty($searchTerm)) {
            $sql .= " WHERE Name LIKE '%$searchTerm%' OR Email LIKE '%$searchTerm%' OR Message LIKE '%$searchTerm%'";
        }

        $sql .= " ORDER BY $sortColumn $sortOrder";

        $result = $this->conn->query($sql);

        $entries = [];
        if ($result !== false) {
            while ($row = $result->fetch_assoc()) {
                $entries[] = $row;
            }
            $result->close();
        }

        return $entries;
    }

    public function closeConnection()
    {
        $this->conn->close();
    }
}
?>
