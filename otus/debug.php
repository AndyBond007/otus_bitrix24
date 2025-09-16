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
    array("Файл лога из п.1 ДЗ", "/local/log/simplelog.txt"),
    array("Файл, генерирующий лог из п.1 ДЗ", "/otus/simplelog.php"),
    array("Файл с классом лога", "/otus/logfile.php")
);

//Массив списка по второй части д/з
$links_2 = array(
    array("Файл лога из п.2 ДЗ", "/local/log/myerror.txt"),
    array("Файл, генерирующий лог из п.2 ДЗ", "/otus/simpleex.php"),
    array("Файл с классом ловца исключений", "/otus/exfile.php")
);

DrawHomeWork('Часть 1', $links_1);

DrawHomeWork('Часть 2', $links_2);

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
