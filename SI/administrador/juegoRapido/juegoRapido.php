<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}

if (!empty($_SESSION) && $_SESSION['jugador'] == 'fenabocolorg@gmail.com') {
	$jugadasRapidas = listarJuegoRapido($conexion);
	$tbody = '';
	foreach ($jugadasRapidas as $value) {
		$tbody .= '<tr>
					<td>'.$value[1].'</td>
					<td>'.$value[2].' - '.$value[3].' - '.$value[4].' - '.$value[5].' - '.$value[6].' - '.$value[7].'</td>
					<td>'.$value[10].'</td>
					<td>'.$value[11].' aciertos</td>
					<td>'.fecha($value[9]).'</td>
					<td><button class="btn btn-info btn-sm btnDetalles" id="'.$value[1].'" type="button" data-toggle="modal" data-target="#exampleModal"><i class="icon-eye"></i></button></td>
				</tr>';
	}
	require_once '../../../views/administrador/juegoRapido/juegoRapido.view.php';
} 








// <div class="col-12 pt-2">
// <div class="row">
// 	<div class="col-4">
// 		<div class="form-group">
// 			<label for="codigo" class="my-0 pl-2">Buscar por codigo</label>
// 			<input type="text" class="form-control" placeholder="Codigo" name="codigo" id="codigo">
// 		</div>
// 	</div>
// 	<div class="col-4">
// 		<div class="form-group">
// 			<label for="fecha" class="my-0 pl-2">Buscar por fecha</label>
// 			<input type="date" name="fecha" id="fecha" class="form-control">
// 		</div>
// 	</div>
// 	<div class="col-4">
// 		<div class="form-group">
// 			<label for="estado" class="my-0 pl-2">Buscar por estado</label>
// 			<select name="estado" id="estado" class="form-control">
// 				<option value="" selected="true">Todos</option>
// 				<option value="1">En espera</option>
// 				<option value="2">Confirmada</option>
// 				<option value="3">Gano</option>
// 				<option value="4">No Gano</option>
// 				<option value="5">Denegada</option>
// 			</select>
// 		</div>
// 	</div>
// </div>
// </div>