{{-- @props(['post' => $post])

<form action="{{ route('comments') }}" method="post">
    @csrf
    <div class="flex justify-center items-center">
        <input name="comment" type="text" class="mt-4 border border-grey w-full border-1 rounded-full p-2 relative focus:border-red pl-8 text-grey-dark font-light w-full text-sm font-medium tracking-wide rounded-full bg-gray-100" placeholder="Type your commnet..." />
        <button class="rounded-full bg-indigo-500 ml-3 px-4 py-2 text-white mt-4 w-1/6" name="{{$post}}">Comment</button>
    </div>
    @error('comment')
        <div class="text-red-500 mb-3 text-sm">
            {{ $message }}
        </div>
    @enderror
</form> --}}