<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class PostComments extends Component
{
    use WithPagination;

    public Post $post;

    #[Rule('required|min:3|max:200')]
    public string $comment;

    public function postComment()
    {
        if (Auth::guest()) {
            return redirect()->route('login'); // Redirect to login page
        }

        $this->validateOnly('comment');

        $this->post->comments()->create([
            'comment' => $this->comment,
            'user_id' => Auth::id()
        ]);

        $this->reset('comment');
    }

    #[Computed()]
    public function comments()
    {
        return $this?->post?->comments()->latest()->paginate(5);
    }

    public function render()
    {
        return view('livewire.post-comments');
    }
}
