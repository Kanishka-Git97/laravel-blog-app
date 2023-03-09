@extends('main')
@section('content')
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            {{-- Content Header  --}}
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 ">Our Blog</h2>
                <p class="font-light text-gray-500 sm:text-xl ">We use an agile approach to test assumptions and connect with the needs of your audience early and often.</p>
            </div>

            <div class="grid gap-8 lg:grid-cols-2 flex flex-row">
                {{-- Articles --}}
                @foreach ($posts as $post)
                    <article id="{{ $post->id }}" class="p-6 bg-white rounded-lg border border-gray-200 shadow-md ">

                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 "><a href="#">{{ $post->title }}</a></h2>
                        <p class="mb-5 font-light text-gray-500 ">{{ Str::substr($post->body, 0, 430) }}{{ Str::length($post->body) > 430 ? "..." : "" }}</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-4">
                                <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Leos avatar" />
                                <div class="flex flex-col">
                                    <span class="font-medium ">
                                        Jese Leos
                                    </span>
                                    <span class="text-sm text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            <a href="/posts/{{ $post->id }}" class="inline-flex items-center font-medium text-primary-600  hover:underline">
                                Read more
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a>
                        </div>
                    </article>
                @endforeach

            </div>
        </div>
@endsection
