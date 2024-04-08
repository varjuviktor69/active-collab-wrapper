<?php

declare(strict_types=1);

namespace App\Services\ActiveCollab;

use ActiveCollab\SDK\Authenticator\Cloud;
use App\Dtos\ActiveCollab\AuthenticationRequestDto;
use App\Interfaces\ActiveCollab\AuthService;

class AuthServiceImpl implements AuthService
{
    public function generateToken(AuthenticationRequestDto $dto): string
    {
        $authenticator = new Cloud(
            config('active-collab.organisation-name'),
            config('active-collab.app-name'),
            $dto->getEmail(),
            $dto->getPassword()
        );

        $accountId = (int) config('active-collab.account-id');

        return $authenticator->issueToken($accountId)->getToken();
    }
}