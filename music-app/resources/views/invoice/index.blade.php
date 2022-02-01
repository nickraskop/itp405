@extends("layouts.main")

@section("title", "Invoices")

@section("content")
  <table class="table" >
    <tr>
      <th>ID</th>
      <th>Customer</th>
      <th>Date</th>
      <th colspan="2">Total</th>
    </tr>

    @foreach ($invoices as $invoice)
    <tr>
      <td>{{$invoice->id}}</td>
      <td>
        {{$invoice->first_name}} {{$invoice->last_name}}
      </td>
      <td>{{$invoice->invoice_date}}</td>
      <td>{{$invoice->total}}</td>
      <td>
        <a href="{{ route('invoice.show', [ 'id' => $invoice->id ]) }}">
          Details
        </a>
      </td>
    </tr>
    @endforeach
  </table>
@endsection