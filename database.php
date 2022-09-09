<?php
    header('Content-Type: text/html; charset=utf-8');
    
    $link = mysqli_connect("localhost", 'user', 'password', 'db');
    if(mysqli_connect_errno()){
        die("Erro: ". mysqli_error());
    }
    mysqli_close($link);  
?>

<!DOCTYPE html>
<HTML>
    <HEAD>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <TITLE>BUSCA REUNIAO</TITLE>
    </HEAD>
    
    <BODY>     
            <?php
                $objReader = new PHPExcel_Reader_Excel5();
                $objReader->setReadDataOnly(true);
                $objPHPExcel = $objReader->load("/Planilhas/Horário_Professor.xls");
        
                //Obtem numero de Colunas
                $colunas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
                $totalcolunas = PHPExcel_Cell::columnIndexFromString($colunas);
        
                //Obtem numero de linhas
                $totallinhas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
        
                echo "<table border='1'";
        
                for($i = 1; $i < $totallinhas; $i++){
                    echo "<tr>";
                    
                    for($j = 0; $j < totalcolunas; $colunas){
                        if($i == 1){
                            echo "<th>".utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($j,$i)->getValue());
                        }else{
                            echo "<td>".utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($j,$i)->getValue());
                        }
                    }
                    echo "<tr>";
                }
                echo "</table>"
            ?>  
    </BODY> 
</HTML>

