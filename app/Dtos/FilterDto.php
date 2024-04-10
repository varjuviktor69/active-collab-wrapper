<?php

declare(strict_types=1);

namespace App\Dtos;

use Illuminate\Http\Request;

class FilterDto
{
    private int $limit = 20;
    private int $offset = 0;
    private string $orderDirection = 'ASC';

    public function __construct(private Request $request) {
        $this->limit ??= $request->limit;
        $this->offset ??= $request->offset;
        $this->orderDirection ??= $request->orderDirection;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getOrderDirection(): string
    {
        return $this->orderDirection;
    }
}