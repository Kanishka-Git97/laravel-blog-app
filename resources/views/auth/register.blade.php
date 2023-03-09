@extends('main')

@section('content')
<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">

    <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 ">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                Create and account
            </h1>
            {!! Form::open(array('route'=>'auth.register')) !!}
                <div class="mb-1">
                    {{ Form::label('name', 'Full Name', array('class'=>'block mb-2 text-sm font-medium text-gray-900')) }}
                    {{ Form::text('name', null, array('class'=>'bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5', 'required'=>'')) }}
                </div>
                <div class="mb-1">
                    {{ Form::label('email', 'Your Email', array('class'=>'block mb-2 text-sm font-medium text-gray-900')) }}
                    {{ Form::email('email', null, array('class'=>'bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5', 'required'=>'')) }}
                </div>
                <div class="mb-1">
                    {{ Form::label('password', 'Password', array('class'=>'block mb-2 text-sm font-medium text-gray-900')) }}
                    {{ Form::password('password', array('class'=>'bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5', 'required'=>'')) }}
                </div>
                <div>
                    {{ Form::label('confirm_password', 'Confirm Password', array('class'=>'block mb-2 text-sm font-medium text-gray-900')) }}
                    {{ Form::password('confirm_password', array('class'=>'bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5', 'required'=>'')) }}
                </div>

                {!! Form::submit('Create Account', array('class'=>'w-full mt-4 text-white bg-gray-800 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ')) !!}
                <p class="text-sm font-light text-gray-500 ">
                    Already have an account? <a href="/auth/login" class="font-medium text-primary-600 hover:underline ">Login here</a>
                </p>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
