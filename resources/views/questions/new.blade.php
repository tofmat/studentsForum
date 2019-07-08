@extends('skeleton')
@section('content')
  <section class="container main-content">
    <div class="row">
      <div class="col-md-9">

        <div class="page-content ask-question">
          <div class="boxedtitle page-title"><h2>Ask Question</h2></div>

          <p>Ask your questions here, make sure the question is well written and precised, if it involves calculation please make sure you use th eright fomulaes and symbols</p>

          <div class="form-style form-style-3" id="question-submit">
            <form action="{{route('do-ask')}}" method="post">
              {{csrf_field()}}
              <div class="form-inputs clearfix">

                <p>
                  <label class="required">Course<span>*</span></label>
                  <span class="styled-select">
                    @if (!empty($userCourses))
                      <select name="course_id">
                      @foreach ($userCourses as $course)
                          <option value="{{$course->id}}">{{$course->title}}</option>
                        @endforeach
                      </select>
                    @endif
									</span>
                  <span class="form-description">Please choose the course to easily search for your question .</span>
                </p>
                <p>
                  <label class="required">Question Title<span>*</span></label>
                  <input type="text" name="title" id="question-title">
                  <span class="form-description">Please choose an appropriate title for the question to answer it even easier .</span>
                </p>
                <!--<p>
                  <label>Topic</label>
                  <input type="text" class="input" name="question_tags" id="question_tags" data-seperator=",">
                  <span class="form-description">Please choose  suitable Keywords Ex : <span class="color">question , poll</span> .</span>
                </p>-->
                <!--<label>Attachment</label>
                <div class="fileinputs">
                  <input type="file" class="file">
                  <div class="fakefile">
                    <button type="button" class="button small margin_0">Select file</button>
                    <span><i class="icon-arrow-up"></i>Browse</span>
                  </div>
                </div>-->

              </div>
              <div id="form-textarea">
                <p>
                  <label class="required">Details<span>*</span></label>
                  <textarea id="froala-editor" name="brief">Initialize the Froala WYSIWYG HTML Editor on a textarea.</textarea>									<span class="form-description">Type the description thoroughly and in detail .</span>
                </p>
              </div>
              <p class="form-submit">
                <input type="submit" id="publish-question" value="Publish Your Question" class="button color small submit">
              </p>
            </form>
          </div>
        </div><!-- End page-content -->
      </div><!-- End main -->

      @include('sidebar')
    </div><!-- End row -->
  </section><!-- End container -->
@endsection