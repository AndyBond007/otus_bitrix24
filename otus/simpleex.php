<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$APPLICATION->SetTitle('Отладка и логирование - часть 2');

echo "<li><a href='../local/log/myerror.txt'>Журнал</a></li></br>";

echo 1 / 0;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
