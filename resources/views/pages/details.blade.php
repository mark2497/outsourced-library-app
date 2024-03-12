@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full p-6">
        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm p-4">
            <x-history-list :histories="$histories" :book="$book"/>
        </section>
    </div>
</main>
@endsection
