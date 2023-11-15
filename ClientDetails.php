<?php

require_once 'Service\ClientService.php';
if (isset($_POST['clientID'])) {
    $clientID = $_POST['clientID'];

  
    $clientService = new ClientService();
    $client = $clientService->getClientByID($clientID);

    
    echo "<h2>Détails du Client</h2>";
    echo "<p><strong>ID_Client:</strong> {$client->ID}</p>";
    echo "<p><strong>Nom:</strong> {$client->Nom_Client}</p>";
    echo "<p><strong>Prénom:</strong> {$client->Prenom_Client}</p>";

} else {
    echo "Erreur : ID_Client non spécifié.";
}
?>
