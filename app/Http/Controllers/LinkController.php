<?php

namespace App\Http\Controllers;

use App\Http\Requests\Link\GenerateLinkRequest;
use App\Models\Link;
use App\Services\Links\Contract\LinkGeneratorContract;
use App\Services\Links\LinkGenerator;
use Illuminate\Http\JsonResponse;

class LinkController
{
    /** @var LinkGenerator $linkGenerator */
    private $linkGenerator;

    public function __construct(LinkGeneratorContract $linkGenerator)
    {
        $this->linkGenerator = $linkGenerator;
    }

    public function create()
    {
        return view('links.create');
    }

    public function store(GenerateLinkRequest $request): JsonResponse
    {
        $data = $request->validated();

        $link = new Link();
        $link->original = $data['link'];
        $link->short = $this->linkGenerator->generateLink($data['link']);

        $link->save();

        $shortLink = env('APP_URL') . '/link/' . $link->short;

        return response()->json(['short_link' =>  $shortLink]);
    }

    public function redirect(string $link)
    {
        return redirect(Link::where(['short' => $link])->first()->original);
    }
}
