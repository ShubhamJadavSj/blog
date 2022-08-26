<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use Livewire\Component;

class Explore extends Component
{
    public function render()
    {
        return view('livewire.blog.explore', [
            'blogs' => Blog::with('creator')->published()->get()
        ]);
    }
}
