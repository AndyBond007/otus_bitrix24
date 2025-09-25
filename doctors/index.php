<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

use Models\Lists\DoctorsPropertyValuesTable as DoctorsTable;

$APPLICATION->SetTitle('Доктора');

$doctors = []; //Массив для хранения данных по докторам
$doctor = []; //Массив для хранения данных по выбранному доктору
$proc = []; //Массив для хранения данных по процедурам

$doctor = DoctorsTable::query()
    ->setSelect([
        '*',
        'NAME' => 'ELEMENT.NAME',
        'ID' => 'ELEMENT.ID'
    ])
    ->fetch();
dump($doctor);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
