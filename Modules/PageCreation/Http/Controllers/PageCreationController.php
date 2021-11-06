<?php

namespace Modules\PageCreation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\PageCreation\Entities\Page;
use Modules\PageCreation\Repository\PageRepositoryInterface;

class PageCreationController extends Controller
{
    private $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function index() {
        return view('pagecreation::index', [
            'pages' => $this->pageRepository->findModelByForeignId(auth()->user()->id, 'creator_id')
        ]);
    }

    public function show(Page $page) {
        return view('pagecreation::show', [
            'page' => $page
        ]);
    }

    public function create()
    {
        return view('pagecreation::create');
    }

    public function store(Request $request) {
        $attributes = $request->validate([
            'prefix' => 'required|string',
            'title' => ['required', Rule::unique('pages', 'title')],
            'head_title' => 'required',
            'body' => 'required',
        ]);

        $attributes['creator_id'] = auth()->user()->id;
        $attributes['slug'] = str_replace(' ', '-', $attributes['title']);

        $this->pageRepository->create($attributes);

        return redirect('pagecreation/list')->with('success', 'Your page has been submitted');
    }
}
