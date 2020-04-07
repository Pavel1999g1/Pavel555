<?

namespace BlockMod\Entity;

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Entity\IntegerField;
use Bitrix\Main\Entity\StringField;

class TypeTable extends DataManager
{
    public static function  getTableName()
    {
        return 'object_type';
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
                'UF_NAME',
                [
                    'required'    => true,
                    'column_name' => 'UF_NAME',
                    'title'       => 'Тип'
                ]

            ),
        ];
    }
}