<?

namespace BlockMod\Entity;

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Entity\IntegerField;
use Bitrix\Main\Entity\StringField;

class UsersTable extends DataManager
{
    public static function getTableName()
    {
        return 'users';
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
                'UF_SURNAME',
                [
                    'required'    => true,
                    'column_name' => 'UF_SURNAME',
                    'title'       => 'Фамилия'
                ]
            ),

            new StringField(
                'UF_NAME',
                [
                    'required'    => true,
                    'column_name' => 'UF_NAME',
                    'title'       => 'Имя'
                ]
            ),
        ];
    }
};