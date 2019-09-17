@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-3 form-group offset-md-1">
                                <label for="first_name" class="text-md-left">{{__('First Name')}}</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="middle_name" class="text-md-left">{{__('Middle Name')}}</label>
                                <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" required autocomplete="middle_name" autofocus>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="last_name" class="text-md-left">{{__('Last Name')}}</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                            </div>
                            <div class="col-md-1 form-group">
                                <label for="suffix" class="text-md-left">{{__('Suffix')}}</label>
                                {!! Form::select('suffix', ['' => 'None', 'Jr' => 'Jr', 'Sr' => 'Sr', 'II' => 'II', 'III' => 'III', 'IV' => 'IV', 'V' => 'V'], "{{ old('suffix') }}", ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            @error('middle_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="address_1" class="col-md-1 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-11">
                                <input id="address_1" type="text" class="form-control @error('address_1') is-invalid @enderror" name="address_1" value="{{ old('address_1') }}" required autocomplete="address_1">

                                @error('address_1')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-11 offset-md-1">
                                <input id="address_2" type="text" class="form-control @error('address_2') is-invalid @enderror" name="address_2" value="{{ old('address_2') }}" required autocomplete="address_2">

                                @error('address_2')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 form-group offset-md-1">
                                <label for="city" class="text-md-left">{{__('City')}}</label>
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="state_province" class="text-md-left">{{__('State/Province')}}</label>
                                <input id="state_province" type="text" class="form-control @error('state_province') is-invalid @enderror" name="state_province" value="{{ old('state_province') }}" required autocomplete="state_province" autofocus>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="postal_code" class="text-md-left">{{__('Postal Code')}}</label>
                                <input id="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ old('postal_code') }}" required autocomplete="postal_code" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            @error('state_province')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            @error('postal_code')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-1 col-form-label text-md-right">{{__('Country')}}</label>
                            <div class="col-md-11">
                                <select class="country_selector form-control" id="country" name="country">
                                    <option value="">{{__('Select a country')}}</option>
                                    @foreach(\PragmaRX\Countries\Package\Countries::all()->pluck('name.common', 'cca2') as $cca2 => $cname)
                                        <option value="{{ $cca2 }}" @if($cca2 === old('country')) selected @endif>{{ $cname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
    <script type="text/javascript">
        $(function(){
            $('.country_selector').selectize({
                render: {
                    option: function(data, escape) {
                        console.log(data.value);
                        return '<div class="option"><span class="flag-icon flag-icon-' + String(escape(data.value)).toLowerCase() + '"></span> ' + escape(data.text) + '</div>';
                    },
                    item: function(data, escape) {
                        return '<div class="item"><span class="flag-icon flag-icon-' + String(escape(data.value)).toLowerCase() + '"></span> ' + escape(data.text) + '</div>';
                    }
                },
            });
        });
    </script>
@endsection
