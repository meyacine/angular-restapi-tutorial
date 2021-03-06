<?php
namespace Api\Service;
use Api\Repository\ProduitsRepository;
class ProduitsService implements Service{
    private $repository;
    private $fournisseur;
    public function __construct (){
        //TODO: Autogenerated stub. You can do something like $repository = Repository::getInstance();
        $this->repository = new ProduitsRepository();
        $this->fournisseur = new FournisseursService();
    }
    public function findAll(){
        $objects = $this->repository->findAll();
        $fournisseurId = 0;
        $fournisseur = null;
        for($i=0; $i<sizeof($objects); $i++){
            if ($fournisseurId != $objects[$i]['fournisseurs_id']){
                $fournisseur = $this->fournisseur->findOne($objects[$i]['fournisseurs_id']);
                $fournisseurId = $objects[$i]['fournisseurs_id'];
            }
            $objects[$i]['fournisseur'] = $fournisseur;
        }
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
