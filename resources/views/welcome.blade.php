<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Choices with Tailwind</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/css/multi-select-tag.css">
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="p-20 bg-violet-300">
        <select name="countries" id="countries" multiple>
            <option value="Drama">Drama</option>
            <option value="Action">Action</option>
            <option value="Animation">Animation</option>
            <option value="Sci-Fi">Sci-Fi</option>
            <option value="Horror">Horror</option>
        </select>
    </div>


    <script>
        new MultiSelectTag('countries', {
            rounded: true, // default true
            shadow: true, // default false
            placeholder: 'Search', // default Search...
            tagColor: {
                textColor: '#fffdfe',
                borderColor: '#fffdfe',
                bgColor: '#eaffe6',
            },
            onChange: function(values) {
                console.log(values)
            }
        })
    </script>
</body>

</html>
