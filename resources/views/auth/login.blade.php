@extends('skeleton')
@section('content')
  <section class="container main-content">
    <div class="login">
      <div class="row">
        <div class="col-md-12">
          <div class="page-content">
            <h2>Login</h2>
            <div class="form-style form-style-3">
              <form method="post" action="{{route('do-login')}}">
                <div class="form-inputs clearfix">
                  <p>
                    <select>
                      <option value="">Choose your Institution</option>
                      <option value="1">Obafemi Awolowo University</option>
                      <option value="1">University Of Ibadan</option>
                      <option value="1">University Of Lagos</option>
                    </select>
                  </p>
                  <p class="login-text">
                    <input type="text" placeholder="Matric No" name="reg_no">
                    <i class="icon-user"></i>
                  </p>
                  <p class="login-password">
                    <input type="password" name="password" placeholder="Password">
                    <i class="icon-lock"></i>
                    <a href="#">Forget</a>
                  </p>
                </div>
                <p class="form-submit login-submit">
                  <input type="submit" value="Log in" class="button color small login-submit submit">
                </p>
                <div class="rememberme">
                  <label><input type="checkbox" checked="checked"> Remember Me</label>
                </div>
                {{csrf_field()}}
              </form>
            </div>
          </div><!-- End page-content -->
        </div>
      </div><!-- End row -->
    </div><!-- End login -->
  </section><!-- End container -->
@endsection