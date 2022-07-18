<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
    //capturamos la clave del array asociativo
    $row = $query->row_array(); ?>
    <h1>EDICIÓN DE UNA Vivienda</h1>

    <form action="<?php echo base_url()?>index.php/ControladorVivienda/c_editarAlumnoFinal" method="get">
        <input   type="hidden" name="idOculto" value="<?php echo $row['id_vivienda'];?>">
        
        <label for="idDireccion">Direccion</label>
        <input class="form-control"  type="text" name="CampoDireccion" id="idDireccion" value="<?php echo $row['direccion'];?>">
        <br>
        <label for="idNumero">Numero De casa</label>
        <input class="form-control"  type="text" name="CampoNumero" id="idNumero" value="<?php echo $row['numero'];?>">
        <br>
        <label for="idTipo">Tipo</label>
        <input class="form-control"  type="text" name="CampoTipo" id="idTipo" value="<?php echo $row['tipo'];?>">
        <br>
     
        <input class="form-control"  type="text" name="Radiobtn" id="idEstado" value="<?php echo $row['estado'];?>">
        <br>
        <input  type="submit" value="EDITAR">
    </form>
</body>

</html>