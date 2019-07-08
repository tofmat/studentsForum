@extends('skeleton')
@section('title', $question->title)
@section('content')
  <section class="container main-content">
    <div class="row">
      <div class="col-md-9">
        <article class="question question-type-norm">
          <h2>{{$question->title}}</h2>
          <a class="question-report" href="#">{{$question->course->code}}</a>
          <div class="question-type-main"><i class="icon-check"></i>Solved</div>
          <!-- Vote Shit -->
          <div class="vote-up">
            <div original-title="This answer is useful" class="question-author-vote tooltip-n" value="Increase Value" onClick="increaseValue()"><span></span><div id="increase"></div></div>
          </div>
          <!-- vote value -->
          <div class="number-vote"><input type="number" id="number-vote" value="2" readonly/></div>
          <!-- end of vote value -->
          <!-- vote down -->
          <div class="vote-down">
            <div original-title="This answer is not useful" class="question-author-vote-down tooltip-s" value="Decrease Value" onClick="decreaseValue()"><span></span><div id="decrease"></div></div>
          </div>
          <!-- End vote shit -->
          <div class="question-inner">
            <div class="clearfix"></div>
            <p class="question-desc">{{$question->brief}}</p>

            <span class="question-comment"><a href="#"><i class="icon-share-alt"></i>Share</a></span>

            <span class="question-date"><i class="icon-time"></i>{{\Carbon\Carbon::parse($question->created_at)->diffForHumans()}}</span>
            <span class="question-comment"><a href="#"><i class="icon-comment"></i>
                {{$question->answer_count ." ". \Illuminate\Support\Str::plural('answer', $question->answer_count)}}
              </a>
            </span>

            <div class="clearfix"></div>
          </div>
        </article>

        <div id="commentlist" class="page-content">
          <div class="boxedtitle page-title"><h2>Answers ( <span class="color">{{$question->answer_count}}</span> )</h2></div>
          <ol class="commentlist clearfix">
            @if ($answers && $answers != null)
            @foreach ($answers as $answer)
                <li class="comment">
                  <div class="comment-body comment-body-answered clearfix">
                    <div class="comment-text">
                      <div class="author clearfix">
                        <div class="comment-author"><a href="#">
                            {{$answer->user->getFullName()}}
                          </a></div>
                        <div class="comment-vote">
                          <ul class="question-vote">
                            <li><a href="#" class="question-vote-up" title="Like"></a></li>
                            <li><a href="#" class="question-vote-down" title="Dislike"></a></li>
                          </ul>
                        </div>
                        <span class="question-vote-result">+1</span>
                        <div class="comment-meta">
                          <div class="date"><i class="icon-time"></i>
                            {{\Carbon\Carbon::parse($answer->created_at)->format('F m, Y at H:i:A')}}
                          </div>
                        </div>
                        <a class="comment-reply" href="#"><i class="icon-reply"></i>Reply</a>
                      </div>
                      <div class="text"><p>{{$answer->answer}}</p>
                      </div>
                    </div>
                  </div>
                </li>
            @endforeach
            @endif
          </ol>
        </div>

        <div id="respond" class="comment-respond page-content clearfix">
          <div class="boxedtitle page-title"><h2>Give an answer</h2></div>
          <form action="#" method="post" id="commentform" class="comment-form">

            <div id="respond-textarea">
              <p>
                <label class="required" for="comment">Answer<span>*</span></label>
                <textarea id="comment" name="comment" aria-required="true" cols="58" rows="8"></textarea>
              </p>
            </div>
            <p class="form-submit">
              <input name="submit" type="submit" id="submit" value="Post your answer" class="button small color">
            </p>
          </form>
        </div>
        <div id="related-posts">
          <h2>Related questions</h2>
          <ul class="related-posts">
            <li class="related-item"><h3><a href="#"><i class="icon-double-angle-right"></i>This Is My Second Poll Question</a></h3></li>
            <li class="related-item"><h3><a href="#"><i class="icon-double-angle-right"></i>This is my third Question</a></h3></li>
            <li class="related-item"><h3><a href="#"><i class="icon-double-angle-right"></i>This is my fourth Question</a></h3></li>
            <li class="related-item"><h3><a href="#"><i class="icon-double-angle-right"></i>This is my fifth Question</a></h3></li>
          </ul>
        </div><!-- End related-posts -->


        <div class="post-next-prev clearfix">
          <p class="prev-post">
            <a href="#"><i class="icon-double-angle-left"></i>&nbsp;Prev question</a>
          </p>
          <p class="next-post">
            <a href="#">Next question&nbsp;<i class="icon-double-angle-right"></i></a>
          </p>
        </div><!-- End post-next-prev -->
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