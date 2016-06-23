<?php
namespace Api\Service;
use Api\Repository\FournisseursRepository;
class FournisseursService implements Service{
    private $repository;
    public function __construct (){
        //TODO: Autogenerated stub. You can do something like $repository = Repository::getInstance();
        $this->repository = new FournisseursRepository();
    }
    public function findAll(){
        $objects = $this->repository->findAll();
        return $objects;
    }
    public function findOne($id){
        $object = $this->repository->findOne($id);
        return $object;
    }
    public function save($object){
        $result = $this->repository->save($object);
        return $result;
    }
    public function update($object){
        $result = $this->repository->update($object);
        return $result;
    }
    public function delete($id){
        $result = $this->repository->delete($id);
        return $result;
    }
}
