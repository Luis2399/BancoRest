<?php namespace App\Controllers\API;

use App\Models\TiposTransaccionModel;
use CodeIgniter\RESTful\ResourceController;

class Clientes extends ResourceController
 {
    public function __construct(){
        $this->model = $this->setModel(new TiposTransaccionModel());
    }
       
   public function index()
    {
        $TiposTransaccion = $this->model->findAll();
        return $this->respond($clientes);
    } 
    public function create()
    {
    try{

        $TiposTransaccion = $this->request->getJSon();
        if($this->model->insert($TiposTransaccion)):
            $TiposTransaccion->id = $this->model->insertID();
            return $this->respondCreated();
        else:
            return $this->failValidationError($this->model->validation->listError());

        endif;
    } catch (\Exception $e){
       return $this->failServerError('Ha ocurrido un error en el servidor');
    }
    }
    public function edit($id = null)
    {
        try{

            if($id == null);
              return $this->failValidationError('No se ha pasado un Id valido');

              $TiposTransaccion = $this->model->find($id);

              if($TiposTransaccion == null)
                return $this->failNotFound('No se ha encontrado un cliente con el id:'.$id);
                
            return $this->respond($TiposTransaccion);

        } catch (\Exception $e){
           return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function update($id = null)
    {

    
    
        try{

            if($id == null);
              return $this->failValidationError('No se ha pasado un Id valido');

              $TiposTransaccionVerificado = $this->model->find($id);

              if($TiposTransaccionVerificado == null)
                return $this->failNotFound('No se ha encontrado un cliente con el id:'.$id);
                
               $TiposTransaccion = $this->request->getJSon();
               
               if($this->model->update($id, $cliente)):
                $TiposTransaccion->id = $id;
                return $this->respondUpdated($TiposTransaccion);
            else:
                return $this->failValidationError($this->model->validation->listError());
    
            endif;
               

        } catch (\Exception $e){
           return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function delete($id = null)
    {
        try{

            if($id == null);
              return $this->failValidationError('No se ha pasado un Id valido');

              $TiposTransaccionVerificado = $this->model->find($id);

              if($TiposTransaccionVerificado == null)
                return $this->failNotFound('No se ha encontrado un cliente con el id:'.$id);
                
               
               if($this->model->delete($id)):
                return $this->respondDelete($TiposTransaccionVerificado);
            else:
                return $this->failServerError('No se ha podido eliminar el registro');
    
            endif;
               

        } catch (\Exception $e){
           return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }
 }