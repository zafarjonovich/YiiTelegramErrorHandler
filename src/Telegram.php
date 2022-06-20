<?php


namespace zafarjonovich\YiiTelegramErrorHandler;

use zafarjonovich\Telegram\BotApi;
use yii\base\BaseObject;

class Telegram extends BaseObject
{
    /** @var string $bot_token */
    public $bot_token;

    /** @var array $chat_ids */
    public $chat_ids;

    public function sendExeption($information){

        if(!is_string($this->bot_token))
            return;

        $botApi = new BotApi($this->bot_token);

        $getme = $botApi->getMe();

        if($getme['ok'] and !empty($this->chat_ids)) {
            foreach ($this->chat_ids as $chat_id) {
                $botApi->sendMessage($chat_id,$information);
            }
        }
    }
}