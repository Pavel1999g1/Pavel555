<?php 
use  BlockMod\Entity\VitrualMachinesTable;
use  Bitrix\Main\Loader;
class VitrualMachines extends \CBitrixComponent
{
    
    public function executeComponent()
    {
         $get = (array) $this->request->getQueryList()->toArray();

        Loader::includeModule('block.mod');
        $users =  VitrualMachinesTable::getList(array(
                        'select' => array('UF_VIRTUALMACHINES'),
                        //  'filter' => ['UF_VIRTUALMACHINES'=>$get["nameVitrualMachines"]]              
              ))->fetchAll();
              if(empty($users ))
              header('HTTP/1.1 204 No Content');
          header('Content-Type: application/json; charset=utf-8');
          echo json_encode($users );
    }
}


