@extends('admin.layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form id="form" action="{{ action('Admin\ProductController@store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label">Product Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="invalid-feedback">
                                Please provide a profuct name.
                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="amount" class="col-md-3 col-form-label">Amount</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="amount" name="amount" required>
                            <div class="invalid-feedback">
                                Please provide profuct amounts.
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fixed_price" class="col-md-3 col-form-label">Fixed Price</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="fixed_price" name="fixed_price" required>
                            <div class="invalid-feedback">
                                Please provide profuct price.
                            </div>
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

                    <div class="datetime-toggle">
                        <div class="form-group row">
                            <label for="active_at" class="col-md-3 col-form-label">Active At</label>
                            <div class="col-md-6 input-group date" id="active_at" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" name="active_at" data-target="#active_at"/>
                                <div class="input-group-append" data-target="#active_at" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a date.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="discount" class="col-md-3 col-form-label">Discount</label>
                        <div class="col-md-6">
                            @foreach($discounts as $discount)
                                <div class="form-check mt-1">
                                    <input class="form-check-input" type="checkbox" id="discount_{{ $discount->id }}" name="discount[{{ $discount->id }}]" value="{{ $discount->id }}">

                                    <label class="form-check-label" for="discount_{{ $discount->id }}">{{ $discount->title }}</label>
                                    <div class="invalid-feedback">
                                        Not legal.
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-md-3 col-form-label">Upload Image</label>
                        <div class="custom-file col-md-6">
                            <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="image" accept="image/png,image/jpg,image/gif,image/JPEG"/>
                            <label class="custom-file-label" for="image">Choose Image</label>
                            <div class="invalid-feedback">
                                Please provide a image.
                            </div>
                        </div>
                    </div>

                    <button type="submit" id='post' class="btn btn-primary">Submit</button>
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
        $('#active').on('change', function() {
            this.value==='1' ? $('.datetime-toggle').show() : $('.datetime-toggle').hide();
        });

        $('#image').on('change', function(event) {
            if(event.target.files[0]){
                var fileName = event.target.files[0].name;
                $('.custom-file-label').text(fileName);
            }
        })

        $('#post').click(function(event){
            event.preventDefault();

            var formData = new FormData();
            // formData.append('_token', $('form [name="_token"]').val());
            formData.append('name', $('#name').val());
            formData.append('amount', $('#amount').val());
            formData.append('fixed_price', $('#fixed_price').val());
            formData.append('active', $('#active').val());
            formData.append('active_at', $('form [name="active_at"]').val());
            formData.append('image', $('#image')[0].files[0]);

            $('form [type="checkbox"]').each(function(index, value){
                
                if ($(value).prop('checked')==true) {
                    name = $(value).attr('name');
                    formData.append(name, $(value).val());
                }
            })

            if(validity()){
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: "POST",
                    url:"{{ action('Admin\ProductController@store') }}",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(res){
                        alert(res);
                        $("#form").trigger("reset");
                        $('#form input[type=file]~.custom-file-label').each(function(i, obj) {
                            $(obj).text('Choose Image');
                        });
                    },
                    error: function(error){
                        $.each(error.responseJSON.errors,function(index, value) {
                            let indexAry=index.split('.');
                            if(indexAry.length>1){
                                index = indexAry[0] + '['+indexAry[1]+']';
                            }
                            $(`#form [name="${index}"]`).addClass('is-invalid');
                            $(`#form [name="${index}"]~.invalid-feedback`).text(value[0]);
                        })
                    }
                })
            }
        })

        function validity() {
            let flag = true;

            $('.is-invalid').each(function(){
                $(this).removeClass('is-invalid');
            })

            if ($('#form [name="name"]').val()=='') {
                $('#form [name="name"]').addClass('is-invalid');
                $(`#form [name="name"]~.invalid-feedback`).text('Please provide a profuct name.');
                flag=false;
            }

            if ( isNaN( $('#form [name="amount"]').val() ) || $('#form [name="amount"]').val()==="") {
                $('#form [name="amount"]').addClass('is-invalid');
                $(`#form [name="amount"]~.invalid-feedback`).text('Please provide profuct amounts.');
                flag=false;
            }

            if (isNaN( $('#form [name="fixed_price"]').val() ) || $('#form [name="fixed_price"]').val()==="") {
                $('#form [name="fixed_price"]').addClass('is-invalid');
                $(`#form [name="fixed_price"]~.invalid-feedback`).text('Please provide profuct price.');
                flag=false;
            }

            if ($('#form [name="active"]').val()=='1' && $('#form [name="active_at"]').val()==='') {
                $('#form [name="active_at"]').addClass('is-invalid');
                $(`#form [name="active_at"]~.invalid-feedback`).text('Please provide a date.');
                flag=false;
            } else {
                $('#form [name="active_at"]').removeClass('is-invalid');
            }
            if ($('#form [name="image"]').prop('files').length==0) {
                $('#form [name="image"]').addClass('is-invalid');
                $(`#form [name="image"]~.invalid-feedback`).text('Please provide a image.');
                flag=false;
            }
            return flag;
        }

        var msg = "{{ Session::get('post_alert') }}";
        var exist = "{{ Session::has('post_alert') }}"
        if (exist) {
            alert(msg);
        }
    });
</script>
@endsection