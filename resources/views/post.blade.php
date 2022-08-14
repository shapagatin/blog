<x-layout>

    <h1> {{  $post->title }} </h1>
        <p>
            by: <a href="/author/{{ $post->author->username }}"> {{   $post->author->name }}</a> in <a href="/categories/{{$post->category->slug }}"> {{ $post->category->name }} </a>
        </p>
    <div class="mb-10">
        {!!  $post->body !!}
    </div>

    <div class="mt-7">
        <a href="/">Go back</a>
    </div>

</x-layout>
