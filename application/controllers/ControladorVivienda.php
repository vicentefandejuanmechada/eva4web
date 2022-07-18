<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControladorVivienda extends CI_Controller
{


    public function index()
    {
        $this->load->view('menu');
        $this->load->view('VistaCrearAlumno');
    }

    public function c_guardarVivienda()
    {
        $direccion = $this->input->get('CampoDireccion');    //esta línea es similar a $rut = $_GET['CampoDireccion'];
        $numero_casa = $this->input->get('CampoNumero');
        $tipo = $this->input->get('CampoTipo');
        $estado = $this->input->get('Radiobtn');
        //cargamos el ModeloAlumno
        $this->load->model('ModeloVivienda');

        //utilizamo el método m_insertVivienda() del ModeloAlumno
        $this->ModeloVivienda->m_insertVivienda($direccion, $numero_casa, $tipo,$estado );

        //cerramos la BD
        $this->db->close();

        redirect('ControladorVivienda/c_obtenerVivienda');
    }

    public function c_obtenerVivienda()
    {
        //cargamos el ModeloAlumno
        $this->load->model('ModeloVivienda');

        //utilizamo el método m_selectVivienda() del ModeloAlumno
        $datos_alumnos = $this->ModeloVivienda->m_selectVivienda();

        //creamos un array asociativo para almacenar la consulta de la BD.
        $datos['query'] = $datos_alumnos;

        //cargamos la vista y le pasamos los datos.
        $this->load->view('menu');
        $this->load->view('VistaMostrarAlumnos', $datos);

        //cerramos la BD
        $this->db->close();
    }

    public function c_eliminarAlumno()
    {
        //capturamos el segmento 3 de la URL q en este caso tiene el id
        echo $id_captura = $this->uri->segment(3, 0);

        //cargamos el ModeloAlumno
        $this->load->model('ModeloVivienda');

        //utilizamo el método m_deleteVivienda() del ModeloAlumno
        $datos_alumnos = $this->ModeloVivienda->m_deleteVivienda($id_captura);

        //cerramos la BD
        $this->db->close();

        /*redireccionamos al método c_obtenerVivienda q es el encargado de cargar la vista
        con el listado de alumnos*/
        redirect('ControladorVivienda/c_obtenerVivienda');
    }

    public function c_editarAlumno()
    {

        //capturamos el segmento 3 de la URL q en este caso tiene el id
        $id_captura = $this->uri->segment(3, 0);

        //cargamos el ModeloAlumno
        $this->load->model('ModeloVivienda');

        //utilizamo el método m_deleteVivienda() del ModeloAlumno
        $datos_alumnos = $this->ModeloVivienda->m_selectUnAlumno($id_captura);

        //creamos un array asociativo para almacenar la consulta de la BD.
        $datos['query'] = $datos_alumnos;

        //cargamos la vista y le pasamos los datos.
        $this->load->view('menu');
        $this->load->view('VistaEditarAlumno', $datos);
    }

    public function c_editarAlumnoFinal()
    {
        $id_editar = $this->input->get('idOculto');
        $direccion = $this->input->get('CampoDireccion');    //esta línea es similar a $rut = $_GET['CampoDireccion'];
        $numero_casa = $this->input->get('CampoNumero');
        $tipo = $this->input->get('CampoTipo');
        $estado = $this->input->get('Radiobtn');
        //cargamos el ModeloAlumno
        $this->load->model('ModeloVivienda');

        //utilizamo el método m_updateAlumno() del ModeloAlumno
        $this->ModeloVivienda->m_updateAlumno($id_editar,$direccion, $numero_casa, $tipo, $estado);

        //cerramos la BD
        $this->db->close();

        /*redireccionamos al método c_obtenerVivienda q es el encargado de cargar la vista
        con el listado de alumnos*/
        redirect('ControladorVivienda/c_obtenerVivienda');
    }
}
