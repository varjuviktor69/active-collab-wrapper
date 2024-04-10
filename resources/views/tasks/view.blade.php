<dialog open>
    <p>{{ $name }}</p>
    <form method="dialog">
        <p>Updated on: {{ $updatedAt }}</p>
        <p>Description: {!! $description !!}</p>
        @foreach ($comments ?? [] as $key => $comment)
            <div class="comment-container">
                <p>Comment {{ $key + 1 }}.</p>
                <p>{!! $comment['body_formatted'] !!}</p>
            </div>
        @endforeach
      <button class="close-task">Close</button>
    </form>
</dialog>