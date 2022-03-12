<?php

declare(strict_types=1);

namespace Api\Model\User\UserCase\SignUp\Request;

use Api\Model\Flusher;
use Api\Model\User\Entity\User\Email;
use Api\Model\User\Entity\User\User;
use Api\Model\User\Entity\User\UserId;
use Api\Model\User\Entity\User\UserRepository;
use Api\Model\User\Service\PasswordHasher;
use Api\Model\User\Service\ConfirmTokenizer;

class Handler
{
    private UserRepository $users;
    private PasswordHasher $hasher;
    private ConfirmTokenizer $tokenizer;
    private Flusher $flusher;

    public function __construct(
        UserRepository $users,
        PasswordHasher $hasher,
        ConfirmTokenizer $tokenizer,
        Flusher $flusher
    )
    {
        $this->users = $users;
        $this->hasher = $hasher;
        $this->tokenizer = $tokenizer;
        $this->flusher = $flusher;
    }

    public function handle(Command $command): void
    {
        $email = new Email($command->email);

        if ($this->users->hasByEmail($email)) {
            throw new \DomainException('User with this email already exists.');
        }

        $user = new User(
            UserId::next(),
            new \DateTimeImmutable(),
            $email,
            $this->hasher->hash($command->password),
            $token = $this->tokenizer->generate()
        );

        $this->users->add($user);
        $this->flusher->flush();
    }
}