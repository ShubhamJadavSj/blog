<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use Livewire\Component;

class Explore extends Component
{
    public $newBlogCount = null;
    public $blogs = null;

    public function mount()
    {
        $this->fetchBlogs();
    }

    public function fetchBlogCount()
    {
        $blogCountDifference = Blog::published()->count() - $this->blogs->count();

        if ($blogCountDifference < 0) {
            $this->fetchBlogs();
        }

        $this->newBlogCount = ($blogCountDifference < 0) ? 0 : ($blogCountDifference);
    }

    public function fetchBlogs()
    {
        $this->blogs = Blog::with('creator')->published()->orderByDesc('published_at')->get();
    }

    public function render()
    {
        return view('livewire.blog.explore', [
            'blogs' => $this->blogs
        ]);
    }
}
