<?php

require_once 'Database\database.php';
require_once 'Data_Object\Data_Transfer_Object\CLTDTO.php';

class CLTDAO {
    private $conn;

    public function __construct() {
        global $servername, $username, $password, $dbname;
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }

    public function getClientByID($clientID) {
        $stmt = $this->conn->prepare("SELECT * FROM Client WHERE id = :clientID");
        $stmt->bindParam(':clientID', $clientID);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $CLTDTO = new CLTDTO();
        $CLTDTO->ID = $result['id'];
        $CLTDTO->Nom_Client = $result['nom_client'];
        $CLTDTO->Prenom_Client = $result['prenom_client'];
        $CLTDTO->Adresse_Client = $result['adresse_client'];

        return $CLTDTO;
    }

    public function getListeClients() {
        $stmt = $this->conn->query("SELECT * FROM Client");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $clients = array();
        foreach ($results as $result) {
        $CLTDTO = new CLTDAO();
        $CLTDTO->ID = $result['id'];
        $CLTDTO->Nom_Client = $result['nom_client'];
        $CLTDTO->Prenom_Client = $result['prenom_client'];
        $CLTDTO->Adresse_Client = $result['adresse_client'];
        $clients[] = $CLTDTO;
        }
    
        return $clients;
    }
   
}
?>
