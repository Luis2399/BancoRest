<?php namespace App\Models;

 use CodeIgniter\Model;

 class TransaccionModel extends Model
 {
     protected $table       = 'Transaccion';
     protected $primaryKey       = 'id';

     protected $returnType       = 'array';
     protected $allowedFields       = ['cuenta_id', 'tipo_transaccion_id'];

     protected $useTimestamps      = true;
     protected $createdField       = 'created_at';
     protected $updatedField       = 'updated_at';

     protected $validationRules    = [

        'cuenta_id'   => 'required|integer|is_valid_client|is_allow_cliente',
        'tipo_transaccion_id'   => 'required|integer|is_valid_client|is_allow_cliente',
        'monto'   => 'required|numeric',
     ];

     protected $validationMessages = [
        'cliente_id'       =>   [
            'is_valid_cliente'  => 'Estimado usuario, debe ingresar un cliente valido',
            'is_allow_cliente'  => 'Estimado usuario, debe ingresar un cliente de la lista permitida'
        ]
     ];

     protected $skipValidation = false;
    }