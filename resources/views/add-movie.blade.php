@extends('components.main')

@section('app')
    @include('components.navbar')
    <div class="content">
        <form action="{{ route('movie.add') }}" class="mx-auto w-full p-5" method="post">
            @csrf
            <input type="hidden" name="movie_id" value="{{ isset($movie->id) ? $movie->id : 0 }}">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text text-xl font-semibold">Title</span>
                </div>
                <input type="text" placeholder="Type here" name="title" class="input input-bordered w-full" />
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
                <input type="text" placeholder="Type here" name="director" class="input input-bordered w-full" />
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
                <textarea class="textarea textarea-bordered h-24" name="summary" placeholder="Type here"></textarea>
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
                <input type="hidden" name="genres" id="input-genres">
                <select id="genres" multiple>
                    <option value="Drama">Drama</option>
                    <option value="Action">Action</option>
                    <option value="Animation">Animation</option>
                    <option value="Sci-Fi">Sci-Fi</option>
                    <option value="Horror">Horror</option>
                </select>
                @error('genres')
                    <span class="label-text-alt mt-2 text-red-500">{{ $message }}</span>
                @enderror
            </lable>
            <div class="button mt-14">
                <button type="submit" class="btn bg-orange-600 text-white font-semibold">Save</button>
                <a class="btn bg-red-600 text-white font-semibold">Delete</a>
            </div>
        </form>
    </div>
@endsection
