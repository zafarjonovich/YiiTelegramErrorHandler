<?php

namespace zafarjonovich\YiiTelegramErrorHandler;

use zafarjonovich\YiiTelegramErrorHandler\Telegram;

class Web extends \yii\web\ErrorHandler
{
    /** @var array $telegram */
    public $telegram = [];

    /**
     * @var callable $messageCreator
     */
    public $messageCreator;
    
    protected function getMessage($exception)
    {
        if ($this->messageCreator !== null) {
            return ($this->messageCreator)($exception);
        }
        
        return json_encode(Helper::convertExceptionToArray($exception));
    }

    protected function renderException($exception)
    {
        try{
            $telegram = new Telegram($this->telegram);
            $telegram->sendExeption($this->getMessage($exception));
        }catch (\Exception $exception){
        }

        parent::renderException($exception);
    }
}