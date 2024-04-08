<?php

declare(strict_types=1);

namespace App\Interfaces\ActiveCollab;

use App\Dtos\ActiveCollab\AuthenticationRequestDto;

interface AuthService
{
    public function generateToken(AuthenticationRequestDto $dto): string;
}