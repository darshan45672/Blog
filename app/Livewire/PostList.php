<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    public $sort = 'desc';

    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }
    public function render()
    {
        return view('livewire.post-list',[
            'posts' => Post::published()->orderBy('published_at', $this->sort)->paginate(5),
        ]);
    }
}
