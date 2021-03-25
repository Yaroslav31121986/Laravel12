@extends('admin.create_form')

@section('body_admin')
    <div class="row">
        <div class="col-md-6 col-xl-4 a1"></div>
        <div class="col-md-6 col-xl-4 a2">
            <div class="justify-content-center px-lg-4 py-4 col-12">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">{{ __('Create User') }}</div>
                            <div class="card-body">
                                @include('admin.include.text')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 a3"></div>
    </div>
    <script src="{{asset('js/admin/ajaxUpdateUser.js')}}"></script>
@endsection

