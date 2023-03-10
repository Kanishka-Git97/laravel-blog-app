@extends('main')

@section('content')

<div class="flex flex-col items-center justify-center px-6  mx-auto md:h-screen lg:py-0">

    <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0 ">
        <div class="p-6 space-y-2 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                Sign in to your account
            </h1>
            <div>
                @if (session()->has('error'))
                    <div class="m-1">
                        <div class="flex p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 " role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">Warning alert!</span>&nbsp;Invalid Login Details, Please try again.
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            {!! Form::open() !!}
                <div>
                    {{ Form::label('email', 'Your Email', array('class'=>'block mb-2 text-sm font-medium text-gray-900')) }}
                    {{ Form::email('email', null, array('class'=>'bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5', 'required'=>'')) }}

                </div>
                <div>
                    {{ Form::label('password', 'Password', array('class'=>'block mb-2 text-sm font-medium text-gray-900')) }}
                    {{ Form::password('password', array('class'=>'bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5', 'required'=>'', 'password'=>'')) }}
                </div>
                <div class="flex items-center justify-between mt-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            {{ Form::checkbox('remember') }}
                        </div>
                        <div class="ml-3 text-sm">
                          <label for="remember" class="text-gray-500 ">Remember me</label>
                        </div>
                    </div>
                    <a href="#" class="text-sm font-medium text-primary-600 hover:underline ">Forgot password?</a>
                </div>
                {!! Form::submit('Sign in', array('class'=>'w-full mt-4 text-white bg-gray-800 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ')) !!}

                <p class="text-sm font-light text-gray-500 ">
                    Don’t have an account yet? <a href="/auth/register" class="font-medium text-primary-600 hover:underline ">Sign up</a>
                </p>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection
