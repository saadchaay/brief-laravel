@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center items-center">
        <div class="flex flex-col w-8/12 bg-white p-6 rounded-lg my-2">
            <select name="category" id="category" class="title bg-gray-100 border rounded-lg border-gray-300 p-2 mb-4 outline-none">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <textarea class="description bg-gray-100 sec p-3 rounded-lg h-50 border border-gray-300 " spellcheck="false" placeholder="Describe everything about this post here"></textarea>
            <button type="submit" class="flex items-center rounded-lg bg-indigo-500 px-4 py-2 text-white mt-4 w-1/6">
                <span class="font-medium subpixel-antialiased">Post</span>
            </button>      
        </div>

        <div class="flex flex-col w-8/12 bg-white p-6 rounded-lg ">
            <input class="title bg-gray-100 border rounded-lg border-gray-300 p-2 mb-4 outline-none" spellcheck="false" placeholder="Title" type="text">
            <textarea class="description bg-gray-100 sec p-3 rounded-lg h-60 border border-gray-300 " spellcheck="false" placeholder="Describe everything about this post here"></textarea>
        </div>

    </div>
@endsection