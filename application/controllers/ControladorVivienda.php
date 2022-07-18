<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControladorVivienda extends CI_Controller
{


    public function index()
    {
        $this->load->view('menu');
        $this->load->view('VistaCrearVivienda');
    }

    public function c_guardarVivienda()
    {
        $direccion = $this->input->get('CampoDireccion');    
        $numero_casa = $this->input->get('CampoNumero');
        $tipo = $this->input->get('CampoTipo');
        $estado = $this->input->get('Radiobtn');
      
        $this->load->model('ModeloVivienda');

       
        $this->ModeloVivienda->m_insertVivienda($direccion, $numero_casa, $tipo,$estado );

       
        $this->db->close();

        redirect('ControladorVivienda/c_obtenerVivienda');
    }

    public function c_obtenerVivienda()
    {
        
        $this->load->model('ModeloVivienda');

        $datosVivienda = $this->ModeloVivienda->m_selectVivienda();

        $datos['query'] = $datosVivienda;

        $this->load->view('menu');
        $this->load->view('VistaMostrarVivienda', $datos);

        $this->db->close();
    }

    public function c_eliminarVivienda()
    {
        echo $id_captura = $this->uri->segment(3, 0);

        $this->load->model('ModeloVivienda');

        $datosVivienda = $this->ModeloVivienda->m_deleteVivienda($id_captura);

        $this->db->close();
        redirect('ControladorVivienda/c_obtenerVivienda');
    }

    public function c_editarVivienda()
    {

       
        $id_captura = $this->uri->segment(3, 0);

       
        $this->load->model('ModeloVivienda');

        $datosVivienda = $this->ModeloVivienda->m_selectUnVivienda($id_captura);

        $datos['query'] = $datosVivienda;

        $this->load->view('menu');
        $this->load->view('VistaEditarVivienda', $datos);
    }

    public function c_editarViviendaFinal()
    {
        $id_editar = $this->input->get('idOculto');
        $direccion = $this->input->get('CampoDireccion');    
        $numero_casa = $this->input->get('CampoNumero');
        $tipo = $this->input->get('CampoTipo');
        $estado = $this->input->get('Radiobtn');
        $this->load->model('ModeloVivienda');

        $this->ModeloVivienda->m_updateVivienda($id_editar,$direccion, $numero_casa, $tipo, $estado);

        $this->db->close();

       
        redirect('ControladorVivienda/c_obtenerVivienda');
    }
}
