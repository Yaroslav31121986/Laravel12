<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class="row">
    <div class="col-md-6 col-xl-4 a1"></div>
    <div class="col-md-6 col-xl-4 a2">
        <div class="justify-content-center px-lg-4 py-4 col-12">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">{{ __('Калькулятор') }}</div>
                        <div class="card-body">
                            <form method="GET" action="{{ route('result') }}" >
                                <div class="form-group row">
                                    <label for="thickness" class="col-md-5 col-form-label text-md-right">{{ __('Толщина') }}</label>

                                    <div class="col-md-6">
                                        <input id="thickness" type="text" class="form-control" name="thickness">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="area" class="col-md-5 col-form-label text-md-right">{{ __('Площадь') }}</label>

                                    <div class="col-md-6">
                                        <input id="area" type="text" class="form-control" name="area">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="area" class="col-md-5 col-form-label text-md-right">{{ __('Площядь') }}</label>

                                    <div class="col-md-6">
                                        <p><input name="dzen" type="radio" value="7.84"> 7.84</p>
                                        <p><input name="dzen" type="radio" value="7.74"> 7.74</p>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <br>
                            <div>
                                @if(isset($result))
                                    {{ $result }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4 a3"></div>
</div>
{{--        <script src="{{asset('js/admin/ajaxDeleteClient.js')}}"></script>--}}
</body>
</html>
