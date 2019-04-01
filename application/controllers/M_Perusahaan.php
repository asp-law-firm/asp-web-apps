<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Perusahaan extends MY_Controller
{

    private $_table     = 'm_data_perusahaan';
    private $_module    = 'M_Perusahaan';
    private $_title     = 'Master Entry Data Perusahaan';

    private $_id        = 'id';
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model(array('master_model'));
    }

    public function index()
    {
        $data = array(
            'content'   => $this->_module . '/main',
            'title'     => $this->_title,
            'class'     => $this->_module,
            'form'      => $this->_module . '/form',
            'action'    => site_url($this->_module . '/saveData'),
            'delete'    => site_url($this->_module . '/deleteData'),
            'edit'      => site_url($this->_module . '/editData'),
            'update'    => site_url($this->_module . '/updateData'),
            'cetak'     => site_url($this->_module . '/printData'),
            'cetak_pe'  => site_url($this->_module . '/printDataRig'),
            'getData'   => site_url($this->_module . '/getDataNasabah'),
        );

        $this->load->view('welcome_message', $data);
    }

    public function getDataNasabah()
    {
        $this->output->set_content_type('application/json', 'utf-8');
        echo $this->master_model->generateDatatablesPerusahaan();
    }

    public function saveData()
    {
        $this->form_validation->set_rules('name', 'Nama', 'trim|required');
        
        if ($this->form_validation->run() == true) {
            $post               = $this->input->post();
            $post['created_by'] = $this->session->userdata('display_name');
            
            $data = master::decode_string($post);
            return master::saveData($data, $this->_table);
        }
    }

    public function deleteData()
    {
        $data = $this->input->post('id');
        return master::deleteData(array($this->_id => $data), $this->_table);
    }

    public function editData()
    {
        $data   = $this->input->post('id');
        return master::getDataById(array($this->_id => $data), $this->_table);
    }

    public function updateData()
    {
        $array_val  = array();
        $id         = $this->input->post('id');
        $data       = $this->input->post('data');
        $data_arr   = explode("&", $data);

        foreach ($data_arr as $key => $value) {
            $data_arr_d   = explode("=", $value);            
            $array_val[$data_arr_d[0]] = $data_arr_d[1];
        }
        $array_val['created_by'] = $this->session->userdata('display_name');
        return master::updateData(master::decode_string($array_val), array('id' => $id), $this->_table);
    }

    public function printData( $id = '')
    {
        $getDataById = $this->master_model->getById(array('id' => $id), $this->_table)->result();
        
        $data = array(
            'date'              => master::getDateIndo(date('D-Y-m-d')),
            'nominal'           => $getDataById[0]->amount,
            'c_address'         => $getDataById[0]->c_address,
            'name'              => $getDataById[0]->customer,
            'documet'           => $getDataById[0]->other_document,
            'bilyet_k'          => $getDataById[0]->bilyet_k,
            'bilyet_k_detail'   => $getDataById[0]->bilyet_k_detail,
            'bilyet_s'          => $getDataById[0]->bilyet_s,
            'bilyet_s_detail'   => $getDataById[0]->bilyet_s_detail,
            'ktp'               => $getDataById[0]->ktp,
            'ktp_detail'        => $getDataById[0]->ktp_detail,
            'bank_evidence'     => $getDataById[0]->bank_evidence,
            'bank_evidence_detail'     => $getDataById[0]->bank_evidence_detail,
            'family_card'       => $getDataById[0]->family_card,
            'family_card_detail'       => $getDataById[0]->family_card_detail,
            'receipt'           => $getDataById[0]->receipt,
            'receipt_detail'           => $getDataById[0]->receipt_detail,
            'passport'          => $getDataById[0]->passport,
            'passport_detail'          => $getDataById[0]->passport_detail,
            'power_of_attorney' => $getDataById[0]->power_of_attorney,
            'power_of_attorney_detail' => $getDataById[0]->power_of_attorney_detail,
            'letter_bill'       => $getDataById[0]->letter_bill,
            'letter_bill_detail'       => $getDataById[0]->letter_bill_detail,
            'other_document'    => $getDataById[0]->other_document,
            'birth_date'        => master::getDateIndoDMY(date('d-m-Y', strtotime($getDataById[0]->birth_date))),
            'birth_city'        => $getDataById[0]->birth_city,
            'phone_number'      => $getDataById[0]->phone_number,
            'email'             => $getDataById[0]->email,
            'id_jamaah'         => $getDataById[0]->id_jamaah,
            'numbering'         => $getDataById[0]->numbering,
        );
        $html = $this->load->view($this->_module . '/cetak_surat_pengajuan', $data, true);
   
        master::cetak($html);
    }

    public function printDataRig( $id = '')
    {
        $data_result = $this->master_model->cetak_rig($id, $this->_table);
        $_result        = $data_result->result();
        $data['id']         = $_result[0]->id;
        $data['numbering']  = $_result[0]->numbering;
        $data['result']     = $_result[0];

        // print_debug($data['result']);

        $arr = array();
        foreach ($_result as $row ) {
            $arr[] = array('Permohonan Tagihan',$row->permohonan_tagihan,nl2br($row->permohonan_tagihan_detail));
            $arr[] = array('KTP ( Jika Bukan Badan Hukum )',$row->ktp,nl2br($row->ktp_detail));
            $arr[] = array('Surat Kuasa ( Jika Dikuasakan )',$row->power_of_attorney,nl2br($row->power_of_attorney_detail));
            $arr[] = array('Fotocopy KTP Pemberi Kuasa',$row->fc_ktp_attorney,nl2br($row->fc_ktp_attorney_detail));
            $arr[] = array('Fotocopy KTP Penerima Kuasa',$row->fc_ktp_owner,nl2br($row->fc_ktp_owner_detail));
            $arr[] = array('Akte Pendirian',$row->akte_pendirian,nl2br($row->akte_pendirian_detail));
            $arr[] = array('Pengesahan Badan Hukum',$row->pengesahan_badan_hukum,nl2br($row->pengesahan_badan_hukum_detail));
            $arr[] = array('Anggaran Dasar Perseroan',($row->anggaran_dasar_perseroan == 3) ? 1 : 0,nl2br($row->anggaran_dasar_perseroan_detail));
            $arr[] = array('a. Perubahan Pertama',$row->amandement_1, '');
            $arr[] = array('b. Perubahan Kedua',$row->amandement_2, '');
            $arr[] = array('c. Perubahan Ketiga',$row->amandement_3, ''); 
        }
        $data['cetak'] = $arr;
	    
        master::cetak($this->load->view($this->_module . '/cetak_tanda_terima', $data, true), '');
    }
}

/* End of file M_Jenisitem.php */
