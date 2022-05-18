@props(['categories'=> $categories])
<select name="category" id="category">
    @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>

