<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$APPLICATION->SetTitle('Отладка и логирование - Файл с классом ловца исключений');

highlight_file('../local/app/debug/FileExaptionHandlerLogCustom.php');

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
