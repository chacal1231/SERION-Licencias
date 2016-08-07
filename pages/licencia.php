<?php
if(isset($_POST['simpan'])){
	$nombre=$_POST['nombre'];
	$identificacion=$_POST['identificacion'];
	$tel=$_POST['tel'];
	$tipo_lic=$_POST['tipo_lic'];

	$consulta=mysqli_query($link,"INSERT INTO licencia(nombre, identificacion, telefono, tipo_lic) VALUES ('$nombre', '$identificacion', '$tel','$tipo_lic')");
	$error=mysqli_error($link);
	if(empty($error)){
		echo "Se agregó correctamente la licencia a la base de datos";
		
	}else{
		echo "Hay un error en la consulta $error";
	}
}

$consulta2=mysqli_query($link,"SELECT * FROM licencia");
$arreglo=mysqli_fetch_array($consulta2);


?>

<div class="table-responsive"n>
                                <table  class="display table table-bordered table-striped" id="dynamic-table">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Identificación</th>
                                            <th>Telefono</th>
                                            <th>Tipo de licencia</th>
                                            
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach( $consulta2 as $arreglo => $valores ) : ?> <!-- Mulai loop -->
                                        <tr class="text-besar">
                                            <td><?php echo $valores['nombre']; ?></td>
                                            <td><?php echo $valores['identificacion']; ?></td>
                                            <td><?php echo $valores['telefono']; ?></td>
                                             <td><?php echo $valores['tipo_lic']; ?></td>
                                        </tr>
                                        <?php endforeach; ?> <!-- Selesai loop -->                                  
                                    </tbody>
                                </table>
                            </div>

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Nueva licencia</button>
<!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Nueva licencia</h4>
                            </div>
                        <div class="modal-body">
                        <form id="modal-form" action="" method="post">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nombre:</label>
                                <input type="text" class="form-control" name="nombre">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Identificación</label>
                                <input type="text" class="form-control" name="identificacion">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Telefono</label>
                                <input type="text" class="form-control" name="tel">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Tipo licencia:</label>
                                <select class="form-control" name="tipo_lic">
                                <option value="Prueba">Prueba</option>
                                <option value="Bronce">Bronce</option>
                                 <option value="Plata">Plata</option>
                                  <option value="ORO">ORO</option>
                                </select>
                                </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" name="simpan" value="Sign up">Agregar Licencia</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>