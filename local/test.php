<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

use Bitrix\Main\Loader;
use Bitrix\Currency\CurrencyTable;


Loader::includeModule('currency');

// Получаем список всех валют
$result = CurrencyTable::getList([
    'select' => ['CURRENCY', 'AMOUNT', 'AMOUNT_CNT', 'SORT', 'BASE'],
    'order' => ['SORT' => 'ASC']
]);

while ($currency = $result->fetch()) {
    echo 'Валюта: ' . $currency['CURRENCY']
        . ', Курс: ' . $currency['AMOUNT']
        . ', Количество: ' . $currency['AMOUNT_CNT']
        . '<br>';
}

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
