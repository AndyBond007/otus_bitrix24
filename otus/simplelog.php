<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

use Bitrix\Main\Diag\Debug;

$APPLICATION->SetTitle('Отладка и логирование - часть 1');

echo '<h1>Часть 1</h1>';
echo '<h2>Простое логирование</h2>';

/** @var string Сформированная трока для записи в журнал и вывода на экран */
$current_datetime = 'Страница открыта: ' . date("Y-m-d H:i:s");

echo $current_datetime;

Debug::writeToFile($current_datetime, '', '../local/log/simplelog.txt');

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
