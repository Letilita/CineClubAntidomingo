<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <?php
        $conexion=mysqli_connect ("localhost", "root", "","cineclub");
        if (mysqli_connect_errno()){
            echo "fallo al conectar al servidor";
            exit();
        }
        mysqli_set_charset ($conexion, "utf8");
        $claves=array_keys($_GET);
        $columna = implode (",", $claves);
        //$valores = array_map('mysql_real_escape_string', array_values($_GET), array($conexion,array_values($_GET)));
        $valores=array_values($_GET);
        //$escaped_values = array_map('mysqli_real_escape_string', $valores);
        $values  = implode("',' ", $valores);
        $sql = "INSERT INTO inscripciones ($columna) VALUES ('$values')";
        //$resultado=mysqli_query($conexion,$sql);
        /* 
        $resultado=mysqli_query($conexion, "SELECT * FROM inscripciones");
        while ($registro=mysqli_fetch_row($resultado)){
            for ($i=0;$i<7; $i++){
                echo $registro [$i] . " ";
            }
            echo "<br>";
        } */
        if ($resultado=mysqli_query($conexion,$sql)) {
            echo "Estás inscripto:<br><br>";
            echo "<table>";
            for ($i=0;$i<count($valores);$i++){
                echo "<tr><td>$claves[$i]</td><td>: $valores[$i]</td></tr>";
            }
            echo "</table><button><a href='index.html'> Volver</a></button>";
          } else {
            echo "Error: intenta inscribirte nuevamente o comunicate por mail con nosotros<button><a href='index.html'> Volver</a></button>";
          }
        mysqli_close ($conexion);
    ?>
</body>
</html>