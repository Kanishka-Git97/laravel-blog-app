@include('partials._head')

@include('partials._nav')
<body>
    {{-- Content --}}
    <section class="bg-white ">
        @yield('content')
    </section>

    @yield('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>
@include('partials._footer')
