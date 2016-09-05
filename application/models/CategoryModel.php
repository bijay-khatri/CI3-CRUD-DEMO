<?php
class CategoryModel extends CI_Model
{
    private $table = 'Category';

    public function getAll(){
        return $this->db->get($this->table)->result();
    }

    public function getCategories(){
        $this->db->select('category_id, category_name');
        return $this->getAll();
    }
}
