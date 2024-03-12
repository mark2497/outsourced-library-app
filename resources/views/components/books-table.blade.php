
<table class="table-fixed">
    <caption class="text-lg p-4">List of Books from your Library</caption>
    @error('book')
        <div class="border border-red-500 p-3 mb-5 text-red-500 w-full md:w-1/2 mx-auto text-center">
            @foreach($errors->get('book') as $error)
                <span>{{ $error }}</span>
            @endforeach
        </div>
    @enderror
    @if(session('message'))
        <div class="border border-green-500 p-3 mb-5 text-green-500 w-full md:w-1/2 mx-auto text-center">
            {{ session('message') }}
        </div>
    @endif
  <thead>
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($books as $book)
        <tr class="text-center">
            <td>{{$book['id']}}</td>
            <td>{{$book['title']}}</td>
            <td class="@if($book['condition'] == 'available') text-green-400 @else text-red-400 @endif">{{ucfirst($book['condition'])}}</td>
            <td class="flex justify-center gap-4">
                @if ($book['condition'] == 'available')
                <form action="/books/borrow/{{$book['id']}}" method="post">
                    @csrf
                    <input type="hidden" name="book" value="{{$book['id']}}">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Borrow</button>
                </form>
                @elseif ($book['condition'] == 'borrowed' && $book['currentBorrower'])
                    <form action="/books/return/{{$book['id']}}" method="post">
                        @csrf
                        <input type="hidden" name="book" value="{{ $book['id'] }}">
                        <button type="submit" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Return</button>
                    </form>
                @else
                @endif
                <form action="/books/details/{{$book['id']}}" method="get">
                    <input type="hidden" name="book" value="{{ $book['id'] }}">
                    <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Details</button>
                </form>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>