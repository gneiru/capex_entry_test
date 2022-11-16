<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="idk.ico">
  <title>{{ $title }}</title>
  <style>
    body {
        background-color: #1F2937;
    }
  </style>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @include('components.navbar')

    <div class="max-w-2xl mx-auto bg-[#1F2937] my-3 p-4 ">
        @yield('content')
    </div>
</body>
</html>