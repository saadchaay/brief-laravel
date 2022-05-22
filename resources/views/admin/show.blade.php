@extends('layouts.app')

@section('content')
<div class="flex flex-col justify-center items-center">
    <div class="w-8/12 bg-white p-6 rounded-lg font-bold">
        Update Post
    </div>
    <form action="{{ route('admin.post.update', $post) }}" method="post" class="w-full flex flex-col justify-center items-center">
        @csrf
        @method('PUT')
        <div class="flex flex-col w-8/12 bg-white p-6 rounded-lg my-2">
            <select name="category_id" class="title bg-gray-100 border rounded-lg border-gray-300 p-2 mb-3 outline-none">
                <option value="{{ $post->category->id }}">{{ $post->category->title }}</option>
                @foreach ($categories as $category)
                    <x-category :category="$category" />
                @endforeach
            </select>
            @error('category_id')
                <div class="text-red-500 mb-3 text-sm">
                    {{ $message }}
                </div>
            @enderror
            <textarea class="description bg-gray-100 sec p-3 rounded-lg h-50 border border-gray-300 " spellcheck="false" placeholder="Describe everything about this post here" name="body">{{ $post->body }}</textarea>
            @error('body')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
            <button type="submit" class="flex items-center rounded-lg bg-indigo-500 px-4 py-2 text-white mt-4 w-1/6 text-center">
                Update
            </button>
        </div>
    </form>
    
</div>
@endsection