@extends('admin.layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ action('Admin\DiscountController@store') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="col-md-3 col-form-label">Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="discount" class="col-md-3 col-form-label">Discount</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="discount" name="discount" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="action_type" class="col-md-3 col-form-label">Action Type</label>
                        <div class="col-md-6">
                            <select class="form-control" id="action_type" name="action_type">
                                @foreach($actions as $action)
                                    <option value="{{ $action->type }}">{{ $action->action }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="is_auto_apply_checkout" class="col-md-3 col-form-label">Auto Apply To Checkout</label>
                        <div class="col-md-6">
                            <select class="form-control" id="is_auto_apply_checkout" name="is_auto_apply_checkout">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="active" class="col-md-3 col-form-label">Active</label>
                        <div class="col-md-6">
                            <select class="form-control" id="active" name="active">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="is_indefinitely" class="col-md-3 col-form-label">Indefinitely</label>
                        <div class="col-md-6">
                            <select class="form-control" id="is_indefinitely" name="is_indefinitely">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>

                    <div class="datetime-toggle">
                        <div class="form-group row">
                            <label for="start_at" class="col-md-3 col-form-label">Start At</label>
                            <div class="col-md-6 input-group date" id="start_at" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" name="start_at" data-target="#start_at"/>
                                <div class="input-group-append" data-target="#start_at" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="end_at" class="col-md-3 col-form-label">End At</label>
                            <div class="col-md-6 input-group date" id="end_at" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" name="end_at" data-target="#end_at"/>
                                <div class="input-group-append" data-target="#end_at" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
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
        $('#is_indefinitely').on('change', function() {
            this.value==='1' ? $('.datetime-toggle').show() : $('.datetime-toggle').hide();
        });
        var msg = "{{ Session::get('post_alert') }}";
        var exist = "{{ Session::has('post_alert') }}"
        if (exist) {
            alert(msg);
        }
    });
</script>
@endsection