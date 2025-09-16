<?php

use Bitrix\Main\Diag\FileExceptionHandlerLog;
use Bitrix\Main\Diag\ExceptionHandlerFormatter;

class FileExaptionHandlerLogCustom extends FileExceptionHandlerLog
{
   /**
    * @param \Throwable $exception
    * @param int $logType
    */
   public function write($exception, $logType)
   {
      $text = ExceptionHandlerFormatter::format($exception, false, $this->level);

      $type = static::logTypeToString($logType);

      $message = "OTUS: {date} - Host: {host} - {$type} - {$text}\n";

      $this->writeToLog($message);
   }
}
