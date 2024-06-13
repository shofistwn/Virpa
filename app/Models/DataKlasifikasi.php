<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKlasifikasi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'data_klasifikasi';
    protected $primaryKey       = 'id_klasifikasi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'jenis_kelamin',
        'umur',
        'berat_badan',
        'tinggi_badan_cm',
        'tinggi_badan_m',
        'lingkar_kepala',
        'imt',
        'status_gizi',
        'accuracy',
        'precision',
        'recall',
    ];

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
