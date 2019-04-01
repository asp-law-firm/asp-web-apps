<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{

    private $_table     = 'account';
    private $_module    = 'Login';
    private $_title     = 'Login';
    
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
        $data = $this->master_model->getOrLike('m_data', array('customer' => $condition), array('c_address' => $condition), array('ktp_detail' => $condition), array('numbering' => $condition));
        echo json_encode($data->result());
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');



        if ($this->form_validation->run() == false) {
            if ($this->session->userdata('is_loggedin') === true) {
                redirect('Welcome', 'refresh');
            } else {
                redirect($this->_module, 'refresh');
            }
        } else {
            $data = array(
                'username'  => $this->input->post('username'),
                'password'  => $this->input->post('password'),
            );

            $is_available = $this->user_model->login($data);

            if ($is_available == true) {
                $user = $this->user_model->userProfile($data);

                if ($user) {
                    $session_data = array(
                        'id'            => $user[0]->user_id,
                        'display_name'  => $user[0]->display_name,
                        'role'          => $user[0]->role,
                        'is_loggedin'   => true,
                    );
                    
                    $this->session->set_userdata($session_data);
                    redirect('Welcome', 'refresh');
                }
            } else {
                redirect($this->_module, 'refresh');
            }
        }
    }

    public function signup()
    {
        $data = array(
            'title'     => "Sign Up",
            'action'    => site_url($this->_module . '/signup_process'),
        );
        $this->load->view($this->_module . '/signup', $data);
    }

    public function signup_process()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[account.username]');
        $this->form_validation->set_rules('display_name', 'Display Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');

        if ($this->form_validation->run() == false) {
            redirect($this->_module . '/signup', 'refresh');
        } else {
            $data = array(
                'username'      => $this->input->post('username'),
                'password'      => $this->input->post('password'),
                'display_name'  => $this->input->post('display_name')
            );

            $result = $this->user_model->userSignup($data);

            if ($result == true) {
                redirect($this->_module, 'refresh');
            } else {
                redirect($this->_module . '/signup', 'refresh');
            }
        }
    }
}

/* End of file M_Jenisitem.php */


/* End of file  */
/* Location: ./application/controllers/ */
