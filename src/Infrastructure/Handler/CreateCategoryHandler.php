<?php

namespace App\Infrastructure\Handler;

use App\Domain\Command\CreateCategoryHandler as BaseCreateCategoryHandler;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CreateCategoryHandler extends BaseCreateCategoryHandler implements MessageHandlerInterface
{

}