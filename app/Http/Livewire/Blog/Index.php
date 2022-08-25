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
        request()->merge($this->only(['sort_by', 'sort_type']));

        $blogs = Blog::byAuthUser()
            ->where(function($query) {
                $query->when($this->search, function($query) {
                    $query->where('title', 'like', "%$this->search%");
                })
                ->when($this->created_at, function($query) {
                    $query->whereDate('created_at', $this->created_at);
                });
            })
            ->when($this->sort_by, function ($query) {
                $query->orderby($this->sort_by, $this->sort_type);
            })
            ->paginate(PER_PAGE);

        return view('livewire.blog.index', compact('blogs'));
    }
}
