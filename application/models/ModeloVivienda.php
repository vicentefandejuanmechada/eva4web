<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModeloVivienda extends CI_Model
{     

    public function m_insertVivienda($direccion, $numero_casa, $tipo,$estado)
    {
        //opcion 1 para insertar datos
        /*$data = array(
            'rut' => $rut_recibido,
            'nombre' => $nombre_recibido, 
            'apellido' => $apellido_recibido
        );

        $this->db->insert('alumno', $data);*/

        //opcion 1 para insertar datos
        $this->db->query("INSERT INTO vivienda (direccion,numero,tipo,estado) VALUES ('$direccion','$numero_casa','$tipo','$estado')");
    }

    public function m_selectVivienda()
    {
        //opcion1 para obtener datos
        // $query_select = $this->db->get('alumno'); // Produces: SELECT * FROM mytable

        //opcion2 para obtener datos
        $query_select = $this->db->query("SELECT * FROM vivienda");
        return $query_select;
    }

    public function m_deleteVivienda($id_elimina)
    {
        $this->db->query("DELETE FROM vivienda WHERE id_vivienda = '$id_elimina'");
    }

    public function m_selectUnaVivienda($id)
    {
        $query = $this->db->query("SELECT * FROM vivienda WHERE id_vivienda='$id'");
        return $query;
    }

    public function m_updateVivienda($id_editar,$rut_edita,$nombre_edita,$apellido_edita,$estado_edita)
    {
        $this->db->query("UPDATE vivienda SET direccion='$rut_edita', numero='$nombre_edita', tipo = '$apellido_edita' , estado = '$estado_edita' WHERE id_vivienda='$id_editar'");
    }
}
