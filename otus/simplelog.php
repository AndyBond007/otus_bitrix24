<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

use ANBLogerTest;

$APPLICATION->SetTitle('Отладка и логирование - часть 1');

echo '<h1>Часть 1</h1>';
echo '<h2>Простое логирование</h2>';
echo "<li><a href='../local/log/simplelog.txt'>Журнал</a></li></br>";

//Сформированная трока для записи в журнал и вывода на экран */
$current_datetime = 'Страница открыта: ' . date("d/m/Y H:i:s");

echo $current_datetime;

ANBLogerTest::addToLog( $current_datetime, 'simplelog');

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
