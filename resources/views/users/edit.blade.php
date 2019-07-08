@extends('skeleton')
@section('title', "Edit Profile")
@section('content')
  <section class="container main-content">
  <div class="row">
    <div class="col-md-9">
      <div class="page-content">
        <div class="boxedtitle page-title"><h2>Edit Profile</h2></div>

        <div class="form-style form-style-4">
          <form>
            <div class="form-inputs clearfix">
              <p>
                <label>Surname</label>
                <input type="text" placeholder="First Name" value="{{$user->surname}}" readonly>
              </p>
              <p>
                <label>Other Names</label>
                <input type="text" placeholder="Last Name" value="{{$user->other_names}}" readonly>
              </p>
              <p>
                <label class="required">Matric No<span>*</span></label>
                <input type="email" placeholder="Matric No" value="{{$user->reg_no}}" readonly>
              </p>
            </div>
            <div class="form-style form-style-2">
              <div class="user-profile-img"><img src="../ask-me/images/demo/admin.jpg" alt="admin"></div>
              <p class="user-profile-p">
                <label>Profile Picture</label>
              <div class="fileinputs">
                <input type="file" class="file">
                <div class="fakefile">
                  <button type="button" class="button small margin_0">Select file</button>
                  <span><i class="icon-arrow-up"></i>Browse</span>
                </div>
              </div>
              <p></p>
              <div class="clearfix"></div>

            </div>

            <div class="ul_list ul_list-icon-ok about-user">
              <ul>
                <li><label>Courses: <span>List of Courses (Feel free to remove courses you dont want to engage in)</span></label>
                  <ul class="row">
                  @foreach ($user->getCourses() as $course)
                      <li class="col-md-3 col-sm-6">
                        <a href="#">{{$course->code}}</a>
                        <a><i class="icon-minus"></i></a>
                      </li>
                    @endforeach
                  </ul>
              </ul>

              <div class="register">
                <a class="button color small signup">Add More Courses</a>
              </div>

              <p class="form-submit login-submit">
                <input type="submit" value="Update Profile" class="button color small login-submit submit">
              </p>
            </div>

            <p class="form-submit">
              <input type="submit" value="Update" class="button color small login-submit submit">
            </p>
          </form>
        </div>
      </div><!-- End page-content -->
    </div><!-- End main -->
    @include('sidebar')
  </div><!-- End row -->
</section><!-- End container -->
@endsection