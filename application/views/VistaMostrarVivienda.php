<h1>VISTA MOSTRAR ViviendaS</h1>
<table class="table">
    <tr>
        <th>Direccion</th>
        <th>Numero De casa</th>
        <th>Tipo</th>
        <th>Estado</th>
        <th>Eliminar</th>
        <th>Editar</th>
    </tr>   
<?php 
    foreach ($query->result_array() as $row)
    {?>
    <tr>
        <td><?php echo $row['direccion'];?></td>
        <td><?php echo $row['numero'];?></td>
        <td><?php echo $row['tipo'];?></td>
        <td><?php echo $row['estado'];?></td>
        <td><a href="<?php echo base_url()?>index.php/ControladorVivienda/c_eliminarVivienda/<?php echo $row['id_vivienda']?>"><button class="btn btn-danger">ELIMINAR</button></a></td>
        <td><a href="<?php echo base_url()?>index.php/ControladorVivienda/c_editarVivienda/<?php echo $row['id_vivienda']?>"><button class="btn btn-primary">EDITAR</button></a></td>
    </tr>  
    <?php    
    }
    ?>
</table>