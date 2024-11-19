<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pageTitle }}</title>
    {{-- tailwind css --}}
    @vite('resources/css/app.css')
    {{-- multi select tag css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/multi-select-tag.css') }}">
    {{-- multi select tag js --}}
    <script src="{{ asset('assets/js/multi-select-tag.js') }}"></script>
</head>

<body>
    <div class="container mx-auto">
        @yield('app')
    </div>

    {{-- initial multi select tag --}}
    <script>
        new MultiSelectTag('genres', {
            rounded: true,
            shadow: true,
            placeholder: 'Search',
            tagColor: {
                textColor: '#faf8f7 ',
                borderColor: '#0000',
                bgColor: '#ffa88c',
            },
            onChange: function(values) {
                const dataValues = values.map((item) => item.value)
                const inputGenres = document.getElementById('input-genres')

                inputGenres.value = dataValues.join(',')
            }
        })
    </script>
</body>

</html>
