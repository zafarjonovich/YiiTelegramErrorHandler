<?php

namespace zafarjonovich\YiiTelegramErrorHandler;

use zafarjonovich\YiiTelegramErrorHandler\Telegram;

class Console extends \yii\console\ErrorHandler
{
    /** @var array $telegram */
    public $telegram = [];

    protected function renderException($exception)
    {

        $this->telegram['exception'] = $exception;

        $telegram = new Telegram($this->telegram);

        $telegram->sendExeption($exception);

        parent::renderException($exception);
    }
}