<?php include_once("conexion.php");

    $imei 	= $_POST['txtimei'];
    $nombre 	= $_POST['txtnombre'];
    $estado	= $_POST['txtestado'];

$resultado = null;
$result = null;
$message = null;

try {
    if ($resultado = $conn->query("INSERT INTO usuarios(ime,nom,unlo) VALUES('$imei','$nombre','$estado')"))
    {
        $result = true;
        $message = "¡Genial! se agregó correctamente";

        header("Location:index.php?result=$result&message=$message"); 

    } else {
        $result = false;
        $message = "Este imei ya existe, intente con otro";
    
        header("Location:index.php?result=$result&message=$message"); 
    }

} catch(Exception $e) {
   echo $e;
}

?>