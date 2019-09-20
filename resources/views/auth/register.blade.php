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

                        <div class="row">
                            <div class="col-md-4">
                                <label for="first_name">{{__('First Name')}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend align-middle">
                                        <span class="input-group-text fas fa-lg fa-asterisk text-danger"></span>
                                    </div>
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="middle_name" class="text-md-left">{{__('Middle Name')}}</label>
                                <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" autocomplete="middle_name" autofocus>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="last_name" class="text-md-left">{{__('Last Name')}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend align-middle">
                                        <span class="input-group-text fas fa-lg fa-asterisk text-danger"></span>
                                    </div>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                </div>
                            </div>
                            <div class="col-md-1 form-group">
                                <label for="suffix" class="text-md-left">{{__('Suffix')}}</label>
                                {!! Form::select('suffix', ['' => 'None', 'Jr' => 'Jr', 'Sr' => 'Sr', 'II' => 'II', 'III' => 'III', 'IV' => 'IV', 'V' => 'V'], "{{ old('suffix') }}", ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
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

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="address_1">{{ __('Address') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend align-middle">
                                        <span class="input-group-text fas fa-lg fa-asterisk text-danger"></span>
                                    </div>
                                    <input id="address_1" type="text" class="form-control @error('address_1') is-invalid @enderror" name="address_1" value="{{ old('address_1') }}" required autocomplete="address_1">
                                </div>

                                @error('address_1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="address_2" type="text" class="form-control @error('address_2') is-invalid @enderror" name="address_2" value="{{ old('address_2') }}" autocomplete="address_2">

                                @error('address_2')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="country">{{__('Country')}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend align-middle">
                                        <span class="input-group-text fas fa-lg fa-asterisk text-danger"></span>
                                    </div>
                                    <select class="form-control @error('country') is-invalid @enderror" id="country" name="country" required>
                                        <option value="">{{__('Select a country')}}</option>
                                        @foreach(\PragmaRX\Countries\Package\Countries::all()->pluck('name.common', 'cca3') as $cca3 => $cname)
                                            <option value="{{ $cca3 }}" @if($cca3 === old('country')) selected @endif>{{ $cname }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="city" class="text-md-left">{{__('City')}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend align-middle">
                                        <span class="input-group-text fas fa-lg fa-asterisk text-danger"></span>
                                    </div>
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="state_province" class="text-md-left">{{__('State/Province')}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend align-middle">
                                        <span class="input-group-text fas fa-lg fa-asterisk text-danger"></span>
                                    </div>
                                    <select class="form-control @error('state_province') is-invalid @enderror" id="state_province" name="state_province" required>
                                        <option value="">{{__('Select a state or province')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="postal_code" class="text-md-left">{{__('Postal Code')}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend align-middle">
                                        <span class="input-group-text fas fa-lg fa-asterisk text-danger"></span>
                                    </div>
                                    <input id="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ old('postal_code') }}" required autocomplete="postal_code" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend align-middle">
                                        <span class="input-group-text fas fa-lg fa-asterisk text-danger"></span>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                </div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="telephone" class="text-md-left">{{__('Telephone')}}</label>
                                <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" autocomplete="telephone" autofocus>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="dob" class="text-md-left">{{__('Date of Birth')}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend align-middle">
                                        <span class="input-group-text fas fa-lg fa-asterisk text-danger"></span>
                                    </div>
                                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @error('telephone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            @error('dob')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend align-middle">
                                        <span class="input-group-text fas fa-lg fa-asterisk text-danger"></span>
                                    </div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 form-group">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend align-middle">
                                        <span class="input-group-text fas fa-lg fa-asterisk text-danger"></span>
                                    </div>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-md-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <span class="fas fa-lg fa-asterisk text-danger"></span> Required
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
            var xhr;
            var select_state, $select_state;
            var select_country, $select_country;

            $select_country = $('#country').selectize({
                render: {
                    option: function(data, escape) {
                        console.log(data.value);
                        return '<div class="option"><span class="flag-icon flag-icon-' + String(escape(data.value)).toLowerCase() + '"></span> ' + escape(data.text) + '</div>';
                    },
                    item: function(data, escape) {
                        return '<div class="item"><span class="flag-icon flag-icon-' + String(escape(data.value)).toLowerCase() + '"></span> ' + escape(data.text) + '</div>';
                    }
                },
                onChange: function(value) {
                    select_state.disable();
                    select_state.clearOptions();
                    select_state.load(function(callback) {
                        xhr && xhr.abort();
                        xhr = $.ajax({
                            url: '/api/v1/states/' + value,
                            success: function(results) {
                                if (results.length === 0) {
                                    select_state.settings.placeholder = "No state/provinces found";
                                    select_state.updatePlaceholder()
                                } else {
                                    select_state.settings.placeholder = "Select a state or province";
                                    select_state.updatePlaceholder()
                                    callback(results);
                                    select_state.enable();
                                }
                            },
                            error: function() {
                                callback();
                            }
                        })
                    });
                }
            });

            $select_state = $('#state_province').selectize({
                valueField: 'name',
                labelField: 'name',
                searchField: ['name']
            });
            select_country  = $select_country[0].selectize;
            select_state = $select_state[0].selectize;
            select_state.disable();
        });
    </script>
@endsection
