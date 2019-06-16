@extends('admin.layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form class="form-inline" action="{{ action('Admin\DiscountController@index') }}" method="get">
                    @csrf
                    <div class="form-group">
                        <label for="active" class="col-md-3 control-label">Title</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="active" class="col-md-3 control-label">Active</label>
                        <div class="col-md-9">
                            <select class="form-control" id="active" name="active">
                                <option value="-1">All</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Action type</th>
                        <th scope="col">Create by</th>
                        <th scope="col">Active</th>
                        <th scope="col">Indefinitely</th>
                        <th scope="col">Auto apply checkout</th>
                        <th scope="col">Start at</th>
                        <th scope="col">End at</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Updated at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($discounts as $discount)
                        <tr>
                            <th scope="row">{{ $discount->title }}</th>
                            <td>{{ $discount->discount }}</td>
                            <td>{{ $discount->actionType->action }}</td>
                            <td>{{ $discount->createdBy->name }}</td>
                            <td>{{ $discount->active }}</td>
                            <td>{{ $discount->is_indefinitely }}</td>
                            <td>{{ $discount->is_auto_apply_checkout }}</td>
                            <td>{{ $discount->start_at }}</td>
                            <td>{{ $discount->end_at }}</td>
                            <td>{{ $discount->created_at }}</td>
                            <td>{{ $discount->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $discounts->links() }}
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    $(function () {
        $('.datetime-toggle').hide();
        $('#start_at').datetimepicker();
        $('#end_at').datetimepicker({
            useCurrent: false
        });
        $('#start_at').on('change.datetimepicker', function (e) {
            $('#end_at').datetimepicker('minDate', e.date);
        })
        $('#end_at').on('change.datetimepicker', function (e) {
            $('#start_at').datetimepicker('maxDate', e.date);
        })
    });
</script>
@endsection