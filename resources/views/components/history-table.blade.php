
<table class="table-fixed">
    <caption class="text-lg p-4">History of Book {{$book['title']}}</caption>
  <thead>
    <tr>
      <th>Borrower</th>
      <th>From</th>
      <th>To</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($histories as $history)
        <tr class="text-center">
            <td>{{$history['borrower']['name']}}</td>
            <td>{{$history['borrowed_at']}}</td>
            <td>{{$history['returned_at']}}</td>
        </tr>
    @endforeach
  </tbody>
</table>