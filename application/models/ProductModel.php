<?php
class ProductModel extends CI_Model
{
    private $table = 'Product';

    public function getProducts(){
        return $this->db->get($this->table)->result();
    }

    public function save($product){
        $product_id = filter_var($product->product_id, FILTER_VALIDATE_INT);

        if($product_id > 0){
            unset($product->product_id);
            $this->db->where('product_id', $product_id);
            $this->db->update($this->table, $product);
        }
        else{
            $this->db->insert($this->table, $product);
        }

    }

    public function find($id){
        if($id > 0){
            return $this->db->get_where($this->table, array('product_id' => $id))->row();
        }
        else{
            die("Opps!!! Product doesn't exits.");
        }
    }

    public function delete($id){
        $this->db->limit(1);
        $this->db->where('product_id',$id);
        $this->db->delete($this->table);
    }
}
