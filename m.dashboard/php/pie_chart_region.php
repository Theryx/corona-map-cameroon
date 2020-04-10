<?php
    $strQry="SELECT name,nombre_total_de_cas FROM region WHERE nombre_total_de_cas > 0";

    $db = new PDO('pgsql:host=georesponse.postgres.database.azure.com;port=5432;dbname=georesponsedb;', 'postgres@georesponse', 'Geoadvantage2020');
    $sql = $db->query($strQry);
    

    $table = [['Regions','Cas']];
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        $data = array();
        foreach ($row as $field=>$value){ 
            array_push($data,$value);
        }
         array_push($table,$data);
    }
    echo json_encode($table);
?>
