<?php

namespace Api\Model\User\Service;

use Api\Model\User\Entity\User\ConfirmToken;

interface ConfirmTokenizer
{
    public function generate(): ConfirmToken;
}