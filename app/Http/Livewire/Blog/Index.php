<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use App\Traits\Livewire\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithSorting;
    use WithPagination;

    public $search = null;
    public $created_at = null;

    protected $queryString = [
        'search' => ['except' => ''],
        'created_at' => ['except' => '']
    ];

    protected $listeners = [
        'refresh' => '$refresh'
    ];

    public function updatedSearch($value)
    {
        $this->resetPage();
    }

    public function updatedCreatedAt($value)
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset('search', 'created_at');
    }

    public function render()
    {
        request()->merge($this->only(['search', 'created_at', 'sort_by', 'sort_type']));

        $blogs = Blog::byAuthUser()
            ->filter()
            ->withTrashed()
            ->paginate(PER_PAGE);

        return view('livewire.blog.index', compact('blogs'));
    }
}
