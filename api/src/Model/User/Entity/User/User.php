<?php

declare(strict_types=1);

namespace Api\Model\User\Entity\User;

use DateTimeInterface;

class User
{
    private const STATUS_WAIT = 'wait';
    private const STATUS_ACTIVE = 'active';

    private UserId $id;
    private DateTimeInterface $date;
    private Email $email;
    private string $passwordHash;
    private ?ConfirmToken $confirmToken;
    private string $status;

    /**
     * @param UserId $id
     * @param DateTimeInterface $created_at
     * @param Email $email
     * @param string $hash
     * @param ConfirmToken $token
     */
    public function __construct(
        UserId $id,
        DateTimeInterface $created_at,
        Email $email,
        string $hash,
        ConfirmToken $token
    )
    {
        $this->id = $id;
        $this->date = $created_at;
        $this->email = $email;
        $this->passwordHash = $hash;
        $this->confirmToken = $token;
        $this->status = self::STATUS_WAIT;
    }

    public function isWait(): bool
    {
        return $this->status === self::STATUS_WAIT;
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    /**
     * @return UserId
     */
    public function getId(): UserId
    {
        return $this->id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @return ConfirmToken
     */
    public function getToken(): ConfirmToken
    {
        return $this->confirmToken;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->passwordHash;
    }

    public function confirmSignup(string $token, \DateTimeImmutable $date)
    {
        if ($this->isActive()) {
            throw new \DomainException('User is already active.');
        }

        if (!$this->confirmToken->isEqualTo($token)) {
            throw new \DomainException('Confirm token is invalid.');
        }

        if ($this->confirmToken->isExpiredTo($date)) {
            throw new \DomainException('Confirm token is expired.');
        }

        $this->status = self::STATUS_ACTIVE;
        $this->confirmToken = null;
    }
}
