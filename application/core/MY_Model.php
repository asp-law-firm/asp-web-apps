<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
    class MY_Model extends CI_Model {

        public function getByQuery($query)
        {
            return $this->db->query($query);
        }

        public function getAll($table, $orderBy = '', $select = '*')
        {
            $this->db->select($select);
            $this->db->from($table);
            if($orderBy) {
                $this->db->order_by($orderBy, 'asc');
            }
            return $this->db->get();
        }

        public function getById($condition = array(), $table = '')
        {
            $this->db->select('*');
            $this->db->from($table);
            if(!empty($condition)) {
                $this->db->where($condition);
            }
            return $this->db->get();
        }

        public function getOrLike($table = '', $condition = array(), $or_like = array(), $or_like_2 = array(), $or_like_3 = array(), $or_like_4 = array())
        {
            $this->db->select('*');
            $this->db->from($table);
            if(strlen($condition['customer']) <= 5 && is_numeric($condition['customer'])) {
                $this->db->where('numbering', $or_like_3['numbering']);
            } else {
                if(!empty($condition)) {
                    $this->db->like($condition);
                }
    
                if(!empty($or_like)) {
                    $this->db->or_like($or_like);
                }
    
                if(!empty($or_like_2)) {
                    $this->db->or_like($or_like_2);
                }
    
                if(!empty($or_like_3)) {
                    $this->db->or_like($or_like_3);
                }

                if(!empty($or_like_4)) {
                    $this->db->or_like($or_like_4);
                }
            }            
            return $this->db->get();
        }

        public function getLike($table = '', $condition = array(), $where_condition = array(), $or_like = array(), $or_like_2 = array())
        {
            $this->db->select('*');
            $this->db->from($table);
            if(!empty($condition)) {
                $this->db->like($condition);
            }

            if(!empty($or_like)) {
                $this->db->or_like($or_like);
            }

            if(!empty($or_like_2)) {
                $this->db->or_like($or_like_2);
            }

            if(!empty($where_condition)) {
                $this->db->where($where_condition);
            }
            return $this->db->get();
        }

        public function save($data = array(), $table = '')
        {
            return $this->db->insert($table, $data);
        }

        public function update($data = array(), $condition = array(), $table = '')
        {
            if(!empty($condition)) {
                return $this->db->update($table, $data, $condition);
            }
        }

        public function delete($condition = array(), $table = '')
        {
            if(!empty($condition)) {
                $this->db->where($condition);
                return $this->db->delete($table);
            }
        }
    }
    /* End of file ModelName.php */
?>