<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use App\Traits\Livewire\WithModal;
use Livewire\Component;

class Manage extends Component
{
    use WithModal;

    public Blog $blog;
    public $editMode = false;

    protected $listeners = [
        'openBlogModal'
    ];

    protected $rules = [
        'blog.title'       => ['required', 'min:2', 'max:256'],
        'blog.description' => ['required', 'min:2'],
    ];

    protected $validationAttributes = [
        'blog.title'        => 'title',
        'blog.description'  => 'description',
    ];

    public function mount()
    {
        $this->blog = new Blog();
    }

    public function openBlogModal(Blog $blog = null)
    {
        $this->blog = !$blog ? new Blog() : $blog;

        $this->editMode = $blog->exists;

        $this->show = true;
    }

    public function submit()
    {
        $this->validate();

        $this->blog->save();

        $this->close();

        $this->resetErrorBag();

        $this->emitUp('refresh');

        $this->toastNotify($this->editMode ? 'Blog updated successfully!' : 'Blog created successfully!');
        $this->reset('editMode');
    }

    public function render()
    {
        return view('livewire.blog.manage');
    }
}
