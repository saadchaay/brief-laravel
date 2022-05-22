@extends('layouts.app')

@section('content')

<div class="container mx-auto p-6">

    {{-- <form action="{{ route('admin.comment', $post) }}" method="post">
      @csrf
      <div class="flex flex-col w-8/12 bg-white p-5 rounded-lg my-2">
        <label for="comment" class="my-2 hidden">add Comment</label>
        <div class="flex justify-between">
          <input type="text" name="comment" placeholder="Add comment here ..." class="flex-1 py-3 px-2 border rounded-lg mr-3">
          <button type="submit" class="rounded-lg bg-indigo-500 py-2 px-4 text-white">
            <span class="font-medium">Submit</span>
        </button>
        </div>
      </div>
    </form> --}}

    @if ($comments->count() > 0)
    <div class="flex justify-center w-full bg-white p-5 rounded-lg mt-2 mb-6 font-bold uppercase">
      Comments management
    </div>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg mt-4">
      <div class="w-full overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
              <th class="px-4 py-3">#ID</th>
              <th class="px-4 py-3">Post Id</th>
              <th class="px-4 py-3">Comment</th>
              <th class="px-4 py-3">Commented by</th>
              <th class="px-4 py-3">Created at</th>
              <th class="px-4 py-3">Action</th>
            </tr>
          </thead>
          <tbody class="bg-white">
            @foreach ($comments as $comment)
                <tr class="text-gray-700">
                  <td class="px-4 py-3 border">
                    <div class="flex items-center text-sm">
                      <div>
                        <p class="font-semibold text-black">{{$comment->id}}</p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-xs font-semibold border w-">{{$comment->post->id}}</td>
                  <td class="px-4 py-3 text-xs border w-1/4">
                    <span class="px-2 py-1 font-semibold">{{$comment->body}}</span>
                  </td>
                  <td class="px-4 py-3 text-xs border">{{$comment->user->name}}</td>
                  <td class="px-4 py-3 text-xs border">{{$comment->created_at}}</td>
                  <td class="px-4 py-3 text-xs border">
                      <div class="flex">
                          <form action="{{ route('admin.comment.destroy', $comment) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="bg-none">
                                  <svg class="h-6 w-6 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                  </svg>
                              </button>
                          </form>
                          {{-- <a href="" id="open-btn">
                              <svg class="h-6 w-6 text-blue-500"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  
                                  <path stroke="none" d="M0 0h24v24H0z"/> 
                                  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /> 
                                  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /> 
                                  <line x1="16" y1="5" x2="19" y2="8" />
                              </svg>
                          </a> --}}
                      </div> 
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @else
    <div class="flex justify-center w-full bg-white p-5 rounded-lg mt-2 mb-6 font-bold uppercase">
      THis post has no comments
    </div>
    @endif    
  </div>
@endsection