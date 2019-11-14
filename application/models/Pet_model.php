<?php
class Pet_model extends My_Model {

    function __construct()
    {
        parent::__construct();
        $this->table = 'pet';
    }

    public function getLastestPet() {

        $query = $this->db->query("SELECT * FROM pet");

        return $query->result();
    }

    public function getPetForSales() {
        $query = $this->db->query("SELECT * FROM pet WHERE sale_id is not null");
        return $query->result();
    }

    public function getPetSaleForWeek() {
        $query = $this->db->query("SELECT pet.* FROM pet LEFT JOIN sales on sales.id = pet.sale_id WHERE WEEK(start_date) - WEEK(end_date) = 0");
        return $query->result();
    }
    public function delete_pet_id($id){
        $this->db->where('id',$id);
        $this->db->delete('pet');
    }
    
}