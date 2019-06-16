@extends('admin.layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="row justify-content-center">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Fixed Price</th>
                        <th scope="col">Order Count</th>
                        <th scope="col">Total Sell Amount</th>
                        <th scope="col">Total Revenue</th>
                        <th scope="col">Total Stock Amount</th>
                        <th scope="col">Total Cost</th>
                        <th scope="col">Total Result</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                        <tr>
                            <th scope="row">{{ $result->product->name }}</th>
                            <td>{{ $result->product->fixed_price }}</td>
                            <td>{{ $result->order_count }}</td>
                            <td>{{ $result->order_amount }}</td>
                            <td>{{ $result->order_price }}</td>
                            <td>{{ $result->stock_amount }}</td>
                            <td>{{ $result->stock_price }}</td>
                            <td>{{ $result->total_result }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $results->links() }}
        </div>
    </div>
@endsection