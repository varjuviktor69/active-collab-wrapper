<?php

declare(strict_types=1);

namespace App\Interfaces\ActiveCollab;

use ActiveCollab\SDK\TokenInterface;
use App\Dtos\ActiveCollab\AuthenticationRequestDto;
use App\Models\User;

interface AuthService
{
    public function generateToken(AuthenticationRequestDto $dto): TokenInterface;

    public function getAuthenticatedUser(TokenInterface $token): User;
}