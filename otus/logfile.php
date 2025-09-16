<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$APPLICATION->SetTitle('Отладка и логирование - Файл с классом лога');

highlight_file('../local/app/debug/MyLog.php');

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
