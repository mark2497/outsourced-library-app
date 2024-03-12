@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full p-6">
        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm p-4">
            <x-history-list :histories="$histories" :book="$book"/>
        </section>
        <section class="w-full">
            <form action="{{ route('home') }}">
                <button type="submit" class="mx-auto flex mt-3 focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Back</button>
            </form>
        </section>
    </div>
</main>
@endsection
