<?php

namespace App\Traits\Livewire;

trait WithSorting
{
    public $sort_by;
    public $sort_type;

    public function mountWithSorting()
    {
        $this->sort_by = null;
        $this->sort_type = null;
    }

    public function hydrateWithSorting()
    {
        $this->queryString = array_merge($this->queryString, [
            'sort_by', 'sort_type',
        ]);
    }

    public function sort($sort_by)
    {
        $this->sort_by   = $sort_by;
        $this->sort_type = ($this->sort_type === 'asc') ? 'desc' : 'asc';
    }
}
