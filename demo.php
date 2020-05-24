<?php

require './vendor/autoload.php';

use Ymt\component\Event;

Event::getInstance()->set('demo',function () {
    echo 111;
});

Event::getInstance()->get('demo');


