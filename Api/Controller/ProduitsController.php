<?php
namespace Api\Controller;
use Api\Service\ProduitsService;
class ProduitsController extends JsonController implements Controller{
    private $service;
    public function __construct (){
        //TODO: Autogenerated stub. You can process you buisiness in this class
        parent::__construct();
        $this->service = new ProduitsService();
    }
    public function findAll(){
        $objects = $this->service->findAll();
        $result = ["error"=>false,"message"=>"Objects get!", "data"=>$objects];
        echo json_encode($result);
    }
    public function findOne($id){
        $object = $this->service->findOne($id);
        $result = ["error"=>false,"message"=>"Object get!", "data"=>$object];
        echo json_encode($result);
    }
    public function save(){
        $object = parent::getDataFromJsonHeader();
        $result = $this->service->save($object);
        if ($result==0){
            $result = ["error"=>true,"message"=>"Couldn't save object, please check format!"];
        } else {
            $result = ["error"=>false,"message"=>"Object saved!", "data"=>$result];
        }
        echo json_encode($result);
    }
    public function update(){
        $object = parent::getDataFromJsonHeader();
        $result = $this->service->update($object);
        if ($result==0){
            $result = ["error"=>true,"message"=>"Couldn't update object, please check format!"];
        } else {
            $result = ["error"=>false,"message"=>"Object updated!", "data"=>$result];
        }
        echo json_encode($result);
    }
    public function delete($id){
        $result = $this->service->delete($id);
        if ($result==0){
            $result = ["error"=>true,"message"=>"Couldn't delete object, please check format!"];
        } else {
            $result = ["error"=>false,"message"=>"Object deleted!", "data"=>$result];
        }
        echo json_encode($result);
    }
}
