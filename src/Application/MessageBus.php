<?php

namespace App\Application;

interface MessageBus
{
    public function dispatch($message, array $stamps = []);
}