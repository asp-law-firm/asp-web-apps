<?php

defined('BASEPATH') or exit('No direct script access allowed');

class API_Data extends MY_Controller
{

    private $_module    = 'API_Data';
    
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        //Do your magic here
        $this->load->model(array('master_model'));
    }

    public function save()
    {
        $obj        = json_decode(file_get_contents('php://input'), true);
        $data       = $obj['body'];
        $saveData   = $this->master_model->save($data, 'm_data_news');
        echo json_encode($saveData);
    }

    public function saveImage()
    {
        $obj  = json_decode(file_get_contents('php://input'), true);
        echo json_encode($obj);
    }
}

/* End of file API_Data.php */


/* End of file  */
/* Location: ./application/controllers/ */
