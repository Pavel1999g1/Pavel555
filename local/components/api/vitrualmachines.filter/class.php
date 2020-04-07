<?

use BlockMod\Entity\UsersGroupTable;
use Bitrix\Main\Loader;

class VitrualMachinesFilter extends \CBitrixComponent
{
    public function executeComponent()
    {
        Loader::includeModule("block.mod");
        $get = (array) $this->request->getQueryList()->toArray();
        $users = UsersGroupTable::getList([
            'select' => [
                'usersgroup_type' => 'TYPE.UF_NAME',
                'vitrualmachinestb' => 'VIRTUALMACHINES.ID',
                'usersgroup' => 'UF_USER_GROUP',
                'vitrualmachinesname' => 'VIRTUALMACHINES.UF_VIRTUALMACHINES'
            ],

            'filter' => [
                'VIRTUALMACHINES.ID' => $get['id'],
            ]
        ])->fetchAll();

        //  var_dump($users );
        // die();

        $sel = reset($users );
        // $peremen = [
        //     'vitrualmachines' => $sel['vitrualmachinesname']];
        



        foreach ($users  as $val) {
            $ogbjectres = [
                'vitrualmachines' => $val['vitrualmachinestb'],
                'name' => $val['name'],
                'type' => $val['object_type']

            ];
        
            $peremen[]= $ogbjectres;
        }
            // 'name' => $val['name'],
            // 'type' => $val['object_type']


            // 'vitrualmachines' => $val ['vitrualmachinestb']

            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($peremen);
       
    }
}
