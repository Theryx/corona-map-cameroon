<?php
    $strQry="select sum(nombre_total_de_cas) as cas, sum(nombre_de_victimes) as victimes,sum(nombre_de_personnes_retablies)  as retablies from region";

    $db = new PDO('pgsql:host=georesponse.postgres.database.azure.com;port=5432;dbname=georesponsedb;', 'postgres@georesponse', 'Geoadvantage2020');
    $sql = $db->query($strQry);

    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        $data = array();
        foreach ($row as $field=>$value){ 
            array_push($data,$value);
        }
    }

    $cas = ['Cas',$data[0],'#ea8c35'];
    $victimes = ['Victimes',$data[1],'red'];
    $ratablies = ['Retablies',$data[2],'green'];
//['Element', 'Density', { role: 'style' }];
//    $table = [$cas,,]
    $table = [$cas,$victimes,$ratablies];
    
    echo json_encode($table);
?>
