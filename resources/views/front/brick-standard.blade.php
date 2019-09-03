@foreach($deals as $deal)
<tr>
   <td>{{ $deal->date }}</td>   
   <td>{{ $deal->seller->name }}</td>
   <td>{{ $deal->buyer->name }}</td>  
   <td>{{ $deal->name }}</td>   
   <td>{{ $deal->price }}</td>
</tr>
@endforeach


