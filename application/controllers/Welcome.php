<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MY_Controller
{
    private $_module    = 'Welcome';

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        if (empty($this->session->userdata('is_loggedin'))) {
            redirect('Login', 'refresh');
        }
    }

    public function index($id = '')
    {
        $data = array(
            'id'            => $id,
            'title'         => 'Dashboard',
            'content'       => 'layouts/dashboard',
            'getJson'       => site_url( $this->_module . '/getDataNasabah' ),
            'checkDetail'   => site_url( $this->_module . '/checkDetail' ),
            'print_pdf'     => site_url( $this->_module . '/printToPdf' ),
            'print_pdf_non' => site_url( $this->_module . '/printToPdfNon' ),
            'print_excel'   => site_url( $this->_module . '/printToExcel' ),
            'print_excel_non'   => site_url( $this->_module . '/printToExcelNon' ),
            'getSum'        => site_url( $this->_module . '/getSum' ),
            'getSumTotal'   => site_url( $this->_module . '/getSumTotal'),
            'getSumPerToday'            => site_url( $this->_module . '/getSumPerToday' ),
            'getSumNonNasabahPerToday'  => site_url( $this->_module . '/getSumNonNasabahPerToday' )
        );

        $this->load->view('welcome_message', $data);
    }

    public function loadData(Type $var = null)
    {
        # code...
    }
}
