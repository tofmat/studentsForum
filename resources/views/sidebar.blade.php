<aside class="col-md-3 sidebar">

  @if(auth()->user() == null)
  <div class="widget widget_login">
    <h3 class="widget_title">Login</h3>
    <div class="form-style form-style-2">
      <form action="{{route('login')}}" method="post">
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
            <input type="text" name="reg_no" placeholder="Matric No">
            <i class="icon-user"></i>
          </p>
          <p class="login-password">
            <input type="password" placeholder="Password" name="password">
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
  @endif
  <div class="widget widget_tag_cloud">
    <h3 class="widget_title">Courses</h3>
    @if (!$topCourses)
    @foreach ($topCourses as $course)
        <a href="#">{{$course->title}}</a>
    @endforeach
    @endif
    <div class="register">
      <a class="button color small signup">View More</a>
    </div>
  </div>

  <div class="widget widget_highest_points">
    <h3 class="widget_title">Leaderboard</h3>
    <ul>
      <li>
        <div class="author-img">
          <a href="#"><img width="60" height="60" src="../ask-me/images/demo/admin.jpg" alt=""></a>
        </div>
        <h6><a href="#">Essien-nta Emmanuel</a></h6>
        <span class="comment">19 Points</span>
      </li>
      <li>
        <div class="author-img">
          <a href="#"><img width="60" height="60" src="../ask-me/images/demo/avatar.png" alt=""></a>
        </div>
        <h6><a href="#">Ayobami Kolawole</a></h6>
        <span class="comment">12 Points</span>
      </li>
    </ul>
  </div>

</aside><!-- End sidebar -->