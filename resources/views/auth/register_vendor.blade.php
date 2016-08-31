@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                Register User<a style="float:right" href="{{url('/register/user')}}">Oops I Want To Register As A Farmers Market</a>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" id="register">
                        {{ csrf_field() }}

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

                        <div class="form-group{{ $errors->has('vendor_name') ? ' has-error' : '' }}">
                            <label for="vendor_name" class="col-md-4 control-label">Vendor Name</label>

                            <div class="col-md-6">
                                <input id="vendor_name" type="text" class="form-control" name="vendor_name" value="{{ old('vendor_name') }}">

                                @if ($errors->has('vendor_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vendor_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('vendor_owner_name') ? ' has-error' : '' }}">
                            <label for="vendor_owner_name" class="col-md-4 control-label">Vendor Owner Name</label>

                            <div class="col-md-6">
                                <input id="vendor_owner_name" type="text" class="form-control" name="vendor_owner_name" value="{{ old('vendor_owner_name') }}">

                                @if ($errors->has('vendor_owner_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vendor_owner_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('vendor_owner_phone') ? ' has-error' : '' }}">
                            <label for="vendor_owner_phone" class="col-md-4 control-label">Vendor Owner Phone</label>

                            <div class="col-md-6">
                                <input id="vendor_owner_phone" type="text" class="form-control" name="vendor_owner_phone" value="{{ old('vendor_owner_phone') }}">

                                @if ($errors->has('vendor_owner_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vendor_owner_phone') }}</strong>
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
                        <input 
                        readonly ="readonly"
                        id="type_account" 
                        type="hidden" 
                        class="form-control" 
                        name="type_account" 
                        v-model="type_account"
                        value="3">

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
@endsection