<?php

class master
{

    private static $_json = 'application/json';
    private static $bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
    );
    
    private static $_day = array(
        'Sun'   => 'Minggu',
        'Mon'   => 'Senin',
        'Thu'   => 'Selasa',
        'Wed'   => 'Rabu',
        'Thu'   => 'Kamis',
        'Fri'   => 'Jumat',
        'Sat'   => 'Sabtu',
    );    

    private static function status($data)
    {
        if (!empty($data)) {
            return false;
        } else {
            return true;
        }
    }

    private static function statusSaved($data)
    {
        if ($data) {
            return label::$savedSuccess;
        } else {
            return label::$savedFailed;
        }
    }

    private static function statusDeleted($data)
    {
        if ($data) {
            return label::$deletedSuccess;
        } else {
            return label::$deletedFailed;
        }
    }

    private static function statusUpdated($data)
    {
        if ($data) {
            return label::$updatedSuccess;
        } else {
            return label::$updatedFailed;
        }
    }

    private static function statusCode($data)
    {
        if ($data) {
            return 200;
        } else {
            return 500;
        }
    }

    public static function decode_string($array_data = array())
    {
        $posts = array();
        if(!empty($array_data)) {
            foreach ($array_data as $key => $value) {
                $posts[$key] = urldecode($value);
            }
        }
        return $posts;
    }

    public static function escape_string($array_data = array())
    {
        
        $CI =& get_instance();
        
        $posts = array();
        if(!empty($array_data)) {
            foreach ($array_data as $key => $value) {
                $posts[$key]    =   $CI->db->escape($value);
            }
        }
        return $posts;
    }

    public static function getDateIndo($date)
    {
        $pecahkan = explode('-', $date);

        return self::$_day[$pecahkan[0]] . ' ' . $pecahkan[3] . ' ' . self::$bulan [ (int)$pecahkan[2] ] . ' ' . $pecahkan[1];
    }

    public static function getDateIndoDMY($date)
    {
        $pecahkan = explode('-', $date);

        return $pecahkan[0] . ' ' . self::$bulan [ (int)$pecahkan[1] ] . ' ' . $pecahkan[2];
    }
    

    private static function responseData($errStatus = '', $dataRes = '', $recordRows = '', $recordsFiltered = '')
    {
        return array('error' => $errStatus, 'recordsTotal' => $recordRows, 'recordsFiltered' => $recordsFiltered, 'data' => $dataRes);
    }

    private static function responseDataSelect($dataRes = '')
    {
        return array('data' => $dataRes);
    }

    public static function returnJson($data)
    {
        $response = self::responseData(self::status($data->num_rows()), $data->result(), $data->num_rows(), $data->num_rows());
        
        if (!empty($data)) {
            return self::setResponse($response, 200, self::$_json);
        } else {
            return self::setResponse($response, 500, self::$_json);
        }
    }

    public static function returnJsonTable($data)
    {
        $response = self::responseDataTable(self::status($data->num_rows()), $data->result(), $data->num_rows(), $data->num_rows());
        
        if (!empty($data)) {
            return self::setResponse($response, 200, self::$_json);
        } else {
            return self::setResponse($response, 500, self::$_json);
        }
    }

    private static function responseDataTable($errStatus = '', $dataRes = '', $recordRows = '', $recordsFiltered = '')
    {
        return array('recordsTotal' => $recordRows, 'recordsFiltered' => $recordsFiltered, 'data' => $dataRes);
    }

    public static function setResponse($response = '', $code = '', $type_data = '')
    {
        $CI =& get_instance();
        return $CI->output
                ->set_status_header($code)
                ->set_content_type($type_data, 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    }

    public static function responseGetData($table = '', $condition = array())
    {
        $CI =& get_instance();
        $CI->load->model(array('master_model'));
        $data = $CI->master_model->getAll($table);
        return self::returnJsonTable($data);
    }

    public static function saveData($data = array(), $table = '')
    {
        $CI =& get_instance();
        $CI->load->model(array('master_model'));

        $status_saved   = $CI->master_model->save($data, $table);
        $response       = self::responseData(!$status_saved, self::statusSaved($status_saved));

        self::_createLogActivity('memasukan data ke ' . $table, $data['id']);
        return self::setResponse($response, self::statusCode($status_saved), self::$_json);
    }

    public static function deleteData($data = array(), $table = '')
    {
        $CI =& get_instance();
        $CI->load->model(array('master_model'));

        $numbering = $CI->master_model->getNumbering($data['id'], $table);

        $status_deleted     = $CI->master_model->delete($data, $table);
        $response           = self::responseData(!$status_deleted, self::statusDeleted($status_deleted));

        self::_createLogActivity('menghapus data  ' . $table . 'No. Urut : ' . $numbering->numbering, $data['id']);
        return self::setResponse($response, self::statusCode($status_deleted), self::$_json);
    }

    public static function getAllData($table = '')
    {
        $CI =& get_instance();
        $CI->load->model(array('master_model'));

        $data       = $CI->master_model->getAll($table);
        $response   = self::responseData(self::status($data->num_rows()), $data->result(), '', '');

        return self::setResponse($response, self::statusCode($data), self::$_json);
    }

    public static function getDataSelect($table = '', $condition = array(), $where_condition = array())
    {
        $CI =& get_instance();
        $CI->load->model(array('master_model'));

        $data       = $CI->master_model->getLike($table, $condition, $where_condition);
        $response   = self::responseDataSelect($data->result());

        return self::setResponse($response, self::statusCode($data), self::$_json);
    }

    public static function getDataById($condition = array(), $table = '')
    {
        $CI =& get_instance();
        $CI->load->model(array('master_model'));

        $data       = $CI->master_model->getById($condition, $table);
        $response   = self::responseData(self::status($data->num_rows()), $data->result(), '', '');

        return self::setResponse($response, self::statusCode($data), self::$_json);
    }

    public static function updateData($data = array(), $condition = array(), $table = '')
    {
        $CI =& get_instance();
        $CI->load->model(array('master_model'));

        $status_update  = $CI->master_model->update($data, $condition, $table);
        $response       = self::responseData(self::status($status_update), self::statusUpdated($status_update), '', '');

        self::_createLogActivity('update data table . ' . $table, $condition['id']);
        return self::setResponse($response, self::statusCode($status_update), self::$_json);
    }

    private static function _createLogActivity($activity = '', $data = '')
    {
        $CI =& get_instance();
        $CI->load->model(array('master_model'));

        $data = array(
            'username'      => $CI->session->userdata('display_name'),
            'ip_address'    => $CI->input->ip_address(),
            'activity'      => $activity,
            'data'          => $data
        );

        return $CI->master_model->save($data, 'log_activity');
    }

    public static function cetak($html = '', $orientation = '', $title = '')
    {
        mpdf::print_pdf($html, $orientation, $title);
    }    
}
