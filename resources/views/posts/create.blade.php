@extends('main')
@section('content')
<div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
    <h2 class="mb-4 text-xl font-bold text-gray-900 ">Create New Blog Post</h2>
    <div>
        @if (session()->has('error'))
            <div class="m-1">
                <div class="flex p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 " role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Warning alert!</span>Invalid Login Details, Please try again.
                    </div>
                </div>
            </div>
        @endif
        @if($errors)
            @foreach ($errors as $error)
            <div class="m-1">
                <div class="flex p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 " role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Warning alert!</span>{{ $error }}
                    </div>
                </div>
            </div>
            @endforeach
        @endif

    </div>
    {!! Form::open(array('route'=>'posts.store')) !!}

        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="sm:col-span-2">
                {{ Form::label('title', 'Post Title', array('class'=>'block mb-2 text-sm font-medium text-gray-900')) }}
                {{ Form::text('title', null, array('class'=>'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 out-of-range:border-red-500', 'placeholder'=>'Type Title', 'required'=>'', 'maxlength'=>'254')) }}
            </div>
            {{-- <div>
                {{ Form::label('category', 'Category', array('class'=>'block mb-2 text-sm font-medium text-gray-900 ')) }}
                {{ Form::select('category', ['General'=>'General', 'Technology'=>'Technology', 'Business'=>'Business'], null,array('class'=>'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5')) }}
            </div> --}}
            <div class="sm:col-span-2">
                {{ Form::label('body', 'Post Content', array('class'=>'block mb-2 text-sm font-medium text-gray-900')) }}
                {{ Form::textarea('body', null, array('class'=>'advance-texteditor block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 ', 'placeholder'=>'Your Post Body')) }}

            </div>
        </div>
        {{ Form::hidden('user_id', auth()->user()->id) }}
        {{ Form::submit('Create Post', array('class'=>'  inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800')) }}
    {!! Form::close() !!}
</div>


@endsection
