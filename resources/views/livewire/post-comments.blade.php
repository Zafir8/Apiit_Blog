<div class="pt-10 mt-10 border-t border-gray-200 comments-box">
    <h2 class="mb-6 text-3xl font-bold text-gray-900">Comments</h2>
    @auth
        <div class="mb-4 bg-white shadow sm:rounded-lg">
            <textarea wire:model="comment"
                      class="w-full p-4 text-sm text-gray-700 border-0 rounded-t-lg focus:ring-blue-500 focus:border-blue-500"
                      placeholder="Write your comment..."
                      cols="30" rows="5"></textarea>
            <div class="flex justify-end p-4 bg-gray-50 rounded-b-lg">
                <button wire:click="postComment"
                        class="px-5 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Post Comment
                </button>
            </div>
        </div>
    @else
        <div class="py-4 text-center">
            <a wire:navigate class="text-blue-600 hover:text-blue-800 hover:underline" href="{{ route('login') }}">Log in to post comments</a>
        </div>
    @endauth
    <div class="space-y-4 mt-5 user-comments">
        @forelse($this->comments as $comment)
            <div class="p-5 bg-white rounded-lg shadow">
                <div class="flex items-center justify-between mb-1 text-sm">
                    <x-posts.author :author="$comment->user" size="sm" />
                    <span class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                </div>
                <p class="text-gray-800">
                    {{ $comment->comment }}
                </p>
            </div>
        @empty
            <div class="text-sm text-center text-gray-500">
                <span>No comments yet.</span>
            </div>
        @endforelse
    </div>
    <div class="mt-6">
        {{ $this->comments->links() }}
    </div>
</div>
