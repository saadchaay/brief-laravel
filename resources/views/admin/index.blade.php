@extends('layouts.app')

@section('content')
    {{-- <div class="flex flex-col justify-center items-center">
        <!-- component -->
        <div class="bg-white p-4 rounded-md w-10/12 mt-4">
            <div>
                <h2 class="mb-4 text-xl font-bold text-gray-700">Posts</h2>
            <div>
            <div class="flex justify-between bg-gradient-to-tr from-indigo-600 to-purple-600 rounded-md py-2 px-4 text-white font-bold text-center">
                <div>
                    <span>#ID</span>
                </div>
                <div>
                    <span>Category</span>
                </div>
                <div>
                    <span>Content</span>
                </div>
                <div>
                    <span>Posted by</span>
                </div>
                <div>
                    <span>Created at</span>
                </div>
                <div>
                    <span>Actions</span>
                </div>
            </div>
            <div class="flex justify-between border-t text-sm font-normal mt-4 space-x-4 text-center">
            </div>
        </div>
    </div> --}}

    <!-- component -->
<div class="container mx-auto p-6 font-mono">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
      <div class="w-full overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
              <th class="px-4 py-3">#ID</th>
              <th class="px-4 py-3">Category</th>
              <th class="px-4 py-3">Content</th>
              <th class="px-4 py-3">Posted by</th>
              <th class="px-4 py-3">Created at</th>
              <th class="px-4 py-3">Action</th>
            </tr>
          </thead>
          <tbody class="bg-white">
            @foreach ($posts as $post)
                <tr class="text-gray-700">
                  <td class="px-4 py-3 border">
                    <div class="flex items-center text-sm">
                      <div>
                        <p class="font-semibold text-black">{{$post->id}}</p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-ms font-semibold border">22</td>
                  <td class="px-4 py-3 text-xs border overflow-y-scroll max-h-40 w-1/4">
                    <span class="px-2 py-1 font-semibold"> {{$post->body}} </span>
                  </td>
                  <td class="px-4 py-3 text-sm border">6/4/2000</td>
                  <td class="px-4 py-3 text-sm border">6/4/2000</td>
                  <td class="px-4 py-3 text-sm border">6/4/2000</td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection