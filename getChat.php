<?php 

    include 'Database.php';

    $db  = new Database();
    $con = $db->Connect();

    $rows = mysqli_query($con , "SELECT * FROM chat");
    $data = [];
    $no   = 0;
    
    foreach($rows as $row){
        $data[] = $row;
        $no = $no+1;
    }

    $dataGet = json_encode($data);

    $mhs = json_decode($dataGet);

    for($i = 0; $i < $no; $i++){
        $isOdd = $i % 2 == 1; 
        $class = $isOdd ? 'odd' : 'even';
        $float = $isOdd ? 'left' : 'right';

        echo "<div class='alert alert-success $class' role='alert' style='width: 60%; float: $float;'>";
        echo "<label style='top: 8px; position: absolute; font-size: 11px;'>".$mhs[$i]->nama_chat."</label>";

        $date = date_create($mhs[$i]->tgl_chat);
        echo "<label style='top: 8px; right: 8px; position: absolute; font-size: 11px;'>".date_format($date, " m.s ")."</label>";

        echo "<br>";
        echo $mhs[$i]->text_chat;
        echo "<br>";

        echo "</div>";
    }

?>