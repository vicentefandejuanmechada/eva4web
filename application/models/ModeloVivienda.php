<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModeloVivienda extends CI_Model
{     

    public function m_insertVivienda($direccion, $numero_casa, $tipo,$estado)
    {
       
        $this->db->query("INSERT INTO vivienda (direccion,numero,tipo,estado) VALUES ('$direccion','$numero_casa','$tipo','$estado')");
    }

    public function m_selectVivienda()
    {
        
        $query_select = $this->db->query("SELECT * FROM vivienda");
        return $query_select;
    }

    public function m_deleteVivienda($id_elimina)
    {
        $this->db->query("DELETE FROM vivienda WHERE id_vivienda = '$id_elimina'");
    }

    public function m_selectUnVivienda($id)
    {
        $query = $this->db->query("SELECT * FROM vivienda WHERE id_vivienda='$id'");
        return $query;
    }

    public function m_updateVivienda($id_editar,$direccion_edita,$numero_edita,$tipo_edita,$estado_edita)
    {
        $this->db->query("UPDATE vivienda SET direccion='$direccion_edita', numero='$numero_edita', tipo = '$tipo_edita' , estado = '$estado_edita' WHERE id_vivienda='$id_editar'");
    }
}
