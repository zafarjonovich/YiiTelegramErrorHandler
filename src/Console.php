<?php

namespace zafarjonovich\YiiTelegramErrorHandler;

use zafarjonovich\YiiTelegramErrorHandler\Telegram;

class Console extends \yii\console\ErrorHandler
{
    /** @var array $telegram */
    public $telegram = [];

    protected function renderException($exception)
    {

        try{
            $telegram = new Telegram($this->telegram);
            $telegram->sendExeption($exception);
        }catch (\Exception $exception){
        }

        parent::renderException($exception);
    }
}