@extends('layouts.master')
@section('title') Custom Form @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="mb-3">
                    <h3>Choose data you would like to submit</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque soluta, perspiciatis consequuntur voluptatem quaerat quasi. Omnis asperiores und</p>
                </div>

                <form action="{{ route('pending-data') }}" method="post" >
                    @csrf

                    <input class="form-check-input font-size-16" type="checkbox" id="checkAll" name="">
                    <label class="font-size-8" for="checkAll">Select All</label>

                    <div class="row mx-auto my-3">
                        <div class="col-md-3 mb-4">
                            <div class="form-check ">
                                <input class="form-check-input font-size-16" checked type="checkbox" id="checkAll" name="users[]" value="name">
                                <label class="font-size-8" for="checkAll">Name</label>
                                
                            </div>
                        </div>

                        <div class="col-md-3 mb-4">
                            <div class="form-check ">
                                <input class="form-check-input font-size-16" checked type="checkbox" id="checkAll" name="users[]" value="phone">
                                <label class="font-size-8" for="checkAll">Phone</label>
                                
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="form-check ">
                                <input class="form-check-input font-size-16" checked type="checkbox" id="checkAll" name="users[]" value="dob">
                                <label class="font-size-8" for="checkAll">Date of Birth</label>
                                
                            </div>
                        </div>

                        <div class="col-md-3 mb-4">
                            <div class="form-check ">
                                <input class="form-check-input font-size-16" checked type="checkbox" id="checkAll" name="users[]" value="gender">
                                <label class="font-size-8" for="checkAll">Gender</label>
                                
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Next</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/ecommerce-select2.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script>
    $('#checkAll').click(function(e) {
        $(this).closest('div').find('input:checkbox').prop('checked', this.checked);
    });
</script>
@endsection
