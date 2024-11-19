@extends('components.main')

@section('app')
    @include('components.navbar')
    <div class="content mt-7 px-5">
        <form action="" method="get">
            <label class="input input-bordered flex items-center gap-2">
                <input type="text" class="grow" placeholder="What do you want to watch today?" />
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
                    <path fill-rule="evenodd"
                        d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                        clip-rule="evenodd" />
                </svg>
            </label>
        </form>
        @foreach ($movies as $movie)
            <div class="card bg-slate-200 w-auto shadow-xl my-4">
                <div class="card-body">
                    <h2 class="card-title text-2xl">{{ $movie->title }}</h2>
                    <p class="font-semibold">{{ $movie->director }}</p>
                    <div class="mt-5 card-actions justify-end">
                        @foreach (explode(',', $movie->genres) as $genre)
                        <span class="bg-orange-600 px-2 py-1 rounded-full text-slate-200 font-semibold">{{ $genre }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
        <div class="button fixed top-[85%] right-5">
            <button class="bg-orange-600 p-1 rounded-full" onclick="redirect()">
                <img class="h-12" src="{{ asset('assets/add.svg') }}" alt="add">
            </button>
        </div>
    </div>
    <div class="mx-auto">{{ $movies->links('pagination::simple-tailwind') }}</div>
    <footer class="footer bg-base-200 text-base-content p-10 mt-10">
        <aside>
            <svg width="50" height="50" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                clip-rule="evenodd" class="fill-current">
                <path
                    d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z">
                </path>
            </svg>
            <p>
                ACME Industries Ltd.
                <br />
                Providing reliable tech since 1992
            </p>
        </aside>
        <nav>
            <h6 class="footer-title">Company</h6>
            <a class="link link-hover">About us</a>
            <a class="link link-hover">Contact</a>
            <a class="link link-hover">Jobs</a>
            <a class="link link-hover">Press kit</a>
        </nav>
    </footer>
    <script>
        function redirect() {
            document.location.href = '/add-movie'
        }
    </script>
@endsection
