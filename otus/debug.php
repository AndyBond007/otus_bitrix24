<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$APPLICATION->SetTitle('Отладка и логирование');

function DrawHomeWork($title, $links)
{
    echo '<h1>' . $title . '</h1>';
    echo '<ul>';

    foreach ($links as $urlitem) {
        echo "<li><a href='" . $urlitem[1] . "'>" . $urlitem[0] . "</a></li>";
    }
    echo '</ul>';
    echo '</br>';
}

//Массив списка по первой части д/з
$links_1 = array(
    array("Файл лога из п.1 ДЗ", "../local/log/simplelog.txt"),
    array("Файл, генерирующий лог из п.1 ДЗ", "/otus/simplelog.php"),
    array("Файлс классом ловца исключений", "../local/app/debug/FileExaptionHandlerLogCustom.php")
);

//Массив списка по второй части д/з
$links_2 = array(
    array("Файл лога из п.2 ДЗ", "../myerror.txt"),
    array("Файл, генерирующий лог из п.2 ДЗ", "/otus/simpleex.php"),
    array("Файлс классом ловца исключений", "../local/app/debug/FileExaptionHandlerLogCustom.php")
);

DrawHomeWork('Часть 1', $links_1);

DrawHomeWork('Часть 2', $links_2);

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
