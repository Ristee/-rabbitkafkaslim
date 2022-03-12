<?php

declare(strict_types=1);

namespace Api\Model\User\UserCase\SignUp\Confirm;

class Command
{
    public string $email;
    public string $token;
}
