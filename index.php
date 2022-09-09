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
            <form name="selecinaPessoas" action="" method="post">
                <img src="images/logo.png">
                <h3>Selecione as pessoas: </h3>
    
                <?php
                    $link = mysqli_connect("localhost", 'user', 'password', 'db');
                    if(mysqli_connect_errno()){
                        die("Nao foi possivel conectar ao banco de dados". mysqli_error());
                    }
                
                    mysqli_select_db($link,"db");
                    
                    $query = "SELECT * FROM pessoas";
                    $dados = mysqli_query($link,$query);
                
                    $query_inicio = "SELECT * FROM resultado";
                    $dados_inicio = mysqli_query($link,$query_inicio);
                
                    $i=0;
                    while($row_inicio = mysqli_fetch_array($dados_inicio))
                    {
                        $sql_inicio1 = "UPDATE resultado SET segunda = 0 WHERE id_horario=$i";
                        $sql_inicio2 = "UPDATE resultado SET terca =   0 WHERE id_horario=$i";
                        $sql_inicio3 = "UPDATE resultado SET quarta =  0 WHERE id_horario=$i";
                        $sql_inicio4 = "UPDATE resultado SET quinta =  0 WHERE id_horario=$i";
                        $sql_inicio5 = "UPDATE resultado SET sexta =   0 WHERE id_horario=$i";
                        
                        mysqli_query($link, $sql_inicio1);
                        mysqli_query($link, $sql_inicio2);
                        mysqli_query($link, $sql_inicio3);
                        mysqli_query($link, $sql_inicio4);
                        mysqli_query($link, $sql_inicio5);
                        
                        $i++;
                    }
                
                    $sql_inicio_selec = "DROP TABLE selecionados";    
                    mysqli_query($link, $sql_inicio_selec);
                
                    while($row = mysqli_fetch_array($dados))
                    {
                        ?>      
                        <input name="pessoas[]" type="checkbox" value=<?php echo $row["id_pessoa"]; ?>>
                        <?php echo $row["nome"];?>
                        <br/>
                        <?php
                    } 
                ?>
                <br/>
                <input name="confirmar" type="submit" value="Gerar Horario">
            </form>     
            
            <?php
            if(isset($_POST['confirmar'])){
                $sql0 = "CREATE TABLE IF NOT EXISTS selecionados(
                    id_pessoa int(40) NOT NULL
                )";  
                
                /*$sql1 = "CREATE TABLE IF NOT EXISTS resultado(
                    `id_horario` int(20) NOT NULL,
                    `segunda` int(2) DEFAULT NULL,
                    `terca` int(2) DEFAULT NULL,
                    `quarta` int(2) DEFAULT NULL,
                    `quinta` int(2) DEFAULT NULL,
                    `sexta` int(2) DEFAULT NULL)";*/
               
            mysqli_query($link, $sql0);
                
            $select = mysqli_query($link,"SELECT * FROM resultado LIMIT 1");
            if(empty(mysqli_num_rows($select))){
                for($i=0; $i<14; $i++){
                    $sql2 = "INSERT INTO resultado VALUES($i,0,0,0,0,0)";
                    mysqli_query($link, $sql2);
                } 
            }else{
                for($i=0; $i<14; $i++){
                    $sql2 = "UPDATE resultado WHERE id_horario=$i
                             SET segunda=0, terca=0,quarta=0,
                                 quinta=0 , sexta=0";
                    mysqli_query($link, $sql2);
                }
            }
                
            if(isset($_POST['pessoas'])){
                $listaCheckbox = $_POST['pessoas'];
                foreach ($listaCheckbox as $pessoas) {
                    echo $pessoas;?><br/><?php
                    $sql3 = "INSERT INTO selecionados VALUES($pessoas)";
                    mysqli_query($link, $sql3);
                }
            }
                
            $sql4 = "SELECT * FROM semana S
                     JOIN selecionados SE
                     ON S.id_pessoa = SE.id_pessoa";
            $dados2 = mysqli_query($link, $sql4);    
            
            $sql6 = "SET SQL_SAFE_UPDATES=0";
            mysqli_query($link, $sql6);
                
            while($row2 = mysqli_fetch_array($dados2)){
                if($row2["segunda"] == 1){
                    $valor = $row2["id_horario"];
                    $sql5 = "UPDATE resultado SET segunda = 1 WHERE id_horario=$valor";
                    mysqli_query($link, $sql5);
                }
            }
                
            $dados3 = mysqli_query($link, $sql4);    
            while($row3 = mysqli_fetch_array($dados3)){
                if($row3["terca"] == 1){
                    $valor2 = $row3["id_horario"];
                    $sql7 = "UPDATE resultado SET terca = 1 WHERE id_horario=$valor2";
                    mysqli_query($link, $sql7);
                }
            }
                
            $dados4 = mysqli_query($link, $sql4);    
            while($row4 = mysqli_fetch_array($dados4)){
                if($row4["quarta"] == 1){
                    $valor3 = $row4["id_horario"];
                    $sql8 = "UPDATE resultado SET quarta = 1 WHERE id_horario=$valor3";
                    mysqli_query($link, $sql8);
                }
            }
                
            $dados6 = mysqli_query($link, $sql4);    
            while($row6 = mysqli_fetch_array($dados6)){
                if($row6["quinta"] == 1){
                    $valor5 = $row6["id_horario"];
                    $sql10 = "UPDATE resultado SET quinta = 1 WHERE id_horario=$valor5";
                    mysqli_query($link, $sql10);
                }
            }
                
            $dados7 = mysqli_query($link, $sql4);    
            while($row7 = mysqli_fetch_array($dados7)){
                if($row7["sexta"] == 1){
                    $valor6 = $row7["id_horario"];
                    $sql11 = "UPDATE resultado SET sexta = 1 WHERE id_horario=$valor6";
                    mysqli_query($link, $sql11);
                }
            }
                
            //mysqli_query($link, $sql0);
            //mysqli_query($link, $sql1);   
            
            if(isset($_POST['confirmar'])){
                ?><script type="text/javascript" language="javascript">
                location.href = 'http://buscareuniao.000webhostapp.com/tela2.php';
                </script><?php     
            }
                
               
            
            //header("Location: http://buscareuniao.000webhostapp.com/tela2.php");
                
            mysqli_close($link); 
            }
        ?>
              
    </BODY> 
</HTML>

