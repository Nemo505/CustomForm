@extends('layouts.master')
@section('title') Custom Form @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body" style="padding: 4% 20%">
                <div class="mb-3">
                    <h3>Form Submittion</h3>
                </div>

                <form action="{{ route('submitting-data') }}" method="post" >
                    @csrf
                    <div class="col-12 px-auto">

                        <label class="control-label">Name</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" value="" id="validationCustom01"  required>
                        </div>

                        <label class="control-label">Phone</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" value="" id="validationCustom01"  required>
                        </div>

                        <label class="control-label">Date of Birth</label>
                        <div class="mb-3">
                            <input type="date" class="form-control" name="name" value="" id="validationCustom01"  required>
                        </div>

                        <label class="control-label">Gender</label>
                        <div class="mb-3">
                            <select class="form-control select2" name="id" id="role">
                                <option disabled selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                    </div>
                    <div class="d-flex flex-wrap gap-2 pt-3">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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
@endsection
