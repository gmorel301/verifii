<?php 
include_once("conexion.php");
include_once("index.php");

$cod = $_GET['cod'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM usuarios WHERE cod=$cod");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $codigo = $mostrar['cod'];
    $imei = $mostrar['ime'];
    $nombre = $mostrar['nom'];
    $unlocked = $mostrar['unlo'];
	
}
?>
<html>
<head>    
		<title>VaidrollTeam</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="caja_popup2" id="formmodificar">
  <form method="POST" class="contenedor_popup" >
        <table>
		<tr><th colspan="2">Modificar usuario</th></tr>
		     <tr> 
                <td>codigo</td>
                <td><input type="text" name="txtcodigo" value="<?php echo $codigo;?>" required ></td>
            </tr>
            <tr> 
                <td>imei</td>
                <td><input type="text" name="txtimei" value="<?php echo $imei;?>" required></td>
            </tr>
            <tr> 
                <td>nombre</td>
                <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>" required></td>
            </tr>
            
            <tr>
            <td>unlocked</td>
                <td><input type="text" name="txtunlocked" value="<?php echo $unlocked;?>" required></td>
            </tr>
            <tr>
				
                <td colspan="2">
				<a href="index.php">Cancelar</a>
				<input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar a este usuario?');">
				</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>

<?php
	
	if(isset($_POST['btnmodificar']))
{    
    $codigo1 = $_POST['txtcodigo'];
	
	$imei1 	= $_POST['txtimei'];
    $nombre1 	= $_POST['txtnombre'];
    $unlocked1 	= $_POST['txtunlocked']; 
      
    $querymodificar = mysqli_query($conn, "UPDATE usuarios SET ime='$imei1',nom='$nombre1',unlo='$unlocked1' WHERE cod=$codigo1");

  	echo "<script>window.location= 'index.php' </script>";
    
}
?>