<?php
include_once("conexion.php"); 
?>
<!--Busca por VaidrollTeam para más proyectos. -->
<html>
<head>    
		<title>Virgy</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
        
        <!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<!-- 
    RTL version
-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>

</head>
<body>
    <table>
	<img src="logo0.png">
			<div id="barrabuscar">
		<form method="POST">
            
		<input type="text" name="txtbuscar" id="cajabuscar" placeholder="Buscar por imei"><input type="submit" value="Buscar" name="btnbuscar">
		</form>
		</div>
			<tr><th colspan="5"><h1>LISTA IMEI</h1><th><a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar</a></th></tr>
			<tr>
		    <th>id</th>
			<th>nulo</th>
            <th>Imei</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Acción</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conn, "SELECT    cod,ime,nom,unlo FROM usuarios where ime like '".$buscar."%'");
}
else
{
$queryusuarios = mysqli_query($conn, "SELECT * FROM usuarios ORDER BY cod asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['cod']."</td>";
            echo "<td>".$mostrar['ime']."</td>";
            echo "<td>".$mostrar['nom']."</td>";
            echo "<td>".$mostrar['unlo']."</td>";     
			  
            echo "<td style='width:26%'><a href=\"eliminar.php?cod=$mostrar[cod]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nom]?')\">Eliminar</a></td>";           
}
        ?>
    </table>
	 <script>
function abrirform() {
  document.getElementById("formregistrar").style.display = "block";
  
}

function cancelarform() {
  document.getElementById("formregistrar").style.display = "none";
}

</script>
<div class="caja_popup" id="formregistrar">
  <form action="agregar.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Nuevo IMEI</th></tr>
            <tr> 
                <td>Imei</td>
                <td><textarea name="txtimei" id="" cols="30" rows="10"></textarea></td>
                
                
            </tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnombre" required></td>
            </tr>
            <tr> 
                <td>Estado</td>
                
                
                <td><select name="txtestado" onChange="combo(this, 'demo')">                   
<option>Loked</option>
<option>Unlocked</option>
</select></td>
                
                
                
            </tr>
            <tr> 	
               <td colspan="2">
				   <button type="button" onclick="cancelarform()">Cancelar</button>
				   <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar a este usuario?');">
			</td>
            </tr>
        </table>
    </form>
</div>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

</body>
</html>

<?php
// $resultado = null;
// $result = null;
// $message = null;

$result = $_GET['result'];
$message = $_GET['message'];

if($result != null & $message != null)
{
    echo "
    <script>
        alertify.set('notifier','position', 'bottom-right');
        alertify.success('$message');
    </script>
    ";
} else {
    echo "
    <script>
        alertify.set('notifier','position', 'bottom-right');
        alertify.error('$message');
    </script>
    ";
}

?>