<?php
class coupon_model extends CI_Model {
    public function get_coupons() {
        $result = $this->db->get('coupons');
        return $result->result_array();
    }
    
    public function create_coupon($code, $discount, $expiration_date) {
        $data = array(
            'code' => $code,
            'discount' => $discount,
            'expiration_date' => $expiration_date
        );
        $this->db->insert('coupons', $data);
    }

    public function delete($id_coupons) { 
        $this->db->where('id_coupons', $id_coupons);
        $this->db->delete('coupons');
    }

    public function get_coupon($id_coupons) {
        $this->db->select('*');
        $query = $this->db->get_where('coupons', array('id_coupons' => $id_coupons));
        return $query->row_array();
    }

    public function update_coupon($id_coupons, $code, $discount, $expiration_date) {
        $data = array(
            'code' => $code,
            'discount' => $discount,
            'expiration_date' => $expiration_date
        );
        $this->db->where('id_coupons', $id_coupons);
        $this->db->update('coupons', $data);
    }

    public function validate_coupon($code) {
        $query = $this->db->get_where('coupons', array('code' => $code, 'expiration_date >=' => date('Y-m-d')));
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }
}
?>
