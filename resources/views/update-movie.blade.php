@extends('components.main')

@section('app')
    @include('components.navbar')
    <div class="content mb-12">
        <form action="{{ route('movie.update', ['id' => $movie->id]) }}" class="mx-auto w-full p-5" method="post">
            @csrf
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text text-xl font-semibold">Title</span>
                </div>
                <input type="text" placeholder="Type here" name="title" class="input input-bordered w-full @error('title') input-error @enderror"
                    value="{{ $movie->title }}" />
                <div class="label">
                    @error('title')
                        <span class="label-text-alt text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text text-xl font-semibold">Director</span>
                </div>
                <input type="text" placeholder="Type here" name="director" class="input input-bordered w-full @error('director') input-error @enderror"
                    value="{{ $movie->director }}" />
                <div class="label">
                    @error('director')
                        <span class="label-text-alt text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </label>
            <label class="form-control">
                <div class="label">
                    <span class="label-text text-xl font-semibold">Summary</span>
                </div>
                <textarea class="textarea textarea-bordered h-24 @error('summary') textarea-error @enderror" name="summary" placeholder="Type here">{{ $movie->summary }}</textarea>
                <div class="label">
                    @error('summary')
                        <span class="label-text-alt text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </label>
            <lable class="form-control">
                <div class="label">
                    <span class="label-text text-xl font-semibold">Genres</span>
                </div>
                <input type="hidden" name="genres" id="input-genres"value="{{ $movie->genres }}">
                <select id="genres" multiple>
                    <option value="Drama" @if (in_array('Drama', explode(',', $movie->genres))) @selected(true) @endif>Drama
                    </option>
                    <option value="Action" @if (in_array('Action', explode(',', $movie->genres))) @selected(true) @endif>Action
                    </option>
                    <option value="Animation" @if (in_array('Animation', explode(',', $movie->genres))) @selected(true) @endif>
                        Animation</option>
                    <option value="Sci-Fi" @if (in_array('Sci-Fi', explode(',', $movie->genres))) @selected(true) @endif>Sci-Fi
                    </option>
                    <option value="Horror" @if (in_array('Horror', explode(',', $movie->genres))) @selected(true) @endif>Horror
                    </option>
                </select>
                @error('genres')
                    <span class="label-text-alt mt-2 text-red-500">{{ $message }}</span>
                @enderror
            </lable>
            <div class="button mt-14 flex">
                <button type="submit" class="btn w-1/2 bg-orange-600 text-white font-semibold">Save</button>


        </form>
            <form action="{{ route('movie.delete', ['id' => $movie->id]) }}" class="w-full" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Sure delete this movie?')"
                    class="btn w-full bg-red-600 text-white font-semibold">Delete</button>
            </form>
            </div>
    </div>
    <footer class="bg-orange-600 opacity-75 py-8">
        <p class="text-center font-semibold text-slate-200">Copyright Talenavi {{ date('Y') }}</p>
    </footer>
@endsection
