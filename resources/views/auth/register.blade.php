@extends('layouts.app')

@section('content')
<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->
<div class="container">
   <div class="row">
      <div class="col-md-8 col-md-offset-2">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title"> New User sign up
               </h3>
            </div>
            <div class="panel-body">
               <form class="forcol-md-8 col-md-offset-2m-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                  <div class="row">
                     <div
                        class="col-xs-6 col-sm-6 col-md-6">
                        <div
                           class="form-group">
                           <input type="text" name="first_name"
                              id="first_name"
                              class="form-control input-sm"
                              placeholder="First Name">
	          @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                        </div>
                     </div>
                     <div
                        class="col-xs-6 col-sm-6 col-md-6">
                        <div
                           class="form-group">
                           <input type="text" name="last_name"
                              id="last_name"
                              class="form-control input-sm"
                              placeholder="Last Name">
	          @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                     </div>
                  </div>
                  <div
                     class="form-group">
                     <input type="username"
                        name="username"
                        id="username"
                        class="form-control input-sm"
                        placeholder="Username">
	    @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                  </div>
                  <div
                     class="form-group">
                     <input type="email" name="email"
                        id="email"
                        class="form-control input-sm"
                        placeholder="Email Address">
	    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                  </div>
                  <div
                     class="row">
                     <div
                        class="col-xs-6 col-sm-6 col-md-6">
                        <div
                           class="form-group">
                           <input type="password"
                              name="password"
                              id="password"
                              class="form-control input-sm"
                              placeholder="Password">
	          @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                     </div>
                     <div
                        class="col-xs-6 col-sm-6 col-md-6">
                        <div
                           class="form-group">
                           <input type="password"
                              name="password_confirmation"
                              id="password_confirmation"
                              class="form-control input-sm"
                              placeholder="Confirm Password">
	          @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                        </div>
                     </div>
                     <div
                        class="col-xs-6 col-sm-6 col-md-6">
                        <div
                           class="form-group">
                           <select name="role_id" class='form-control input-sm'
                              id="role_id">
                              <option
                                 value="1">
                                 Admin
                              </option>
                              <option value="2"
                                 selected='selected'>
                                 User
                              </option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <input type="submit" value="Register"
                     class="btn btn-info btn-block">
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
