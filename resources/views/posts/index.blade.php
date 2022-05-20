@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center items-center">
        <form action="{{ route('posts') }}" method="post" class="w-full flex flex-col justify-center items-center">
            <div class="flex flex-col w-8/12 bg-white p-6 rounded-lg my-2">
                <div class="font-bold py-1 px-2 mb-4 bg-gray-200 rounded-lg w-1/6">
                    Add New Post
                </div>
                @csrf
                <select name="category_id" class="title bg-gray-100 border rounded-lg border-gray-300 p-2 mb-3 outline-none">
                        <option value=""><span class="text-blue-800">choose category ...</span> </option>
                    @foreach ($categories as $category)
                        <x-category :category="$category" />
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-red-500 mb-3 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                <textarea class="description bg-gray-100 sec p-3 rounded-lg h-50 border border-gray-300 " spellcheck="false" placeholder="Describe everything about this post here" name="body"></textarea>
                @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                <button type="submit" class="flex items-center rounded-lg bg-indigo-500 px-4 py-2 text-white mt-4 w-1/6">
                    <span class="font-medium subpixel-antialiased">Post</span>
                </button>
            </div>
        </form>
        <div class="w-8/12 bg-white p-6 rounded-lg font-bold">
            All Your Posts
        </div>
        <div class="flex flex-col w-full">
            @if ($posts->count())
            <div class="flex flex-col justify-center items-center">
                @foreach ($posts as $post)
                    <x-post :post="$post" :comments="$post->comments" />
                @endforeach
            </div>
            @else
                <p>There are no posts</p>
            @endif
        </div>
    </div>
@endsection