<?php

class User_model extends CI_Model
{
    public function get($user_id = null)
    {
        if ($user_id === null) {
            $q = $this->db->get('users');
        } elseif(is_array($user_id)) {
            $q = $this->db->get_where('users', $user_id);
        } else {
            $q = $this->db->get_where('users',['user_id' => $user_id]);
        }
        return $q->result_array();

    }

    public function insert($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function update($data, $user_id)
    {
        $this->db->where(['user_id' => $user_id]);
        $this->db->update('users', $data);
        return $this->db->affected_rows();
    }

    public function delete($user_id)
    {
        $this->db->delete('users', ['user_id' => $user_id]);
        return $this->db->affected_rows();
    }
}

?>