<?php

namespace App\Filters;

use Rjchauhan\LaravelFiner\Filter\Filter;

class BlogFilters extends Filter
{
    protected $filters = ['search', 'created_at', 'sort_by', 'status'];

    public function search($keyword)
    {
        $this->builder->when($keyword, function($query) use ($keyword) {
            $query->where('title', 'like', "%$keyword%");
        });
    }

    public function created_at($keyword)
    {
        $this->builder->when($keyword, function($query) use ($keyword) {
            $query->whereDate('created_at', $keyword);
        });
    }

    public function sort_by($sort_by)
    {
        $sort_type = request('sort_type', 'asc');

        $this->builder->when($sort_by, function ($query) use($sort_by, $sort_type) {
            $query->orderby($sort_by, $sort_type);
        });
    }
}
