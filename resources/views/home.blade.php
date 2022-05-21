@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center items-center">
        <x-form :categories="$categories" :action="route('posts')" />
        
        <div class="w-8/12 bg-white p-4 rounded-lg font-bold">
            <div class="w-auto">
                <form action="{{ route('filter') }}" method="post" class="flex justify-between items-center flex-wrap">
                    @csrf
                    <div class="flex justify-start flex-wrap w-auto">
                        <select name="category" class="title border rounded-lg border-gray-300 py-2 px-2 outline-none">
                            <option value="">Choose category ...</option>
                            @foreach ($categories as $category)
                                <x-category :category="$category" />
                            @endforeach
                        </select>
                        <select name="byPost" class="border rounded-lg border-gray-300 py-2 px-2 ml-1">
                            <option value="">Sorted by ...</option>
                            <option value="top">Top post</option>
                            <option value="newest">Newest post</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit">
                            <span class="font-medium subpixel-antialiased underline hover:text-blue-700">Filter</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="flex flex-col w-full">
            @if ($posts->count())
            <div class="flex flex-col justify-center items-center">
                @foreach ($posts as $post)
                    <x-post :post="$post" :comments="$post->comments" />
                @endforeach
            </div>
            @else
                <div class="flex justify-center mt-3 ">
                    <div class="w-8/12 bg-white p-6 rounded-lg font-bold">
                        There are no posts
                    </div>
                </div>
            @endif
        </div>
        
    </div>
@endsection