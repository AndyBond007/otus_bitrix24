<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/** @global $APPLICATION */
$APPLICATION->SetTitle('Доктора');


use Models\Lists\DoctorsPropertyValuesTable as DoctorsTable;
use Models\Lists\ProceduresPropertyValuesTable as ProceduresTable;
use Models\Lists\CustomTable as CustomTable;
use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\TextField;
use Models\AbstractIblockPropertyValuesTable;
use Bitrix\Main\ORM\Fields\FloatField;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Fields\Validators\LengthValidator;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;
use \Bitrix\Iblock\Elements\ElementInfoPagesRuTable;

use Bitrix\Main\Loader;

Loader::includeModule('iblock');

$iblockId = 16;

$entity = Bitrix\Iblock\Iblock::wakeUp($iblockId)->getEntityDataClass();

// echo 'Стандартный вывод через IBlock</br>';

// $result = $entity::getList([
//     'select' => ['ID', 'NAME', 'SURNAME'],
//     'filter' => ['ACTIVE' => 'Y'],
//     'order' => ['SORT' => 'ASC']
// ]);

// while ($element = $result->fetch()) {
//     echo $element['ID'] . ' : ' . $element['NAME'] . ' : ' . $element['SURNAME'] . '</br>';
// }


/*$cars = CarsTable::getList([       
		'select'=>[
          'ID'=>'IBLOCK_ELEMENT_ID',
          'NAME'=>'ELEMENT.NAME',
 		  'MANUFACTURER_ID'=>'MANUFACTURER_ID'
      ]
  ])->fetchAll();
*/
$result = DoctorsTable::getList([
    'select' => [
        '*',
        'ID' => 'IBLOCK_ELEMENT_ID',
        'SURNAME' => 'SURNAME',
        'FIRST_NAME' => 'FIRST_NAME',
        'PROCEDURES' => 'PROCEDURES'
    ]
])->fetchAll();

// dump($result);

foreach ($result as $element) {
    echo $element['ID'] . '. ' . $element['SURNAME'] . ' ' . $element['FIRST_NAME'] . ' ' . $element['PROCEDURES'] . '</br>';
    $temp = @unserialize($element['PROCEDURES'], ['allowed_classes' => false]);
    dump($temp);
}

// query - метод позволяет строить более гибкие и сложные запросы для выборки данных данных через ORM
// получение через метод query списка элементов
// $elements = \Bitrix\Iblock\Elements\ElementDoctorsTable::query() // Doctors - cимвольный код API инфоблока
//     ->addSelect('NAME')
//     ->addSelect('SURNAME') // имя свойства 
//     ->addSelect('PROCEDURESX') // имя свойства 
//     ->addSelect('ID')
//     ->fetchCollection();

// foreach ($elements as $key => $item) {
//     echo $item->getName() . ' ' . $item->getSurname()->getValue(), '</br>'; // получение значения свойства MODEL
//     dump($item->getProceduresx());
//     // $value = $item->getModel()->getValue();

//     // if($value == 'Q7'){
//     //         $item->setModel('Q7 TEST'); // изменение значения свойства MODEL
//     //         $item->save(); // сохранение данных
//     // }
// }

// Получить свойства инфоблока
// $dbIblockProps = \Bitrix\Iblock\PropertyTable::getList(array(
//     'select' => array('*'),
//     'filter' => array('IBLOCK_ID' => $iblockId)
// ));
// while ($arIblockProps = $dbIblockProps->fetch()) {
//     dump($arIblockProps);
// }

// Получить список элементов инфоблока
// $dbItems = \Bitrix\Iblock\ElementTable::getList(array(
//     'select' => array('ID', 'NAME', 'IBLOCK_ID'),
//     'filter' => array('IBLOCK_ID' => $iblockId)
// ));
// $items = [];
// while ($arItem = $dbItems->fetch()) {
//     $dbProperty = \CIBlockElement::getProperty(
//         $arItem['IBLOCK_ID'],
//         $arItem['ID']
//     );
//     while ($arProperty = $dbProperty->Fetch()) {
//         $arItem['PROPERTIES'][] = $arProperty;
//     }
//     $items[] = $arItem;
// }
// dump($items);




// if (!CustomTable::getEntity()->getConnection()->isTableExists(CustomTable::getTableName())) {
//     CustomTable::getEntity()->createDbTable();
// }

// echo 'Кастомный вывод через</br>';

// $result = DoctorsTable::getList([
//     'select' => ['ID', 'NAME', 'PROCEDURESX.ELEMENT.ID'],
//     'filter' => ['ACTIVE' => 'Y'],
//     'order' => ['SORT' => 'ASC']
// ]);

// while ($element = $result->fetch()) {
//     echo $element['ID'] . ' : ' . $element['NAME'] . ' : ' . $element['PROCEDURESX'] . '</br>';
// }



// $doctors = DoctorsTable::getList([
//     'select' => [
//         'ID' => 'IBLOCK_ELEMENT_ID',
//         'SURNAME' => 'SURNAME',
//         'FIRST_NAME' => 'FIRST_NAME',
//         'MID_NAME' => 'MID_NAME',
//         'PROCEDURES' => 'PROCEDURES',
//         'PROCEDURESX' => 'PROCEDURESX'
//     ]
// ])->fetchAll();
// $probaId = 18;
// $proba = Bitrix\Iblock\Elements\ElementProbaTable::getByPrimary(
//     $probaId,
//     array(
//         'select' => [
//             '*',
//             'PROPERTY_68'
//             // 'ID' => 'IBLOCK_ELEMENT_ID',
//             // // 'NAME' => 'ELEMENT.NAME',
//             // 'FIRST_NAME' => 'FIRST_NAME'
//         ]
//     )
// )->fetchAll();

// dump($proba);

// $doctors = DoctorsTable::query()
//     ->setSelect([
//         '*',
//         'ID' => 'IBLOCK_ELEMENT_ID',
//         'SURNAME' => 'SURNAME',
//         'FIRST_NAME' => 'FIRST_NAME',
//         'MID_NAME' => 'MID_NAME',
//         'PROCEDURES' => 'PROCEDURES',
//         'PROCEDURESXX' => 'PROCEDURESXX.ELEMENT.NAME'
//     ])->fetchAll();


// foreach ($doctors as $prItem) {
//     // dump(prItem);
//     echo 'ID: ' . $prItem['ID'] . ' Доктор: ' . $prItem['SURNAME'] . ' ' . $prItem['FIRST_NAME'] . ' ' . $prItem['MID_NAME']  . '</br>';
//     echo 'Proc: ' . $prItem['PROCEDURES'] . '</br>';
//     dump($prItem['PROCEDURES']);
//     dump($prItem['PROCEDURESX']);
// }


//echo 'Доктор: ' . $doctors->getName();

// pr($country->getId()); // ID элемента
// pr($country->getName()); // имя элемента

// pr($country->getCurrency()->getValue()); // свойство элемента Валюта  

// // свойство элемента Столица  
// pr($country->getCapital()->getElement()->getId()); 
// pr($country->getCapital()->getElement()->getName()); 
// pr($country->getCapital()->getElement()->getEnglish()->getValue()); 

// // свойство элемента Города  
// foreach($country->getCities()->getAll() as $prItem) {
//     pr($prItem->getElement()->getEnglish()->getValue().' '.$prItem->getElement()->getName());
//     // pr($prItem->getElement()->get('ID').' '.$prItem->getElement()->get('ENGLISH')->getValue().' '.$prItem->getElement()->getName());
// }


require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
