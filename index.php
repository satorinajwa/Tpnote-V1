<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
  border-collapse: collapse;
  width: 20%;
}
h1 {
  text-decoration: underline;
  font-family: 'Arial', sans-serif;
  font-size: 28px;
  margin-bottom: 20px; 
  color: #3498db; 
}

th {
  background-color: #f2f2f2; 
  border: 1px solid #dddddd; 
  padding: 10px; 
  text-align: center; 
  font-size: 16px;
  font-weight: bold;
  text-transform: uppercase;
  letter-spacing: 1px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  border-radius: 5px; 
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
}

th:hover {
  background-color: #2980b9;
}


td {
  border: 1px solid #dddddd; 
  padding: 10px; 
  border : 1px;
  text-align: center; 
  transition: background-color 0.3s ease;
  position: relative;
}

td:hover {
  background-color: #27ae60;
}

tr:nth-child(even) {
  background-color: #f9f9f9; 
}
        </style>
    <title>Liste des Clients</title>
</head>
<body>

<h1>Liste des Clients : </h1>


    </thead>
    <tbody>
     

         <?php 
                  require_once 'Service/ClientService.php';

    
                  $clientService = new ClientService();
              
                 
                  $clients = $clientService->getListeClients();
         foreach ($clients as $client): ?>
            
            <div class="client-item" data-id="<?= $client->ID ?>">
                <table>
                    <thead>
                        <tr>
                            <th>ID_Client</th>
                            <th>Nom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $client->ID ?></td>
                            <td><?= $client->Nom_Client ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php endforeach; ?>

<div id="details-container"></div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
 
    $('.client-item').click(function() {
   
        var clientID = $(this).data('id');

       
        $.ajax({
            type: 'POST',
            url: 'ClientDetails.php',
            data: { clientID: clientID },
            success: function(response) {
             
                $('#details-container').html(response);
            }
        });
    });
});
</script>

</body>
</html>