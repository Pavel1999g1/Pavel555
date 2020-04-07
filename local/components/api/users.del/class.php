<?

use BlockMod\Entity\ObjectTable;
use Bitrix\Main\Loader;

class UsersDel extends \CBitrixComponent
{
    public function executeComponent()
    {
        
        Loader::includeModule("block.mod");
        if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
            $data = json_decode( $this->request->getInput(),true);
        }
        var_dump($data['id']);
        $result = ObjectTable::delete($data['id']);
        if (empty($result)){
            echo'Ошибка ';
            die();
        }
        echo'yes';
    }
}



