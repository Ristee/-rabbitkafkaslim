<?php

declare(strict_types=1);

namespace Api\Model\User\Entity\User;

use JetBrains\PhpStorm\Pure;
use Ramsey\Uuid\Uuid;
use Webmozart\Assert\Assert;

class ConfirmToken
{
    private string $token;
    private \DateTimeImmutable $expires;

    public function __construct(string $token, \DateTimeImmutable $expires)
    {
        Assert::notEmpty($token);
        $this->token = $token;
        $this->expires = $expires;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function isExpiredTo(\DateTimeImmutable $date): bool
    {
        return $this->expires <= $date;
    }

    #[Pure]
    public function isEqualTo(string $token): bool
    {
        return $this->getToken() === $token;
    }
}
