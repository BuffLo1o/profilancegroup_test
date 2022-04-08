<?php

namespace App\Services\Links\Contract;

interface LinkGeneratorContract
{
    public function generateLink(string $link): string;
}
