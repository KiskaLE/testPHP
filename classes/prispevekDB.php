<?php
    include_once "./classes/prispevek.php";

    class PrispevekDB {
        private $conn;
        //konstrukto který vytvoří spojení s databází prispevky tabulkou prispevky
        function __construct() {
            try {
                $this->conn = new PDO("mysql:host=localhost; dbname=prispevky", "root", "");
            } catch (\Throwable $th) {
                echo "<p>error</p>";
            }
        }
        
        public function post($prispevek) {
            $sql = $this->conn->prepare("INSERT INTO prispevky(id, nadpis, text, datum) VALUES (?, ? ,?, ?)");
            $sql->execute(array(NULL, $prispevek->nadpis, $prispevek->text, $prispevek->datum));
            return $this->conn->lastInsertId();
        }
        public function delete($prispevek) {
            $sql = $this->conn->prepare("DELETE FROM prispevky WHERE id=?");
            return $sql->execute(array($prispevek->id));
        }

        public function edit($prispevek) {
            $sql = $this->conn->prepare("UPDATE prispevky SET nadpis=? , text=?, datum=? WHERE id=?");
            return $sql->execute(array($prispevek->nadpis, $prispevek->text, $prispevek->datum, $prispevek->id));
        }
        
        public function getAll() {
            $sql = $this->conn->prepare("SELECT * FROM prispevky WHERE 1 ORDER BY id DESC");
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "Prispevek");
            return $sql->fetchAll();
        }

        public function get($id) {
            $sql = $this->conn->prepare("SELECT * FROM prispevky WHERE id=:id");
            $sql->bindParam(":id", $id);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "Prispevek");
            return $sql->fetch();
        }
    }
?>