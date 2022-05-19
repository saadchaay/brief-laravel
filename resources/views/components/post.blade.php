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
        <div class="w-full h-8 flex justify-between items-center px-3 my-3">
            <div class="flex justify-around">
                <div class="flex items-center">
                    
                    <div class="z-10 rounded-full flex items-center justify-center ">
                        <svg class="h-6 w-6 text-indigo-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" />  <polyline points="17 6 23 6 23 12" /></svg>    
                    </div>
                    <p class="mx-3 text-gray-500">7 Likes</p>
                </div>
                <div class="flex items-center">
                    <div class="z-10 rounded-full flex items-center justify-center ">
                        <svg class="h-6 w-6 text-gray-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polyline points="23 18 13.5 8.5 8.5 13.5 1 6" />  <polyline points="17 18 23 18 23 12" /></svg>    
                    </div>
                    <p class="mx-3 text-gray-500">7 Dislikes</p>
                </div>
            </div>
            <div class="">
                @if($comments->count() > 0)
                    <p class="ml-3 text-gray-500">{{ $comments->count() }} {{ Str::plural('Comment', $comments->count()) }}</p>
                @endif
            </div>
        </div>
        <hr>
            <div class="flex justify-between w-full my-3">
                <button class="flex flex-row justify-center items-center w-full space-x-3">
                    <span class="font-semibold text-lg text-gray-600">{{$post->user->count()}}
                        <span class="underline">{{ Str::plural('Like', 1) }}</span> 
                    </span>
                </button>
                <button class="flex flex-row justify-center items-center w-full space-x-3">
                    <span class="font-semibold text-lg text-gray-600">{{$post->user->count()}}
                        <span class="underline">{{ Str::plural('Unlike', 1) }}</span> 
                    </span>
                </button>
                <button class="flex flex-row justify-center items-center w-full space-x-3"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="#838383" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    <span class="font-semibold text-lg text-gray-600">{{ $comments->count() }} {{ Str::plural('Comment', $comments->count()) }}</span>
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

        <div class="overflow-y-scroll max-h-80 mt-3">
            @foreach ($comments as $item)
                <div class="flex flex-col items-start justify-start my-1 mx-4">
                         <div class="text-xs my-3 font-bold">
                            <span>{{ auth()->user()->name }}</span>
                        </div>
                        <div class="bg-gray-100 rounded-lg px-5 py-3 mb-2">
                            <span class="text-sm w-auto">{{ $item->body }}</span>
                        </div>
                        <span class="flex justify-start items-center">
                            <span class="text-xs text-gray-700 px-2 justify-center">
                                {{ $item->created_at->diffForHumans() }}
                            </span>
                            @can('delete', $item)
                                <form action="{{ route('comments.destroy', $item) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="">
                                        <span class="text-xs text-gray-700 px-2 justify-center underline">
                                            delete
                                        </span>
                                    </button>
                                </form>
                            @endcan
                        </span> 
                </div>
            @endforeach
        </div>
        
    </div>