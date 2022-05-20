@extends('layouts.app')

@section('content')
<div class="flex flex-col justify-center items-center">
    <div class="w-8/12 bg-white p-6 rounded-lg font-bold mb-10">
        User Profile
    </div>
    {{-- USER FORM --}}
    <div class="w-8/12 bg-white p-6 rounded-lg font-bold">
        <div class="w-96 bg-gray-100 p-6 rounded-lg font-bold mb-5">
            Information Form
        </div>
        <form action="{{ route('profile') }}" method="post">
            @csrf
            <div class="flex justify-around flex-wrap ">
                <div class="w-96 my-2">
                    <label for="fullName" class="sr-only">Name</label>
                    <input type="text" name="fullName" id="fullName" placeholder="Your full name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('fullName') border-red-500 @enderror" value="{{ $user->name }}">

                    @error('fullName')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="w-96 my-2">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" placeholder="Your username" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" value="{{ $user->username }}">

                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="flex justify-around flex-wrap ">
                <div class="w-96 my-2">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ $user->email }}">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="w-96 my-2">
                    <label for="phone" class="sr-only">Phone</label>
                    <input type="text" name="phone" id="phone" placeholder="Your phone" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('phone') border-red-500 @enderror" value="{{ old('phone') }}">

                    @error('phone')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </form>
    </div>
</div>

@endsection