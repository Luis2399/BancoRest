<?php 

namespace App\Model\CustomRules;

class MyCustomRules
 {
     public function is_valid_cliente(int $id): booL
     {
         $model = new ClienteModeL();
         $cliente = $model->find($id);

        return $cliente == null ? false : true;
     }

     public function is_allow_cliente(int $id): booL
     {
         return $id > 4 ? false : true;
     }
}
