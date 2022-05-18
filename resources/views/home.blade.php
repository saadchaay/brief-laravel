@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center items-center">
        <form action="{{ route('posts') }}" method="post" class="w-full flex flex-col justify-center items-center">
            <div class="flex flex-col w-8/12 bg-white p-6 rounded-lg my-2">
                @csrf
                <select name="category" id="category" class="title bg-gray-100 border rounded-lg border-gray-300 p-2 mb-4 outline-none">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
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
        <div class="flex flex-col w-full">
            @if ($posts->count())
            <div class="flex flex-col justify-center items-center">
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach
            </div>
                
                {{-- {{ $posts->links() }} --}}
            @else
                <p>There are no posts</p>
            @endif
        </div> 
        {{-- <div class="flex flex-col ">
            @foreach ($posts as $post)
                    <x-post :post="$post"></x-post>
            @endforeach
        </div> --}}
        
    </div>
@endsection