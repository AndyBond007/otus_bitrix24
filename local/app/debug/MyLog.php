<?php
use Bitrix\Main\Diag\FileExceptionHandlerLog;
use Bitrix\Main\Diag\ExceptionHandlerFormatter;

class ANBLogerTest extends FileExceptionHandlerLog
{
    /**
     * Добавляет строку $message в файл $filename в папку /local/log/
     * @param string $message строка для добавления в журнал
     * @param string $fileName имя файла журнала
     * @return void
     */
   public static function addToLog($message, $fileName )
   {
        $fullLogFileName = $_SERVER['DOCUMENT_ROOT'] . '/local/log/' . $fileName . '.txt';
        $temp_message = date(format:"d.m.Y") . "\n";
        $temp_message.= print_r($message, return: true);
        $temp_message.= "\n";
        $temp_message.= '-----------------------------------------';
        $temp_message.= "\n";
        file_put_contents($fullLogFileName, $temp_message, flags: FILE_APPEND );
   }
}
