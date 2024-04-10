<?php

declare(strict_types=1);

namespace App\Services\ActiveCollab;

use ActiveCollab\SDK\Client;
use Illuminate\Support\Facades\Auth;
use ActiveCollab\SDK\Authenticator\Cloud;
use ActiveCollab\SDK\TokenInterface;
use App\Interfaces\ActiveCollab\AuthService;
use App\Dtos\ActiveCollab\AuthenticationRequestDto;
use App\Models\User;

class AuthServiceImpl implements AuthService
{
    public function generateToken(AuthenticationRequestDto $dto): TokenInterface
    {
        $authenticator = new Cloud(
            config('active-collab.organisation-name'),
            config('active-collab.app-name'),
            $dto->getEmail(),
            $dto->getPassword()
        );

        $accountId = (int) config('active-collab.account-id');

        return $authenticator->issueToken($accountId);
    }

    public function getAuthenticatedUser(TokenInterface $token): User
    {
        $client = new Client($token);

        $userData = json_decode($client->get('user-session')->getBody(), true);

        return new User([
            ...$userData,
            'active_collab_token' => $token,
        ]);
    }
}