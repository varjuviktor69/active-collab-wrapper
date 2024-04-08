<?php

declare(strict_types=1);

namespace App\Dtos\ActiveCollab;

use Illuminate\Http\Request;

class AuthenticationRequestDto
{
    private string $email;
    private string $password;

    public static function fromRequest(Request $request): self
    {
        $dto = new self();

        $dto->email = $request->email;
        $dto->password = $request->password;

        return $dto;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}