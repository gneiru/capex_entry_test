<?php $title = "Users"; ?>

@extends('layout')
@section('content')

    <div class="text-3xl text-white">
        {{ $title }}
    </div>
    <button
        type="button" 
        onclick="window.location='{{ route('users.create') }}'" 
        class="rounded-lg font-thin text-gray-900 bg-gray-400 dark:bg-gray-400 dark:text-gray-700 px-2 my-5"
    >
        Add
    </button>
    @if(session('status'))
    <div class="flex p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ session('status') }}</span>
        </div>
    </div>
    @endif
    @isset ($users)
        <table class="w-full text-sm text-left text-gray-400 table-auto">
            <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                
                    @forelse ($users as $user)
                        <tr
                            class="bg-white border-b bg-gray-800 border-gray-700 hover:bg-gray-50 hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                {{ $user->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($user->status == 0)
                                    Inactive
                                @elseif ($user->status == 1)
                                    Active
                                @endif
                            </td>
                            <td class="px-6 py-4">
                            <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                <button type="button" 
                                    class="
                                        text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-2 py-1 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                    onclick="
                                        window.location='{{ route('users.show',$user->id) }}'"
                                >View</button>
                                
                                <!-- Role Access -->
                                @if(env('ROLE_NAME') == 'Admin')
                                    <button type="button" 
                                        class="
                                            focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-2 py-1 mr-2 mb-2 dark:focus:ring-yellow-900"
                                        onclick="
                                            window.location='{{ route('users.edit',$user->id) }}'"
                                    >Edit</button>
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="
                                            text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-1 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                        type="submit"
                                    >Delete</button>
                                @endif
                            </form>
                            </td>
                        </tr>
                    @empty
                    <div class="flex p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Empty Records</span>
                        </div>
                    </div>
                    @endforelse

            </tbody>
        </table>
        {!! $users->links() !!}
    @endisset
@endsection