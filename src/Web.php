<?php

namespace zafarjonovich\YiiTelegramErrorHandler;

use zafarjonovich\YiiTelegramErrorHandler\Telegram;

class Web extends \yii\web\ErrorHandler
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