<?php

namespace App\Models;

use CodeIgniter\Model;

class BayiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'bayi';
    protected $primaryKey       = 'id_bayi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'kode_bayi', 'nama_bayi', 'umur', 'berat_badan', 'tgl_lahir', 'tinggi_badan', 'lingkar_kepala', 'jenis_kelamin', 'imt', 'status_gizi', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
