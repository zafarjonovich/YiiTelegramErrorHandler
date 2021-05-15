#Yii telegram error handler

## Installation

Assalomu aleykum. This component is for yii2 framework. You can use this component to send your exceptions to your telegram. It is very easy to use.


If you are creating a web application, you need to put the following code in config/web.php
```
<?php

$config = [
 ...
 'components' => [
 ...
	 'errorHandler' => [
		'class' => 'zafarjonovich\YiiTelegramErrorHandler\Web' ,
		'telegram' => [
			'bot_token' => '123456789:ABCKDFHJKSDHKSJHDFKDHF' ,
			'chat_ids' => [123,234,456]
		]
	]

];

?>
```
<br >
<br >
If you are creating a console application, you need to put the following code in config / web.php

```
<?php
$config = [
...
'components' => [
...
'errorHandler' => [
'class' => 'zafarjonovich\YiiTelegramErrorHandler\Console' ,
'telegram' => [
'bot_token' => '123456789:ABCKDFHJKSDHKSJHDFKDHF' ,
'chat_ids' => [123,234,456]
]
]

];
?>
```

<br >
<br >

## Set telegram message structure

You can change the structure of messages that go to the telegram. It is very easy to use.There are 4 placements here.
<ul>
<li>{message} - exception message</li>
<li>{file} - exception file</li>
<li>{line} - exception line</li>
<li>{code} - exception code</li>
</ul>


You set up your message structure as follows

```
<?php

$config = [
 ...
 'components' => [
 ...
	 'errorHandler' => [
		'class' => 'zafarjonovich\YiiTelegramErrorHandler\Console' ,
		'telegram' => [
			...
			'message_structure' => "File: {file}\n\nLine: {line}"
		]
	]

];
?>
```
<br>

Typically, the following message structure consists of:

`Message:>Message:>Message: {message}\n\nFile: {file}\n\nLine: {line}\n\nCode: {code}`