<?php

namespace Tests\Feature\Livewire;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class PostCommentsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_requires_login_to_post_comments()
    {
        $post = Post::factory()->create();

        Livewire::test('post-comments', ['post' => $post])
            ->set('comment', 'This is a test comment.')
            ->call('postComment')
            ->assertRedirect(route('login'));  // Asserting that it redirects to the login page
    }

    /** @test */
    public function authenticated_users_can_post_comments()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();

        $this->actingAs($user);

        Livewire::test('post-comments', ['post' => $post])
            ->set('comment', 'This is a test comment.')
            ->call('postComment')
            ->assertHasNoErrors()
            ->assertSet('comment', '');  // Asserting the comment input is reset after submission

        $this->assertDatabaseHas('comments', [
            'user_id' => $user->id,
            'post_id' => $post->id,
            'comment' => 'This is a test comment.',
        ]);
    }

    /** @test */
    public function it_displays_comments_for_a_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();
        $comment = $post->comments()->create([
            'user_id' => $user->id,
            'comment' => 'This is a test comment.',
        ]);

        Livewire::test('post-comments', ['post' => $post])
            ->assertSee('This is a test comment.');
    }
}
