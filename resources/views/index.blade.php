@extends('components.main')

@section('app')
    {{-- navbar --}}
    @include('components.navbar')
    {{-- content --}}
    <div class="content mt-7 px-5">
        {{-- search --}}
        <form action="" method="get">
            <label class="input input-bordered flex items-center gap-2">
                <input type="text" class="grow" placeholder="What do you want to watch today?"
                    oninput="liveSearch(this.value)" />
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
                    <path fill-rule="evenodd"
                        d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                        clip-rule="evenodd" />
                </svg>
            </label>
        </form>
        {{-- toast --}}
        @session('message')
            <div id="toast"
                class="hidden flex justify-between items-center alert alert-success mt-5 p-4 rounded shadow-lg transition-transform duration-500 ease-in-out transform scale-90">
                <span>{{ session('message') }}</span>
                <button class="btn btn-sm bg-transparent border-black" onclick="hideToast()">
                    X
                </button>
            </div>
        @endsession
        @session('error')
            <div id="toast"
                class="hidden flex justify-between items-center alert alert-error mt-5 p-4 rounded shadow-lg transition-transform duration-500 ease-in-out transform scale-90">
                <span>{{ session('error') }}</span>
                <button class="btn btn-sm bg-transparent border-black" onclick="hideToast()">
                    X
                </button>
            </div>
        @endsession
        {{-- card movies --}}
        <div class="container-movies">
            @if ($movies->first())
                @foreach ($movies as $movie)
                    <a href="update-movie/{{ $movie->id }}">
                        <div class="card bg-slate-200 w-auto shadow-xl my-4 mt-5">
                            <div class="card-body">
                                <h2 class="card-title text-2xl">{{ $movie->title }}</h2>
                                <p class="font-semibold">{{ $movie->director }}</p>
                                <div class="mt-5 card-actions justify-end">
                                    @foreach (explode(',', $movie->genres) as $genre)
                                        <span
                                            class="bg-orange-600 px-2 py-1 rounded-full text-slate-200 font-semibold">{{ $genre }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <div class="card bg-slate-200 w-auto shadow-xl my-4 mt-5">
                    <div class="card-body">
                        <h2 class="card-title text-2xl text-center">Not Movie Created :/</h2>
                    </div>
                </div>
            @endif
        </div>
        {{-- add button --}}
        <div class="button fixed top-[85%] right-5">
            <button class="bg-orange-600 p-1 rounded-full" onclick="redirect()">
                <img class="h-12" src="{{ asset('assets/add.svg') }}" alt="add">
            </button>
        </div>
    </div>
    {{-- paginate --}}
    <div class="mx-auto mb-12 px-24 mt-10 text-xl font-semibold">{{ $movies->links('pagination::simple-tailwind') }}</div>
    {{-- footer --}}
    <footer class="bg-orange-600 opacity-75 py-8">
        <p class="text-center font-semibold text-slate-200">Copyright Talenavi {{ date('Y') }}</p>
    </footer>
    <script>
        function redirect() {
            document.location.href = '/add-movie'
        }

        function showToast() {
            const toast = document.getElementById("toast");
            toast.classList.remove("hidden", "scale-90");
            toast.classList.add("scale-100");
            setTimeout(() => {
                hideToast();
            }, 5000);
        }

        function hideToast() {
            const toast = document.getElementById("toast");
            toast.classList.add("scale-90");
            setTimeout(() => {
                toast.classList.add("hidden");
            }, 500);
        }

        function liveSearch(keySearch) {
            const containerMovies = document.querySelector('.container-movies');
            const url = `${document.location.origin}/?search=${encodeURIComponent(keySearch)}`;

            fetch(url)
                .then((res) => res?.json())
                .then((data) => {
                    containerMovies.innerHTML = '';

                    if (data?.movies?.data?.length > 0) {
                        data?.movies?.data?.forEach((movie) => {
                            const genres = movie?.genres?.split(',').map((item) => {
                                return `<span
                                        class="bg-orange-600 px-2 py-1 rounded-full text-slate-200 font-semibold">${item}</span>`
                            }).join(' ');

                            const cardMovie = `
                            <a href="update-movie/${movie.id}">
                                <div class="card bg-slate-200 w-auto shadow-xl my-4 mt-5">
                                    <div class="card-body">
                                        <h2 class="card-title text-2xl">${movie.title}</h2>
                                        <p class="font-semibold">${movie.director}</p>
                                        <div class="mt-5 card-actions justify-end">
                                            ${genres}
                                        </div>
                                    </div>
                                </div>
                            </a>
                            `;
                            containerMovies.innerHTML += cardMovie;
                        });
                    } else {
                        containerMovies.innerHTML = `
                            <div class="card bg-slate-200 w-auto shadow-xl my-4 mt-5">
                                <div class="card-body">
                                    <h2 class="card-title text-2xl text-center">Movie Not Found:(</h2>
                                </div>
                            </div>
                        `;
                    }
                })
                .catch((err) => console.error(err));
        }

        window.onload = showToast()
    </script>
@endsection
