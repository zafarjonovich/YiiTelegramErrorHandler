<?php

namespace zafarjonovich\YiiTelegramErrorHandler;

class Web extends \yii\web\ErrorHandler
{
    /** @var array $telegram */
    public $telegram = [];

    protected function renderException($exception)
    {

        $telegram = new Telegram($this->telegram);
        $telegram->sendExeption($exception);

        parent::renderException($exception);
    }
}