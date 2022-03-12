<?php

declare(strict_types=1);

namespace Api\Model\User\Entity\User;

class User
{
    private const STATUS_WAIT = 'wait';
    private const STATUS_ACTIVE = 'active';

    private UserId $id;
    private \DateTimeInterface $created_at;
    private Email $email;
    private string $passwordHash;
    private string $confirmToken;
    private string $status;

    public function __construct(
        UserId $id,
        \DateTimeInterface $created_at,
        Email $email,
        string $hash,
        string $token
    )
    {
        $this->id = $id;
        $this->created_at = $created_at;
        $this->email = $email;
        $this->passwordHash = $hash;
        $this->confirmToken = $token;
        $this->status = self::STATUS_WAIT;
    }
}
