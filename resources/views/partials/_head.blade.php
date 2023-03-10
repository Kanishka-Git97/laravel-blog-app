<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DEV.BRANCH | BLOG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
          selector: '.advance-texteditor'
        });
      </script>
    @yield('styles')
</head>
