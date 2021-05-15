<?php


namespace zafarjonovich\YiiTelegramErrorHandler;

use zafarjonovich\Telegram\BotApi;
use yii\base\BaseObject;

class Telegram extends BaseObject
{

    public $message_structure = "Message: {message}\n\nFile: {file}\n\nLine: {line}\n\nCode: {code}";

    /** @var string $bot_token */
    public $bot_token;

    /** @var array $chat_ids */
    public $chat_ids;

    public function sendExeption(\Exception $exception){

        if(!is_string($this->bot_token))
            return;

        $botApi = new BotApi($this->bot_token);

        $getme = $botApi->getMe();

        if($getme['ok'] and !empty($this->chat_ids)) {

            $message = strtr($this->message_structure,[
                '{message}' => $exception->getMessage() ,
                '{file}' => $exception->getFile() ,
                '{line}' => $exception->getLine() ,
                '{code}' => $exception->getCode() ,
            ]);

            foreach ($this->chat_ids as $chat_id) {
                $botApi->sendMessage($chat_id,$message);
            }
        }
    }
}