<?php

namespace App\Services\Links;

use App\Services\Links\Contract\LinkGeneratorContract;

class LinkGenerator implements LinkGeneratorContract
{
    /**
     * @param string $link
     * @return string
     */
    public function generateLink(string $link):string
    {
        return substr(str_shuffle($link), 0, 10);
    }
}
