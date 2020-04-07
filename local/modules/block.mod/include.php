<?php
use Bitrix\Main\Loader;
Loader::registerAutoLoadClasses('block.mod', [
    'BlockMod\Entity\UsersTable' => 'lib/Entity/UsersTable.php',
    'BlockMod\Entity\VitrualMachinesTable' => 'lib/Entity/VitrualMachinesTable.php',
    'BlockMod\Entity\UsersGroupTable' => 'lib/Entity/UsersGroupTable.php',
    'BlockMod\Entity\TypeTable' => 'lib/Entity/TypeTable.php'
]); 
?>

