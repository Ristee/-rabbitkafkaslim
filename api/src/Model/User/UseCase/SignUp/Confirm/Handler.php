<?php

namespace Api\Model\User\UserCase\SignUp\Confirm;

use Api\Model\Flusher;
use Api\Model\User\Entity\User\Email;
use Api\Model\User\Entity\User\UserRepository;

class Handler
{
    private UserRepository $users;
    private Flusher $flusher;

    public function __construct(UserRepository $users, Flusher $flusher)
    {
        $this->users = $users;
        $this->flusher = $flusher;
    }

    public function handle(Command $command)
    {
        $user = $this->users->getByEmail(new Email($command->email));

        $user->confirmSignup($command->token, new \DateTimeImmutable());

        $this->flusher->flush();
    }
}