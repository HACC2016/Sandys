@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                Register Farmers Market  <a style="float:right" href="{{url('/register/user')}}"> Opps I Want To Register As A User</a>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" id="register">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('farmers_market_name') ? ' has-error' : '' }}">
                            <label for="farmers_market_name" class="col-md-4 control-label">Name Of Farmers Market</label>

                            <div class="col-md-6">
                                <input 
                                id="farmers_market_name" 
                                type="text" 
                                class="form-control" 
                                name="farmers_market_name" 
                                value="{{ old('farmers_market_name') }}">

                                @if ($errors->has('farmers_market_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('farmers_market_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('street_address') ? ' has-error' : '' }}">
                            <label for="farmers_market_name" class="col-md-4 control-label">Street Address Of Farmers Market</label>

                            <div class="col-md-6">
                                <input 
                                @change="streetAddressChanged"
                                id="street_address" 
                                type="text" 
                                class="form-control" 
                                name="street_address" 
                                v-model="street_address"
                                value="{{ old('street_address') }}">

                                @if ($errors->has('street_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('street_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                <div id="map" style="width: 100%; height: 300px;"></div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input 
                                readonly = "readonly"
                                id="city" 
                                type="text" 
                                class="form-control" 
                                name="city" 
                                v-model="city"
                                value="{{ old('city') }}">

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                            <label for="zipcode" class="col-md-4 control-label">ZipCode</label>

                            <div class="col-md-6">
                                <input 
                                readonly ="readonly"
                                id="zipcode" 
                                type="text" 
                                class="form-control" 
                                name="zipcode" 
                                v-model="zipcode"
                                value="{{ old('zipcode') }}">

                                @if ($errors->has('zipcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zipcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input readonly="readonly" type="hidden" value="" class="form-control" id="" v-model="lat" name="lat"/>
                        <input readonly="readonly" type="hidden" value="" class="form-control" id="" v-model="lng" name="lng"/>
                        <input readonly="readonly" type="hidden" value="" class="form-control" id="" v-model="state" name="state"/>
                        <input readonly="readonly" type="hidden" value="" class="form-control" id="" v-model="country" name="country"/>

                        <div class="form-group{{ $errors->has('organizer_name') ? ' has-error' : '' }}">
                            <label for="organizer_name" class="col-md-4 control-label">Organizer Name</label>

                            <div class="col-md-6">
                                <input 
                                id="organizer_name" 
                                type="text" 
                                class="form-control" 
                                name="organizer_name" 
                                value="{{ old('organizer_name') }}">

                                @if ($errors->has('organizer_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('organizer_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('organizer_phone_number') ? ' has-error' : '' }}">
                            <label for="organizer_phone_number" class="col-md-4 control-label">Organizer Phone Number</label>

                            <div class="col-md-6">
                                <input 
                                id="organizer_phone_number" 
                                type="text" 
                                class="form-control" 
                                name="organizer_phone_number" 
                                value="{{ old('organizer_phone_number') }}">

                                @if ($errors->has('organizer_phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('organizer_phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
<script src="/js/register.js"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSlEzpoQVs5JupSo1ed2Wc9sLCvCsrppI&callback=initialize"> </script>
@endsection
