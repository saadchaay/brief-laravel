@props(['categories' => $categories, 'action' => $action])

    <form action="{{$action}}" method="post" class="w-full flex flex-col justify-center items-center">
        <div class="flex flex-col w-8/12 bg-white p-6 rounded-lg my-2">
            @csrf
            <select name="category_id" class="title bg-gray-100 border rounded-lg border-gray-300 p-2 mb-3 outline-none">
                    <option value=""><span class="text-blue-800">Choose category ...</span> </option>
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
            <button type="submit" class="flex justify-center rounded-lg bg-indigo-500 py-2 text-white mt-4">
                <span class="font-medium subpixel-antialiased">Post</span>
            </button>
        </div>
    </form>