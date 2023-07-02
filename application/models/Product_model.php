<?php 
class product_model extends CI_Model{ 
    function get_product(){ 
        $result = $this->db->get('product'); return $result; 
    } 
 
    function save($product_name,$product_price, $product_picture){ 
        $data = array('product_name' => $product_name, 
        'product_price' => $product_price, 
        'product_picture' => $product_picture);
        $this->db->insert('product',$data);
    }

    function delete($product_id){ 
        $this->db->where('product_id', $product_id); 
        $this->db->delete('product'); 
    }

    function get_product_id($product_id){ 
        $query = $this->db->get_where('product', array('product_id' => $product_id)); return $query; 
    }

    function update($product_id,$product_name,$product_price,$product_picture){ 
        $data = array(
            'product_name' => $product_name, 
            'product_price' => $product_price, 
            'product_picture' => $product_picture);
        $this->db->where('product_id', $product_id); 
        $this->db->update('product', $data);
    }
    
    function getTotalProducts() {
        // Menghitung total jumlah produk dari tabel 'products'
        return $this->db->count_all('product');
    }
    
    function getProducts($start, $perPage) {
        // Mengambil data produk dari tabel 'products' dengan batasan start dan perPage
        $this->db->limit($perPage, $start);
        $query = $this->db->get('product');
        return $query->result();
    }

    public function find($id) 
    { 
        $result=$this->db->where('product_id',$id) 
        ->limit(1) 
        ->get('product'); 
        if($result->num_rows()>0){ 
        return $result->row(); 
        }else{ 
        return array(); 
        } 
    } 

    public function get_newness($start, $perPage) {
        $this->db->order_by('created_at', 'DESC'); // Ganti created_at dengan nama kolom tanggal pembuatan
        $this->db->limit($perPage, $start);
        $query = $this->db->get('product'); // Ganti 'product' dengan nama tabel yang sesuai dalam database Anda
        return $query->result();
    }

    public function get_lowprice($start, $perPage) {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->order_by('product_price', 'asc');
        $this->db->limit($perPage, $start);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_highprice($start, $perPage) {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->order_by('product_price', 'desc');
        $this->db->limit($perPage, $start);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_name($start, $perPage) {
        $this->db->order_by('product_name', 'ASC'); // Ganti 'product_name' dengan nama kolom yang sesuai dalam tabel produk
        $this->db->limit($perPage, $start);
        $query = $this->db->get('product'); // Ganti 'products' dengan nama tabel yang sesuai dalam database Anda
        return $query->result();
    }

    public function cari($keyword){
        $this->db->like('product_name',$keyword);
        $query = $this->db->get('product');
        return $query->result();
    }
}
?>