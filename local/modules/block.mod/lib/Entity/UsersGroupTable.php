<?

namespace BlockMod\Entity;

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Entity\IntegerField;
use Bitrix\Main\Entity\StringField;
use Bitrix\Main\Entity\ReferenceField;

class UsersGroupTable extends DataManager
{
    public static function  getTableName()
    {
        return 'UsersGroup';
    }

    public static function getMap()
    {
        return [
            new IntegerField(
                'ID',
                [
                    'primary'      => true,
                    'autocomplete' => true,
                    'column_name'  => 'ID'
                ]
            ),


            new StringField(
                'UF_USERS_GROUP',
                [
                    'required'    => true,
                    'column_name' => 'UF_USERS_GROUP',
                    'title'       => 'Название объекта'
                ]

            ),

            new IntegerField(
                'UF_OBJECT_USERS',
                [
                    'required'    => true,
                    'title'       => 'id пользователя',
                    'column_name'  => 'UF_OBJECT_USERS'
                ]
            ),

            new IntegerField(
                'UF_OBJECT_VIRTUALMACHINES',
                [
                    'required'    => true,
                    'title'       => 'id машины',
                    'column_name'  => 'UF_OBJECT_VIRTUALMACHINES'
                ]
            ),

            new IntegerField(
                'UF_OBJECT_TYPE_ID',
                [
                    'required'    => true,
                    'title'       => 'id типа',
                    'column_name'  => 'UF_OBJECT_TYPE_ID'
                ]
            ),

            new ReferenceField(      //связи
                'USERS',
                'BlockMod\Entity\UsersTable',
                [
                    'this.UF_OBJECT_USERS' => 'ref.ID'
                ]
            ),
            new ReferenceField(
                'VIRTUALMACHINES',
                'BlockMod\Entity\VitrualMachinesTable',
                [
                    'this.UF_OBJECT_VIRTUALMACHINES' => 'ref.ID'
                ]
            ),

            new ReferenceField(
                'TYPE',
                'BlockMod\Entity\TypeTable',
                [
                    'this.UF_OBJECT_TYPE_ID' => 'ref.ID'
                ]
            ),
        ];
    }
}
