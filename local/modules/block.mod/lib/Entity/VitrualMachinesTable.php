<?

namespace BlockMod\Entity;

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Entity\IntegerField;
use Bitrix\Main\Entity\StringField;

class VitrualMachinesTable extends DataManager
{

    public static function getTableName()
    {
        return 'vitrualmachines';
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
                'UF_VIRTUALMACHINES',
                [
                    'required'    => true,
                    'column_name' => 'UF_VIRTUALMACHINES',
                    'title'       => 'Название'
                ]
            ),

        ];
    }
}
