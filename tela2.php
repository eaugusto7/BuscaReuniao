<?php
    header("Content-Type: text/html; charset=ISO-8859-1", true);
    $link = mysqli_connect("localhost", 'user', 'password', 'db');
    if(mysqli_connect_errno()){
        die("Erro: ". mysqli_error());
    }
?>

<!DOCTYPE html>
<HTML>
    <HEAD>
        <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />
        <TITLE>BUSCA REUNIAO</TITLE>
    </HEAD>
    <BODY>
        <img src="images/logo.png"> 
        <?php
            $link = mysqli_connect("localhost", 'user', 'password', 'db');
            if(mysqli_connect_errno()){
                die("Erro: ". mysqli_error());
            }
                
            mysqli_select_db($link,"db");
            $query = "SELECT * FROM resultado";
            $dados = mysqli_query($link,$query); 
            ?>
                
            <table>
                <tr>
                    <td>Horarios&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>Segunda&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>Terca&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>Quarta&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>Quinta&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>Sexta&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>
                
                    <?php
                        $i=0;
                        while($row = mysqli_fetch_array($dados)){
                            ?><tr><td><?php
                            switch ($i){
                                case 0:
                                    echo "07:00";
                                    break;
                                case 1:
                                    echo "07:50";
                                    break;
                                case 2:
                                    echo "08:40";
                                    break;
                                case 3:
                                    echo "09:40";
                                    break;    
                                case 4:
                                    echo "10:30";
                                    break;
                                case 5:
                                    echo "13:00";
                                    break;
                                case 6:
                                    echo "13:50";
                                    break;
                                case 7:
                                    echo "14:40";
                                    break;
                                case 8:
                                    echo "15:40";
                                    break;
                                case 9:
                                    echo "16:30";
                                    break;
                                case 10:
                                    echo "19:00";
                                    break;
                                case 11:
                                    echo "19:50";
                                    break;
                                case 12:
                                    echo "20:40";
                                    break;
                                case 13:
                                    echo "21:40";
                                    break;
                            }
                            ?></td><?php
                            
                            
                            ?><td><?php if($row["segunda"] == 1){echo "----------";}
                                else{echo "Disponivel";}
                            ?></td><?php
                            
                            ?><td><?php if($row["terca"] == 1){echo "----------";}
                                else{echo "Disponivel";}
                            ?></td><?php
                            
                            ?><td><?php if($row["quarta"] == 1){echo "----------";}
                                else{echo "Disponivel";}
                            ?></td><?php
                            
                            ?><td><?php if($row["quinta"] == 1){echo "----------";}
                                else{echo "Disponivel";}
                            ?></td><?php
                            
                            ?><td><?php if($row["sexta"] == 1){echo "----------";}
                                else{echo "Disponivel";}
                            ?></td></tr><?php
                            $i++;
                        }        
                    ?>        
            </table>
        <form name="button" action="" method="post">
            <input name="inicio" type="submit" value="Voltar ao inicio">
        </form>
        <?php
            mysqli_close($link);
            
            if(isset($_POST['inicio'])){
                ?><script type="text/javascript" language="javascript">
                location.href = 'https://buscareuniao.000webhostapp.com/';
                </script><?php    
                echo "Clicou";
            }     
        ?>  
        
    </BODY>
</HTML>