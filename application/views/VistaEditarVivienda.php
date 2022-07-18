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

    <form action="<?php echo base_url()?>index.php/ControladorVivienda/c_editarViviendaFinal" method="get">
        <input   type="hidden" name="idOculto" value="<?php echo $row['id_vivienda'];?>">
        
        <label for="idDireccison">Direccion</label>
        <input class="form-control"  type="text" name="CampoDireccion" id="idRut" value="<?php echo $row['direccion'];?>">
        <br>
        <label for="idNumero">Numero De casa</label>
        <input class="form-control"  type="text" name="CampoNumero" id="idNumero" value="<?php echo $row['numero'];?>">
        <br>
        <label for="idtipo">Tipo</label>
        <select class="form-select" aria-label="Default select example" name="CampoTipo">
  <option value ="1" selected>Seleciona el tipo de domicilio</option>
  <option value="casa" name="CampoTipo">Casa</option>
  <option value="Departamento" name="CampoTipo">Departamento</option>
</select>
<br>
<input class="form-check-input"  type="radio" id="radio" name="Radiobtn" value="nueva">
<label for="Nueva">nueva</label><br>
<input class="form-check-input"  type="radio" id="radio" name="Radiobtn" value="Usada">
<label for="Usada">Usada</label><br>
        <input class="btn btn-primary" type="submit" value="EDITAR">
    </form>
</body>

</html>