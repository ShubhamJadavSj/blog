<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use App\Traits\Livewire\WithModal;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Confirm extends Component
{
    use WithModal;
    use AuthorizesRequests;

    public $title = null;
    public $message = null;
    public $action = null;
    public $blog;

    protected $listeners = [
        'openConfirmModal'
    ];

    public function openConfirmModal($action, $blogId)
    {
        $this->action = $action;
        $this->blog = Blog::withTrashed()->find($blogId);

        switch ($action) {
            case 'delete':
                $this->title   = "Archive Blog!";
                $this->message = "Are you sure you want to archive blog?";
                break;

            case 'forceDelete':
                $this->title   = "Delete Blog!";
                $this->message = "Are you sure you want to Delete blog? You wont be able to get this data back";
                break;

            case 'publish':
                $this->title   = "Publish Blog!";
                $this->message = "Are you sure you want to publish blog?";
                break;

            case 'restore':
                $this->title   = "Restore Blog!";
                $this->message = "Are you sure you want to Restore blog?";
                break;

            default:
                break;
        }

        $this->open();
    }

    public function confirm()
    {
        $this->authorize($this->action, $this->blog);

        switch ($this->action) {
            case 'delete':
                $this->blog->delete();
                $this->toastNotify('Blog archived successfully!');
                break;

            case 'forceDelete':
                $this->blog->forceDelete();
                $this->toastNotify('Blog deleted successfully!');
                break;

            case 'publish':
                $this->blog->published_at = now();
                $this->blog->save();
                $this->toastNotify('Blog published successfully!');
                break;

            case 'restore':
                $this->blog->restore();
                $this->toastNotify('Blog restored successfully!');
                break;

            default:
                break;
        }

        $this->emitUp('refresh');
        $this->close();
    }

    public function render()
    {
        return view('livewire.blog.confirm');
    }
}
