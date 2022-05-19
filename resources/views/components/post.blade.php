@props(['post' => $post, 'comments' => $comments])

    <div class="bg-white w-8/12 rounded-md shadow-md h-auto py-3 px-3 my-3">
        <div class="w-full h-16 flex items-center flex justify-between ">
            <div class="flex">
                <img class=" rounded-full w-10 h-10 mr-3" src="https://scontent.fsub1-1.fna.fbcdn.net/v/t1.0-9/37921553_1447009505400641_8037753745087397888_n.jpg?_nc_cat=102&_nc_sid=09cbfe&_nc_oc=AQnDTnRBxV3QgnhKOtk9AiziIOXw0K68iIUQfdK_rlUSFgs8fkvnQ6FjP6UBEkA6Zd8&_nc_ht=scontent.fsub1-1.fna&oh=728962e2c233fec37154419ef79c3998&oe=5EFA545A" alt="">
                <div>    
                    <h3 class="text-md font-semibold ">{{ $post->user->name }}</h3>
                    <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </div>
            @can('delete', $post)
                <div class="flex">
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-none">
                            <svg class="h-6 w-6 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </form>
                    <a href="{{ route('posts.show', $post) }}">
                        <svg class="h-6 w-6 text-blue-500"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  
                            <path stroke="none" d="M0 0h24v24H0z"/> 
                            <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /> 
                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /> 
                            <line x1="16" y1="5" x2="19" y2="8" />
                        </svg>
                    </a>
                </div> 
            @endcan   
        </div>
        <p>
            {{ $post->body }}
        </p>
        <div class="w-full h-8 flex items-center px-3 my-3">
            <div class="bg-blue-500 z-10 w-5 h-5 rounded-full flex items-center justify-center ">
                <svg class="w-3 h-3 fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="#b0b0b0" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
            </div>
            <div class="bg-red-500 w-5 h-5 rounded-full flex items-center justify-center -ml-1">
                <svg  class="w-3 h-3 fill-current stroke-current text-white" xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="#b0b0b0" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
            </div>
        
            <div class="w-full flex justify-between">
                {{-- update likes count --}}
                <p class="ml-3 text-gray-500">{{ $post->user->count() }}</p>
                <p class="ml-3 text-gray-500">29 comment</p>
            </div>
        </div>
        <hr>
            <div class="grid grid-cols-3 w-full px-5 px-5 my-3">
                <button class="flex flex-row justify-center items-center w-full space-x-3"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="#838383" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                    <span class="font-semibold text-lg text-gray-600">{{$post->user->count()}} {{ Str::plural('Like', 1) }}</span>
                </button>
                <button class="flex flex-row justify-center items-center w-full space-x-3"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="#838383" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    <span class="font-semibold text-lg text-gray-600">{{$post->user->count()}} {{ Str::plural('Comment', 2) }}</span>
                </button>
                <button class="flex flex-row justify-center items-center w-full space-x-3"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="#838383" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
                    <span class="font-semibold text-lg text-gray-600">{{$post->user->count()}} {{ Str::plural('Unlike', 3) }}</span>
                </button>
            </div>
        <hr>
        
        <form action="{{ route('comments') }}" method="post">
            @csrf
            <div class="flex justify-center items-center">
                <input name="comment" type="text" class="mt-4 border border-grey w-full border-1 rounded-full p-2 relative focus:border-red pl-8 text-grey-dark font-light w-full text-sm font-medium tracking-wide rounded-full bg-gray-100" placeholder="Type your commnet..." />
                <button class="rounded-full bg-indigo-500 ml-3 px-4 py-2 text-white mt-4 w-1/6" name="post_id" value="{{$post->id}}">Comment</button>
            </div>
            @error('comment')
                <div class="text-red-500 mb-3 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </form>

        <div class="">
            @foreach ($comments as $item)
                <div>{{$item}}</div>
            @endforeach
        </div>
        
    </div>