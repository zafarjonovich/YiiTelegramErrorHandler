<?php

namespace zafarjonovich\YiiTelegramErrorHandler;

use yii\base\ErrorException;
use yii\base\Exception;
use yii\base\UserException;
use yii\web\HttpException;

class Helper
{
    /**
     * Converts an exception into an array.
     * @param \Exception|\Error $exception the exception being converted
     * @return array the array representation of the exception.
     */
    public static function convertExceptionToArray($exception)
    {
        $array = [
            'name' => ($exception instanceof Exception || $exception instanceof ErrorException) ? $exception->getName() : 'Exception',
            'message' => $exception->getMessage(),
            'code' => $exception->getCode(),
        ];
        
        if ($exception instanceof HttpException) {
            $array['status'] = $exception->statusCode;
        }

        $array['type'] = get_class($exception);
        if (!$exception instanceof UserException) {
            $array['file'] = $exception->getFile();
            $array['line'] = $exception->getLine();
            $array['stack-trace'] = explode("\n", $exception->getTraceAsString());
            if ($exception instanceof \yii\db\Exception) {
                $array['error-info'] = $exception->errorInfo;
            }
        }
        
        if (($prev = $exception->getPrevious()) !== null) {
            $array['previous'] = self::convertExceptionToArray($prev);
        }

        return $array;
    }
}