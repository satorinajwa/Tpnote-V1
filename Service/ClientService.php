<?php
require_once 'Data_Object\Data_Access_Object\CLTDAO.php';


class ClientService {
    
    private $clientDAO;

    public function __construct() {
        $this->cLtDAO = new CLTDAO();
    }

    public function getClientByID($clientID) {
        return $this->cLtDAO->getClientByID($clientID);
    }

    public function getListeClients() {
        $clients = $this->cLtDAO->getListeClients(); 
        return $clients;
    }
}
?>
