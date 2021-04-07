
<?php 
    include ('./conexion.php');
    //Listamos mascarillas del usuario
    $email = $_SESSION [ 'email' ];
    $sql="SELECT * from mascarilla 
          WHERE user = '$email' 
          ORDER BY wash_max ASC";   
?>

<div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr align="center">
                        <th hidden="">Id</th>
                        <th>Descripción</th>
                        <th hidden="">Lavados Max.</th>
                        <th hidden="">Lavados </th>
                        <th>Lavados restantes</th>
                        
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php 
                        $result=mysqli_query($conexion,$sql);
                    
		                while($mostrar=mysqli_fetch_row($result)){
                            $datos=$mostrar[0]."||". //id_mask
                                   $mostrar[1]."||". //description
                                   $mostrar[2]."||". //data_ini
                                   $mostrar[3]."||". //wash_max
                                   $mostrar[4]."||". //user
                                   $mostrar[5]."||". //wash
                                   $mostrar[6]."||" //wash_left
                    ?>       
                        <tr align="center">
                            <td hidden=""> <?php echo $mostrar[0];?></td>
			                <td><a data-toggle="modal" data-target="#edicion" onclick="agregarDatos('<?php echo $datos ?>')"><?php echo $mostrar[1] ?></a></td>
                            <td hidden=""> <?php echo $mostrar[3];?></td>
                            <td hidden=""> <?php echo $mostrar[5];?></td>
                            <td id="lavadosLeftL">
                                <?php
                                    //Actualizamos valor de lavados restantes
                                    $wash_left = $mostrar[3] - $mostrar[5];
                                    $id = $mostrar[0];
                                    $sql2 = "UPDATE mascarilla 
                                             SET wash_left = $wash_left
                                             WHERE id_mask = $id ";
                                    mysqli_query($conexion,$sql2);
                                    
                                ?>
                                <button type="button" class="btn btn-primary" onclick="actualizaLavado('<?php echo $datos ?>')">Lavar <span class="badge badge-light"><?php echo $mostrar[6] ?></span></button>
                            </td>
                            
                        </tr>               
                    <?php 
                        }
	                ?>
                </tbody>
            </table>
</div>