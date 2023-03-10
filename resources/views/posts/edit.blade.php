@extends('main')
@section('content')

<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white ">
    {!! Form::model($post, array('route'=> ['posts.update', $post->id], 'method'=> 'PUT')) !!}
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">

        <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue">
            <div>
                <h1 class="mb-4 text-2xl font-bold leading-tight text-gray-600 lg:mb-6 lg:text-4xl ">Update Blog Post</h1>
            </div>
            <header class="mb-4 lg:mb-6 not-format">
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 ">
                        <div class="mr-4 w-16 h-16 relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
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
                <div class="flex flex-row mb-4">
                    {{ Form::submit('Update Post', array('class'=>'mr-3 cursor-pointer  inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800')) }}
                    {{ Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class'=> 'mr-3 cursor-pointer  inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800')) }}

                </div>
                {{ Form::text('title', null, array('class'=>'bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 out-of-range:border-red-500 mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl ', 'placeholder'=>'Type Title', 'required'=>'', 'maxlength'=>'254')) }}

            </header>
            {{-- Body of Blog --}}
            {{ Form::textarea('body', null, array('class'=>'advance-texteditor w-full h-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 p-3 m-2', 'placeholder'=>'Your Post Body', 'rows'=>'15')) }}
        </article>



    </div>

    {!! Form::close() !!}
  </main>





@endsection
