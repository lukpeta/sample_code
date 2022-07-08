<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\Interfaces\BlogRepositoryInterface;
use Illuminate\View\View;

class BlogController extends Controller
{

    public function __construct(BlogRepositoryInterface        $blogRepository
    )
    {
        $this->blogRepository = $blogRepository;
    }

    public function index(): View
    {
        return view('frontend.blog', [
            'items' => $this->blogRepository->paginate( 'id', 'desc', [], 25,  true, true),
        ]);
    }

    public function show(string $slug): View
    {
        $blog = $this->blogRepository->findBy('slug', $slug, ['*'], [], true, true);
        if (!isset($blog)) return redirect()->route('home');

        return view('frontend.blog-view', [
            'keywords' => $blog->keywords,
            'descriptions' =>$blog->descriptions,
            'title' => $blog->title,
            'blog' => $blog,
        ]);
    }
}
