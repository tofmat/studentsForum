@extends('skeleton')
@section('title', "Top Questions")
@section('content')
  <section class="container main-content">
    <div class="row">
      <div class="col-md-9">

        <div class="tabs-warp question-tab">
          <ul class="tabs">
            <li class="tab"><a href="#" class="current">Recent Questions</a></li>
            <li class="tab"><a href="#">Most Responses</a></li>
            <li class="tab"><a href="#">Recently Answered</a></li>
          </ul>

          @if ($questions != null)
              <div class="tab-inner-warp">
                <div class="tab-inner">
                  @foreach ($questions as $question)
                  <article class="question question-type-norm">
                    <h2>
                      <a href="single_question_poll.html">{{$question->title}}</a>
                    </h2>
                    <a class="question-report" href="#">{{$question->course->code}}</a>
                    <!-- Vote Shit -->
                    <div class="vote-up">
                      <div original-title="This answer is useful" class="question-author-vote tooltip-n" value="Increase Value" onClick="increaseValue()"><span></span><div id="increase"></div></div>
                    </div>
                    <div class="number-vote"><input type="number" id="number-vote" value="2" readonly/></div>
                    <div class="vote-down">
                      <div original-title="This answer is not useful" class="question-author-vote-down tooltip-s" value="Decrease Value" onClick="decreaseValue()"><span></span><div id="decrease"></div></div>
                    </div>
                    <!-- End vote shit -->
                    <div class="question-inner">
                      <div class="clearfix"></div>
                      <p class="question-desc">
                        {{$question->brief}}
                      </p>


                      <span class="question-date"><i class="icon-time"></i>
                        {{\Carbon\Carbon::parse($question->created_at)->diffForHumans()}}
                      </span>
                      <span class="question-comment"><a href="#"><i class="icon-comment"></i>
                          {{$question->answer_count." ".\Illuminate\Support\Str::plural('answer', $question->answer_count)}}
                        </a>
                      </span>
                      <div class="clearfix"></div>
                    </div>
                  </article>
                  @endforeach
                </div>
              </div>
          @endif
        </div><!-- End page-content -->
      </div><!-- End main -->




      <aside class="col-md-3 sidebar">

        <div class="widget widget_login">
          <h3 class="widget_title">Login</h3>
          <div class="form-style form-style-2">
            <form>
              <div class="form-inputs clearfix">
                <p>
                  <select>
                    <option value="">Choose your Institution</option>
                    <option value="1">Obafemi Awolowo University</option>
                    <option value="1">University Of Ibadan</option>
                    <option value="1">University Of Lagos</option>
                  </select>
                  </span>
                </p>
                <p class="login-text">
                  <input type="text" value="Matric No" onfocus="if (this.value == 'Username') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Username';}">
                  <i class="icon-user"></i>
                </p>
                <p class="login-password">
                  <input type="password" value="Password" onfocus="if (this.value == 'Password') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Password';}">
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
            </form>
            <div class="clearfix"></div>
          </div>
        </div>



        <div class="widget widget_tag_cloud">
          <h3 class="widget_title">Courses</h3>
          <a href="#">MTH101</a>
          <a href="#">CSC201</a>
          <a href="#">PHY101</a>
          <a href="#">CHM109</a>
          <a href="#">PHL201</a>
          <a href="#">CSD201</a>
          <a href="#">CHM109</a>
          <a href="#">PHL201</a>
          <a href="#">CSD201</a>
          <div class="register">
            <a class="button color small signup">View More</a>
          </div>
        </div>

        <div class="panel-pop" id="signup">
          <h2>Register Now<i class="icon-remove"></i></h2>
          <div class="form-style form-style-3">
            <form>
              <div class="form-inputs clearfix">
                <p>
                  <label class="required">Martric No<span>*</span></label>
                  <input type="text">
                </p>
                <p>
                  <label class="required">E-Mail<span>*</span></label>
                  <input type="email">
                </p>
                <p>
                  <label class="required">Password<span>*</span></label>
                  <input type="password" value="">
                </p>
                <p>
                  <label class="required">Confirm Password<span>*</span></label>
                  <input type="password" value="">
                </p>
              </div>
              <p class="form-submit">
                <input type="submit" value="Signup" class="button color small submit">
              </p>
            </form>
          </div>
        </div><!-- End signup -->


        <div class="widget widget_highest_points">
          <h3 class="widget_title">Leaderboard</h3>
          <ul>
            <li>
              <div class="author-img">
                <a href="#"><img width="60" height="60" src="../ask-me/images/demo/admin.jpg" alt=""></a>
              </div>
              <h6><a href="#">admin</a></h6>
              <span class="comment">12 Points</span>
            </li>
            <li>
              <div class="author-img">
                <a href="#"><img width="60" height="60" src="../ask-me/images/demo/avatar.png" alt=""></a>
              </div>
              <h6><a href="#">vbegy</a></h6>
              <span class="comment">10 Points</span>
            </li>
          </ul>
        </div>

      </aside><!-- End sidebar -->
    </div><!-- End row -->
  </section><!-- End container -->

@endsection