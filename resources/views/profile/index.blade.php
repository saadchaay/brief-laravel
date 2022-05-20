@extends('layouts.app')

@section('content')
<div class="flex flex-col justify-center items-center">
    <div class="w-8/12 bg-white p-6 rounded-lg font-bold mb-10">
        User Profile
    </div>

    <div class="flex w-8/12 justify-center flex-wrap ietms-center">
        {{-- USER FORM --}}
        <div class="bg-white p-6 rounded-lg font-bold w-full my-2">
            <div class="w-4/12 font-medium my-3">
                Update user information
            </div>
            <form action="{{ route('profile.update', $user) }}" method="post" class="w-auto">
                @csrf
                @method('PUT')
                <div class="flex flex-col">
                    <div class="w-auto my-2">
                        <label for="name" class="sr-only">Name</label>
                        <input type="text" name="name" id="name" placeholder="Your full name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ $user->name }}">

                        @error('name')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="w-auto my-2">
                        <label for="username" class="sr-only">Username</label>
                        <input type="text" name="username" id="username" placeholder="Your username" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" value="{{ $user->username }}">

                        @error('username')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="w-auto my-2">
                        <label for="email" class="sr-only">Email</label>
                        <input type="text" name="email" id="email" placeholder="Your email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ $user->email }}">

                        @error('email')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="w-auto my-2">
                        <label for="phone" class="sr-only">Phone</label>
                        <input type="text" name="phone" id="phone" placeholder="Your phone" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('phone') border-red-500 @enderror" value="{{ $user->phone }}">

                        @error('phone')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="flex items-center rounded-lg bg-indigo-500 px-6 py-3 text-white mt-4 mx-2 w-auto">
                        <span class="font-medium text-center">Update</span>
                    </button>
                </div>
            </form>
        </div>

        {{-- USER INFO PASSWORD --}}
        <div class="bg-white p-6 rounded-lg font-bold w-full my-2">
            <div class="w-4/12 font-medium my-3">
                Update password
            </div>
            <form action="{{ route('profile.edit', $user) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="flex flex-col justify-center">
                    <div class="w-auto my-2">
                        <label for="oldPassword" class="sr-only">Old Password</label>
                        <input type="text" name="oldPassword" id="oldPassword" placeholder="Old Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('oldPassword') border-red-500 @enderror">

                        @error('oldPassword')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="w-auto my-2">
                        <label for="newPassword" class="sr-only">New Password</label>
                        <input type="text" name="newPassword" id="newPassword" placeholder="new Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('newPassword') border-red-500 @enderror">

                        @error('newPassword')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="w-auto my-2">
                        <label for="oldPassword" class="sr-only">Old Password</label>
                        <input type="text" name="oldPassword" id="oldPassword" placeholder="Old Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('oldPassword') border-red-500 @enderror">

                        @error('oldPassword')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="flex items-center rounded-lg bg-indigo-500 px-6 py-4 text-white mt-4 mx-2 w-auto">
                        <span class="font-medium text-center">Update Password</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection