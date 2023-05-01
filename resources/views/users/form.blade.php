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

                <form action="{{ route('complete-data') }}" method="post" >
                    @csrf
                    <div class="col-12 px-auto">
                        <input type="hidden" value={{$user->id}} name="id"/>
                        @if ($user->name == 'pending')                            
                            <label class="control-label">Name</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="name" value="" id="validationCustom01"  required>
                            </div>
                        @endif

                        @if ($user->phone == 'pending')     
                            <label class="control-label">Phone</label>
                            <div class="mb-3">
                                <input type="phone" class="form-control" name="phone" value="" id="validationCustom01"  required>
                            </div>
                        @endif

                        @if ($user->date_of_birth == '1111-11-11')  
                            <label class="control-label">Date of Birth</label>
                            <div class="mb-3">
                                <input type="date" class="form-control" name="dob" value="" id="validationCustom01"  required>
                            </div>
                        @endif

                        @if ($user->gender == 'pending')    

                            <label class="control-label">Gender</label>
                            <div class="mb-3">
                                <select class="form-control select2" name="gender" id="role" required>
                                    <option disabled selected>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        @endif

                        <label class="control-label">Email (to send the information)</label>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" value="" id="validationCustom01"  required>
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
