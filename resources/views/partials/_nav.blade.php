
    {{-- Header Section --}}
    <header>
        <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 ">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="/" class="flex items-center">
                    <span class="self-center text-xl font-semibold whitespace-nowrap text-gray-800">DEV.BRANCH | BLOG</span>
                </a>
                @auth()
                     {{-- Profile Section --}}
                <div class="flex items-center md:order-2">
                    <button type="button" data-dropdown-toggle="language-dropdown-menu" class="inline-flex items-center justify-center px-4 py-2 text-sm text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 ">
                      @auth
                          {{ auth()->user()->name }}
                      @else
                        My Account
                      @endauth
                    </button>
                    <!-- Dropdown -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow " id="language-dropdown-menu">
                      <ul class="py-2" role="none">

                       @auth
                       <li>
                            <a href="/posts/create" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 " role="menuitem">
                            <div class="inline-flex items-center">
                                Create Blog Post
                            </div>
                            </a>
                        </li>
                        <li>
                            <a href="/auth/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 " role="menuitem">
                            <div class="inline-flex items-center">
                                Logout
                            </div>
                            </a>
                        </li>
                        @else

                        <li>
                            <a href="/auth/login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 " role="menuitem">
                            <div class="inline-flex items-center">
                            Login
                            </div>
                            </a>
                        </li>
                        <li>
                            <a href="/auth/register" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 " role="menuitem">
                            <div class="inline-flex items-center">
                                Register
                            </div>
                            </a>
                        </li>

                        @endauth
                      </ul>
                    </div>

                </div>
                @else
                <div class="flex items-center lg:order-2">
                    <a href="/auth/login" class="text-gray-800  hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2  focus:outline-none ">Log in</a>
                    <a href="/auth/register" class="text-gray-800 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2  focus:outline-none ">Register</a>
                </div>
                @endauth



            </div>
        </nav>
    </header>
