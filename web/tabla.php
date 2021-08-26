
<?php 
    include ('./conexion.php');
    //Listamos mascarillas del usuario
    $email = $_SESSION [ 'email' ];
    $sql="SELECT * from mascarilla 
          WHERE user = '$email' 
          ORDER BY wash_left ASC";   
?>

<div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr align="center">
                        <th hidden="">Id</th>
                        <th>Datos mascarilla</th>
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
                        <tr>
                            <td hidden=""> <?php echo $mostrar[0];?></td>
			                <td><a data-toggle="modal" data-target="#edicion" onclick="agregarDatos('<?php echo $datos ?>')"><h5><?php echo $mostrar[1] ?></h5></a>
                                <div>
                                    <span class="badge badge-danger"><?php echo $mostrar[3];?></span> Lavados Máx.
                                    <br>
                                    <span class="badge badge-info"><?php echo $mostrar[5];?></span> Lavados
                                    <br>
                                    <span class="badge badge-secondary"><?php 
                                                                            $fechaIni = date_create($mostrar[2]);
                                                                            $fechaT = date_format($fechaIni,('d-m-Y'));
                                                                            $fechaActual = date('d-m-Y');
                                                                            echo $fechaT;
                                                                            ?>                                 
                                    </span>
                                </div>
                           
                            </td>
                            <td hidden=""> <?php echo $mostrar[3];?></td>
                            <td hidden=""> <?php echo $mostrar[5];?></td>
                            <td class="text-center" id="lavadosLeftL">
                            <?php
                                    //Actualizamos valor de lavados restantes
                                    $wash_left = $mostrar[3] - $mostrar[5];
                                    $id = $mostrar[0];
                                    $sql2 = "UPDATE mascarilla 
                                             SET wash_left = $wash_left
                                             WHERE id_mask = $id ";
                                    mysqli_query($conexion,$sql2);
                                    
                                ?>
                                <div>
                                    <button type="button" class="btn btn-primary" onclick="actualizaLavado('<?php echo $datos ?>')">Lavar <span class="badge badge-light"><?php echo $mostrar[6] ?></span></button>
                                </div>
                                <?php
                                //Calculamos porcentaje de uso para la progress Bar
                                if ($mostrar[6] == 0) {
                                    $uso = 0;
                                } else {
                                    $uso = ($mostrar[6] / $mostrar[3]) * 100;
                                }
                                ?>
                                <br>
                                <div class="progress">
                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ($uso)?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">%</div>
                                </div>
                            </td>
                            
                        </tr>               
                    <?php 
                        }
	                ?>
                </tbody>
            </table>
</div>