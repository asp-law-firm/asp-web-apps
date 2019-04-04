<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{

    private $_table     = 'account';
    private $_module    = 'Login';
    private $_title     = 'Database Jamaah Travel PT. SBL ( dalam PKPU )';
    
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('is_loggedin') === true) {
            redirect('Welcome', 'refresh');
        }
        $this->load->model(array('master_model', 'user_model'));
    }

    public function index()
    {
        $data = array(
            'title'     => $this->_title,
            'class'     => $this->_module,
            'load'      => site_url( $this->_module . '/load' )
        );

        $this->load->view($this->_module . '/main', $data);
    }

    public function load()
    {
        $condition = $this->input->get('param');
        $data = $this->master_model->getOrLike(
            'v_status_sbl', 
            array('nama_after'  => $condition), 
            array('alamat'      => $condition), 
            array('ktp_detail'  => $condition), 
            array('no_urut'     => $condition), 
            array('kuasa'       => $condition)
        );
        // print_debug($data->result());
        echo json_encode($data->result());
    }
}

/* End of file M_Jenisitem.php */


/* End of file  */
/* Location: ./application/controllers/ */
