<?
use BlockMod\Entity\UsersTable;
use Bitrix\Main\Loader;

class UsersAdd extends \CBitrixComponent
{
    public function executeComponent()
    {
        Loader::includeModule("block.mod");
        $post = (array) $this->request->getPostList()->toArray();
        
        $arFields = [
        "UF_NAME" =>$post["name"],
        "UF_SURNAME"=>$post["surName"]
        ];  
        
        if(empty($post["name"]))
        {
            header('HTTP/1.1 400 Bad Request');
            echo "Не введено имя. Это обязательное поле!";
            die();
        }

        if(empty($post["surName"])){
            header('HTTP/1.1 400 Bad Request');
            echo "Не введена фамилия. Это обязательное поле!";
            die();
        }
        $result = UsersTable::add($arFields);

        if(empty($result)){
            echo"Ошибка при сохранении данных";
            die();
        }
        
        echo"Ваши данные сохранены в Json-формате!";
    
        
    }
}


// class UsersChange extends \CBitrixComponent 
// {
//     public function executeComponent()
//     {
//         Loader::includeModule("block.mod");
//         $post = (array) $this->request->getPostList()->TOaRRAY();
//         ObjectUsers::getlist(
//             'select' => [
//                 'Users.UF_NAME', 'Users.UF_SURNAME', 'Oject.UF_NAME_OBJECT'
//                 ],
//                 'filter'=> [
//             'Oject.ID' =>$post['ID']
//             ]
//             );
//     }
// }



// UserRoleTable::getList(
//         'select' => [
//             'USER.UF_NAME' => 'user_name'
//         ],
//         'filter' => [
//             'ROLE.ID' => $roleId
//         ]
//     )