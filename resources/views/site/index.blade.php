@extends('skeleton')
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

          <div class="tab-inner-warp">
            <div class="tab-inner">
              @foreach ($questions as $question)
              <article class="question question-type-norm">
                <h2>
                  <a href="{{route('view-question', ['id' => $question->id])}}">
                    {{$question->title}}
                  </a>
                </h2>
                <a class="question-report" href="#">{{$question->course->code}}</a>
                <div class="question-type-main"><i class="icon-check"></i>Pending</div>
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

        </div><!-- End page-content -->
      </div><!-- End main -->

    </div><!-- End row -->
  </section><!-- End container -->

  @endsection