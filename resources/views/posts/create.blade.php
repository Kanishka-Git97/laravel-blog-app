@extends('main')
@section('content')
<div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
    <h2 class="mb-4 text-xl font-bold text-gray-900 ">Create New Blog Post</h2>
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
                {{ Form::textarea('body', null, array('class'=>'block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 ', 'placeholder'=>'Your Post Body', 'required'=>'')) }}

            </div>
        </div>
        {{ Form::submit('Create Post', array('class'=>'  inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800')) }}
    {!! Form::close() !!}
</div>


@endsection
