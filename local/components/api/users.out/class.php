<?php 
use  BlockMod\Entity\UsersTable;
use  Bitrix\Main\Loader;
class Users extends \CBitrixComponent
{
    
    public function executeComponent()
    {
         $get = (array) $this->request->getQueryList()->toArray();

        Loader::includeModule('block.mod');
        $users =  UsersTable::getList(array(
                        'select' => array('UF_NAME','UF_SURNAME'),
                        //   'filter' => ['UF_NAME'=>$get["name"]]              
              ))->fetchAll();
              if(empty($users))
              header('HTTP/1.1 204 No Content');
          header('Content-Type: application/json; charset=utf-8');
          echo json_encode($users);
    }
}


