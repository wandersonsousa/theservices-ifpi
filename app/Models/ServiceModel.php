<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $table = "service";
    protected $primaryKey = "id_service";
    protected $allowedFields = ["service_name", "service_description", "service_price", "service_sold","service_img", "id_user"];
    private $view = "vw_service";

    public function findAllFromView(){
        return $this->db->table($this->view)->get()->getResultArray();
    }
}
