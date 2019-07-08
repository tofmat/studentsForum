@extends('skeleton')
@section('title', $user->getFullName())
@section('content')
<section class="container main-content">
  <div class="row">
    <div class="col-md-9">
      <div class="row">
        <div class="user-profile">
          <div class="col-md-12">
            <div class="page-content">
              <h2><a href="user_profile.html">Your Profile</a></h2>
              <div class="user-profile-img"><img width="60" height="60" src="../ask-me/images/demo/admin.jpg" alt="admin"></div>
              <br>
              <br>
              <div class="ul_list ul_list-icon-ok about-user">
                <ul>
                  <li><i class="icon-plus"></i>Name : <span>{{$user->getFullName()}}</span></li>
                  <li><i class="icon-plus"></i>Courses : <span>Subscribed Courses (Feel free to remove courses you dont want to engage in)</span>
                    <ul>
                      @foreach ($user->getCourses() as $course)
                        <li>
                          <a href="#">{{$course->code}}</a>
                          <a><i class="icon-minus"></i></a></li>
                      @endforeach
                    </ul>

                </ul>

                <div class="register">
                  <a class="button color small signup">Add More Courses</a>
                </div>

                <p class="form-submit login-submit">
                <center><a href="{{route('user.edit')}}" class="button color small" Value="Edit Profile">Edit Profile</a></center>
                </p>
              </div>
              <div class="clearfix"></div>
            </div><!-- End page-content -->
          </div><!-- End col-md-12 -->
          <div class="col-md-12">
            <div class="page-content page-content-user-profile">
              <div class="user-profile-widget">
                <h2>User Stats</h2>
                <div class="ul_list ul_list-icon-ok">
                  <ul>
                    <li><i class="icon-question-sign"></i>
                      <a href="#">Questions<span> ( <span>{{$user->questions_count}}</span> ) </span></a></li>
                    <li><i class="icon-comment"></i>Answers<span> ( <span>{{$user->answers_count}}</span> ) </span></li>
                    <li><i class="icon-star"></i><a href="user_favorite_questions.html">Favorite Questions<span> ( <span>3</span> ) </span></a></li>
                    <li><i class="icon-asterisk"></i>Approved Answers<span> ( <span>2</span> ) </span></li>
                  </ul>
                </div>
              </div><!-- End user-profile-widget -->
            </div><!-- End page-content -->
          </div>
          <div class="col-md-12">
            <div class="page-content page-content-user-profile">
              <div class="user-profile-widget">
                <h2>User Points:100</h2>

              </div><!-- End user-profile-widget -->
            </div><!-- End page-content -->
          </div><!-- End col-md-12 -->
        </div><!-- End user-profile -->
      </div><!-- End row -->
      <div class="clearfix"></div>
      <div class="page-content">
        <div class="user-stats">
          <div class="user-stats-head">
            <div class="block-stats-1 stats-head">#</div>
            <div class="block-stats-2 stats-head">Today</div>
            <div class="block-stats-3 stats-head">This Week</div>
            <div class="block-stats-4 stats-head">Total</div>
          </div>
          <div class="user-stats-item">
            <div class="block-stats-1">Questions</div>
            <div class="block-stats-2">1</div>
            <div class="block-stats-3">1</div>
            <div class="block-stats-4">{{$user->questions_count}}</div>
          </div>
          <div class="user-stats-item">
            <div class="block-stats-1">Answers</div>
            <div class="block-stats-2">2</div>
            <div class="block-stats-3">1</div>
            <div class="block-stats-4">{{$user->answers_count}}</div>
          </div>
        </div><!-- End user-stats -->
      </div><!-- End page-content -->
    </div><!-- End main -->

    @include('sidebar')
  </div><!-- End row -->
</section><!-- End container -->
@endsection