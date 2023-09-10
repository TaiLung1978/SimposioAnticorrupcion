<?php
try
{
 require_once('funciones.php');
 //conectar('localhost', 'root', '', 'simposio');
 

 //Recibir
 $ci = strip_tags($_POST['ci']);
 $val=validaCedula($ci);
 if ($val)
 {
	 $mysqli = new mysqli('localhost', 'root', 'mysql', 'simposio');
	 $mysqli->set_charset("utf8");
 
	 $nombre = strip_tags($_POST['nombre']);
	 $apellido = strip_tags($_POST['apellido']);
	 $email = strip_tags($_POST['email']);
	 //$password = strip_tags(sha1($_POST['password']));
	 $celular = strip_tags($_POST['celular']);
	 $entidad = strip_tags($_POST['entidad']);
	 $modalidad = strip_tags($_POST['modalidad']);
	 $query = $mysqli->query('SELECT * FROM participantes WHERE ci= "'.mysqli_real_escape_string($mysqli,$ci).'" ');

	 if($existe = $query->fetch_object())
	 {
		phpAlert(   "El participante ya está registrado"   ); //echo 'El participante '.$ci. ' ya existe.';
	 }
	 else
	 {
		$meter = $mysqli->query('INSERT INTO participantes (ci, nombre, apellido, email, celular, entidad, modalidad) values ("'.mysqli_real_escape_string($mysqli,$ci).'", "'.mysqli_real_escape_string($mysqli,$nombre).'", "'.mysqli_real_escape_string($mysqli,$apellido).'", "'.mysqli_real_escape_string($mysqli,$email).'", "'.mysqli_real_escape_string($mysqli,$celular).'", "'.mysqli_real_escape_string($mysqli,$entidad).'", "'.mysqli_real_escape_string($mysqli,$modalidad).'")');
		 if($meter)
		 {
			phpAlert(   "Participante registrado con exito"   ); //echo 'Participante registrado con exito';
			enviarMail($email);
		 }
		 else{
			phpAlert(   "Hubo un error en el registro"   ); //echo 'Hubo un error en el registro.';
		 }
	  }
	  ?>	
	<script>window.history.back();</script>
	<?php
 } 
 else
 {
	phpAlert(   "Cédula no valida"   ); //echo 'Cedula no valida.';	 
  ?>	
	<script>window.history.back();</script>
	<?php
 }
}
catch (Exception $e) 
{
	phpAlert(   $e->getMessage()   ); //echo 'Cedula no valida.';
}
?>