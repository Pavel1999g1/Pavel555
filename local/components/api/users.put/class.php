<?

use BlockMod\Entity\ObjectTable;
use Bitrix\Main\Loader;

class ObjectPut extends \CBitrixComponent
{
    public function executeComponent()
    {
        Loader::includeModule("block.mod");
        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            $putdata = json_decode($this->request->getInput(), true);
        }

        // var_dump($putdata['id']); 
        // die();
        
        $objUp = [ 
            'UF_USERGROUP_OBJECT' => $putdata['usersgroup'],
            'UF_OBJECT_USERS' => $putdata['objectUsers'],
            'UF_OBJECT_VIRTUALMACHINES' => $putdata['vitrualmachines'],
            'UF_OBJECT_TYPE_ID' => $putdata['type']
        ];
        // var_dump($objUp);
        // die();
        $resultObj = UsersGroupTable::update($putdata['id'], $objUp);
        // var_dump($resultObj);
        // die();
        if (empty($resultObj)) {
 
            var_dump($resultObj);
            echo 'Ошибка';
            die();
        }
        
        // echo"Успешно!";

        // $upDt = [
        //     'USERS.UF_NAME' => 'name',
        //     'USERS.UF_SURNAME' => 'surname',
        //     'TYPE.UF_NAME' => 'type',
        //     'UF_NAME_OBJECT' => 'UsersGroup'
        // ];


        
    }
}


// $_PUT = array(); 
// if($_SERVER['REQUEST_METHOD'] == 'PUT') { 
//   $putdata = file_get_contents('php://input'); 
//   $exploded = explode('&', $putdata);  
 
//   foreach($exploded as $pair) { 
//     $item = explode('=', $pair); 
//     if(count($item) == 2) { 
//       $_PUT[urldecode($item[0])] = urldecode($item[1]); 
