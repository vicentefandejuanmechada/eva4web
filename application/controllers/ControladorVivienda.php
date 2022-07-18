<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControladorVivienda extends CI_Controller
{


    public function index()
    {
        $this->load->view('menu');
        $this->load->view('VistaCrearAlumno');
    }

    public function c_guardarAlumno()
    {
        $direccion = $this->input->get('CampoRut');    //esta línea es similar a $rut = $_GET['CampoRut'];
        $numero_casa = $this->input->get('CampoNombre');
        $tipo = $this->input->get('CampoApellido');
        $estado = $this->input->get('Radiobtn');
        //cargamos el ModeloAlumno
        $this->load->model('ModeloVivienda');

        //utilizamo el método m_insertAlumno() del ModeloAlumno
        $this->ModeloVivienda->m_insertAlumno($direccion, $numero_casa, $tipo,$estado );

        //cerramos la BD
        $this->db->close();

        redirect('ControladorVivienda/c_obtenerAlumnos');
    }

    public function c_obtenerAlumnos()
    {
        //cargamos el ModeloAlumno
        $this->load->model('ModeloVivienda');

        //utilizamo el método m_selectAlumnos() del ModeloAlumno
        $datos_alumnos = $this->ModeloVivienda->m_selectAlumnos();

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

        //utilizamo el método m_deleteAlumno() del ModeloAlumno
        $this->ModeloVivienda->m_deleteAlumno($id_captura);

        //cerramos la BD
        $this->db->close();

        /*redireccionamos al método c_obtenerAlumnos q es el encargado de cargar la vista
        con el listado de alumnos*/
        redirect('ControladorVivienda/c_obtenerAlumnos');
    }

    public function c_editarAlumno()
    {

        //capturamos el segmento 3 de la URL q en este caso tiene el id
        $id_captura = $this->uri->segment(3, 0);

        //cargamos el ModeloAlumno
        $this->load->model('ModeloVivienda');

        //utilizamo el método m_deleteAlumno() del ModeloAlumno
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
        $direccion = $this->input->get('CampoRut');    //esta línea es similar a $rut = $_GET['CampoRut'];
        $numero_casa = $this->input->get('CampoNombre');
        $tipo = $this->input->get('CampoApellido');
        $estado = $this->input->get('Radiobtn');
        //cargamos el ModeloAlumno
        $this->load->model('ModeloVivienda');

        //utilizamo el método m_updateAlumno() del ModeloAlumno
        $this->ModeloVivienda->m_updateAlumno($id_editar,$direccion, $numero_casa, $tipo, $estado);

        //cerramos la BD
        $this->db->close();

        /*redireccionamos al método c_obtenerAlumnos q es el encargado de cargar la vista
        con el listado de alumnos*/
        redirect('ControladorVivienda/c_obtenerAlumnos');
    }
}
