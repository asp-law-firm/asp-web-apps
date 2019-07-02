<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_News extends MY_Controller
{
    private $_module    = 'M_News';
    private $_title     = 'Berita Terkini Kasus PT. Solusi Balad Lumampah ( dalam PKPU )';
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model(array('master_model'));
        $this->load->library('pagination');
        
    }

    public function index( $num = 0)
    {
        $config['full_tag_open'] = '<ul class="pagination justify-content-center fn-mob">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Sebelumnya';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Selanjutnya';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';    

        $data = array(
            'title'     => $this->_title,
            'class'     => $this->_module,
            'load'      => site_url( $this->_module . '/load' )
        );        
        $config['base_url']     = site_url() . 'master-news/index';
        $config['total_rows']   = $this->master_model->getAll('m_data_news', 'created_on')->num_rows();
        $config['per_page']     = 5;
        $from                   = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['result']         = $this->master_model->getAll('m_data_news', 'created_on','', $config['per_page'], $from)->result();
        $this->load->view($this->_module . '/main', $data);
    }

    public function load()
    {
        $id             = $this->input->get('id');
        $result_news    = master::getDataById(array( 'id' => $id ), 'm_data_news');
        return $result_news;
    }
}
/* End of file M_News.php */
