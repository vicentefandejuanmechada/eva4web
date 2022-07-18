<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>FORMULARIO DE INGRESO De una vivienda</h1>

    <form action="<?php echo base_url()?>index.php/ControladorVivienda/c_guardarAlumno" method="get">
        <label for="idDireccion">Direccion</label>
        <input class="form-control" type="text" name="CampoDireccion" id="idDireccion">
        <br>
        <label for="idNumero">Numero</label>
        <input class="form-control" type="text" name="CampoNumero" id="idNumero">
        <br>
        <br>
        <select class="form-select" aria-label="Default select example" name="CampoTipo">
  <option value ="1" selected>Seleciona el tipo de domicilio</option>
  <option value="casa" name="CampoTipo">Casa</option>
  <option value="Departamento" name="CampoTipo">Departamento</option>
</select>
<br>
<input class="form-check-input"  type="radio" id="estado" name="Radiobtn" value="nueva">
<label for="Nueva">nueva</label><br>
<input class="form-check-input"  type="radio" id="estado" name="Radiobtn" value="Usada">
<label for="Usada">Usada</label><br>
        <input class="btn btn-primary" type="submit" value="GUARDAR">
    </form>
</body>

</html>