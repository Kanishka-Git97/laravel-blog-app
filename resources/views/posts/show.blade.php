@extends('main')
@section('content')

<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white ">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue ">
            <header class="mb-4 lg:mb-6 not-format">
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 ">
                        <div class="relative  w-16 mr-3 h-16 inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                            <span class="font-medium text-gray-600 dark:text-gray-300 uppercase">{{ Str::substr($post->user->name, 0, 2) }}</span>
                        </div>

                        <div>
                            <a href="#" rel="author" class="text-xl font-bold text-gray-900 ">{{ $post->user->name }}</a>
                            <p class="text-base font-light text-gray-500 ">{{ $post->user->email }}</p>
                            <div class="flex flex-row">
                                <p class="text-base font-light text-gray-500"><time pubdate datetime="2022-02-08" title="February 8th, 2022">{{ $post->created_at->diffForHumans() }}</time></p>
                            </div>
                        </div>
                    </div>
                </address>
                @auth
                    @if($post->user->id === auth()->user()->id)
                        <div class="flex flex-row gap-1 mb-3">
                            <a href="/posts/{{ $post->id }}/edit" class="inline-flex mr-3 items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg ">Edit</a>

                            {!! Form::open(array('route'=>array('posts.destroy', $post->id), 'method'=>'DELETE')) !!}
                                {{ Form::submit('Delete Post', array('class'=>'  inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800')) }}
                            {!! Form::close() !!}

                        </div>
                    @endif
                @endauth

                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl ">{{ $post->title }}</h1>
            </header>
            {{-- Body of Blog --}}
            <p class="lead mb-3">
                {!! $post->body !!}
            </p>


            {{-- Comment Section --}}
            <section class="not-format">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 ">Comments&nbsp; ({{ $post->comments()->count()}})</h2>
                </div>
                @auth
                    {!! Form::open(array('route'=>['comment.store', $post->id], 'method'=>'POST')) !!}
                    <div class="mb-6">
                        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 ">
                            {!! Form::label('comment', 'Your Comment', array('class'=>'sr-only')) !!}
                            {!! Form::textarea('comment', null, array('class'=>'block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 ', 'placeholder'=>'Your Post Body', 'required'=>'', 'rows'=>'4')) !!}
                            {!! Form::hidden('user_id', auth()->user()->id) !!}
                        </div>
                        {!! Form::submit('Post comment', array('class'=>'inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-gray-800 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800')) !!}

                    </div>
                    {!! Form::close() !!}
                @endauth
                @foreach ($post->comments as $comment)
                <article class="p-2 mb-6 text-base bg-white rounded-lg border-gray-300 border">
                    <footer class="flex justify-between items-center">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 text-sm text-gray-900 ">
                                <div class="mr-2 w-10 h-10">
                                    <div class="relative inline-flex items-center justify-center w-10 h-10  bg-gray-100 rounded-full dark:bg-gray-600">
                                        <span class="font-small text-gray-600 dark:text-gray-300 uppercase">{{ Str::substr($comment->user->name, 0, 2) }}</span>
                                    </div>
                                </div>
                                &nbsp;
                                {{ $comment->user->name }}</p>
                            <p class="text-sm text-gray-600 ml-3"><time pubdate datetime="2022-02-08"
                                    title="February 8th, 2022">{{ $comment->created_at->diffForHumans() }}</time></p>
                        </div>
                    </footer>
                    <p class="ml-16">{{ $comment->comment }}</p>

                </article>
                @endforeach


            </section>
        </article>
    </div>
  </main>





@endsection
