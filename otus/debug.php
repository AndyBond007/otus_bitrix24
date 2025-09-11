<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

/**
 * @var CMain $Application
 */
$APPLICATION->SetTitle('Домашнее задание - Отладка и тестирование');

echo '<h1>Часть 1</h1>';
$links = array(
array("Открыть страницу","/otus/simplelog.php"),
array("Журнал","../simplelog.log")
);
echo '<ul>';
foreach ($links as $urlitem){ 
echo "<li><a href='".$urlitem[1]."'>".$urlitem[0]."</a></li>";
}
echo '</ul';

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
?>