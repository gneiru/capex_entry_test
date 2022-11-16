<?php $title = "View Role"; ?>

@extends('layout')
@section('content')

    <div class="text-3xl text-white">
        {{ $title }}
    </div>
    <!-- Back Button -->
    <button
        type="button" 
        onclick="window.location='{{ route('roles.index') }}'" 
        class="rounded-lg font-thin text-gray-900 bg-gray-400 dark:bg-gray-400 dark:text-gray-700 px-2 my-5"
    >
    Back
    </button>
    
    <!-- Role INFO -->
    <div class="block p-6 max-w-sm rounded-lg border shadow-md bg-gray-800 border-gray-700 hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">{{ $role->user_id }}</h5>
        <p class="font-normal text-gray-400">{{ $role->role_name }}</p>
    </div>



@endsection