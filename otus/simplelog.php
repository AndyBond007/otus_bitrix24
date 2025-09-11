<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

use Bitrix\Main\Diag\Debug;

$APPLICATION->SetTitle('Домашнее задание - Отладка и тестирование');

echo '<h1>Часть 1</h1>';
echo '<h2>Простое логгирование</h2>';

$current_datetime = 'Страница открыта: ' . date("Y-m-d H:i:s");

echo $current_datetime;

Debug::writeToFile( $current_datetime, '', './simplelog.log' );

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
?>