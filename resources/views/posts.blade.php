{{-- 1st approach @extends('layout')

@section('content')
    @foreach ($posts as $post)
        <article>
            <a href="/post/{{ $post->slug }}">
                <h1>{{ $post->title }} </h1>
            </a>
            {!! $post->body !!} 
        </article>    
    @endforeach
@endsection --}}

{{-- 2nd appr
<x-layout>
    <x-slot name="content" >
       hello again!
    </x-slot>
</x-layout> --}}

<x-layout>
    @foreach ($posts as $post)
        <article>
            <a href="/post/{{ $post->slug }}">
                <h1>{{ $post->title }} </h1>
            </a>

            <div>
                <p>
                    by: <a href="/author/{{ $post->author->username }}"> {{   $post->author->name }}</a> in 
                    <a href="/categories/{{$post->category->slug }}"> {{ $post->category->name }} </a>
                </p>
            
                {!! $post->body !!} 
            </div>

          
        </article>    
    @endforeach 
</x-layout>
      