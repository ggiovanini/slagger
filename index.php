<?php

use Slagger\Channel;
use Slagger\Slagger;

require dirname(__FILE__) . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$outroChannel = new Channel('CR28SQM0C');
$apiChannel = new Channel('CR4UBTHML');

Slagger::sendMessage('Hello Slack');
Slagger::sendMessage('Hello Slack', [], $outroChannel);
Slagger::sendMessage('Hello Slack', [], $apiChannel);
Slagger::withChannel('CR4UBTHML')
    ->createMessage('Hello with Channel string!')->send();
Slagger::withChannel($outroChannel)
    ->createMessage('Hello with Channel object!')->send();
