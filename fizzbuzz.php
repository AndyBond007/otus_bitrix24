<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

/**
 * @var CMain $Application
 */
$APPLICATION->SetTitle('Решение задачи FizzBuzz для числа, равного 100');

function fizzBuzz( int $limit):void
{
	echo $limit;
    for ($i=0; $i <$limit ; $i++) { 
        if ($i % 3 == 0) {
            echo 'FIZZ';
        } elseif ($i % 5 == 0) {
            echo 'BUZZ';
        } else {
            echo $i;
        }
        echo '</br>';
    }
	echo 'Выполнено!';
}

fizzBuzz(100);

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
?>