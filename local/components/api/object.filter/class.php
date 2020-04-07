<?

use BlockMod\Entity\ObjectTable;
use Bitrix\Main\Loader;

class UsersFilter extends \CBitrixComponent
{
    public function executeComponent()
    {
        Loader::includeModule("block.mod");
        $get = (array) $this->request->getQueryList()->toArray();
        $users = ObjectTable::getList([
            'select' => [
                'users_name' => 'USERS.UF_NAME',
                'users_surname' => 'USERS.UF_SURNAME',
                'object_type' => 'TYPE.UF_NAME',
                'name' => 'UF_NAME_OBJECT',
                'vitrualmachinestb' => 'VIRTUALMACHINES.ID',
                'vitrualmachines' => 'VIRTUALMACHINES.UF_GENRE'
            ],

            'filter' =>
array_filter(
            
                // 'LOGIC' => 'OR',

                // [
                //     'USERS.ID' => $get['idA'],
                // ],
                // [
                //     'VIRTUALMACHINES.ID' => $get['idG']
                // ],


                // 'LOGIC' => 'AND',

                [
                    'USERS.ID' => $get['idA'],
                    'VIRTUALMACHINES.ID' => $get['idG']
                ]

            )
        ])->fetchAll();
        // var_dump($users['name']);
        // die();

        $sel = reset($users);
        // $res = [
        //     'users _name' => $sel['users_name'],
        //     'users _surname' => $sel['users _surname']
        // ];
        foreach ($users as $val) {
            $ogbjectres[] = [
                
                    'name' => $val['name'],
                    'type' => $val['object_type'],
              
                "users" => [
                    'name' => $val['users_name'],
                    'surname' => $val['users_surname']
                ],
                'vitrualmachines' => [
                    'vitrualmachinesID' => $val['vitrualmachinestb'],
                    'name' => $val['vitrualmachinesname'],
                ]

            ];
            // array_push($res, $ogbjectres);
        };

        // foreach ($users as $val) {
        //     $ogbjectres = [
        //         'vitrualmachines' => $val['genretb'],
        //         'name' => $val['name'],
        //         'type' => $val['object_type']

        //     ];

        //     $peremen[]= $ogbjectres;
        // }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($ogbjectres);
    }
}
