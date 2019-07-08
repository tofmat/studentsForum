@extends('skeleton')
@section('title', $question->title)
@section('content')
  <section class="container main-content">
    <div class="row">
      <div class="col-md-9">
        <article class="question question-type-norm">
          <h2>{{$question->title}}</h2>
          <a class="question-report" href="#">{{$question->course->code}}</a>
          <div class="question-type-main"></div>
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

        @if (auth()->user() != null)
        <div id="respond" class="comment-respond page-content clearfix">
          <div class="boxedtitle page-title"><h2>Give an answer</h2></div>
          <form action="{{route('question.answer')}}" method="post" id="commentform" class="comment-form">

            <div id="respond-textarea">
              <p>
                <label class="required" for="comment">Answer<span>*</span></label>
                <textarea id="comment" name="answer" aria-required="true" cols="58" rows="6"></textarea>
              </p>
            </div>
            <input name="question_id" value="{{$question->id}}" type="hidden"/>
            <p class="form-submit">
              <input name="submit" type="submit" id="submit" value="Post your answer" class="button small color">
            </p>
            {{csrf_field()}}
          </form>
        </div>
        @endif
        <div id="related-posts">
          <h2>Similar questions</h2>
          <ul class="related-posts">
            <li class="related-item"><h3><a href="#"><i class="icon-double-angle-right"></i>This Is My Second Poll Question</a></h3></li>
            <li class="related-item"><h3><a href="#"><i class="icon-double-angle-right"></i>This is my third Question</a></h3></li>
            <li class="related-item"><h3><a href="#"><i class="icon-double-angle-right"></i>This is my fourth Question</a></h3></li>
            <li class="related-item"><h3><a href="#"><i class="icon-double-angle-right"></i>This is my fifth Question</a></h3></li>
          </ul>
        </div><!-- End related-posts -->
      </div><!-- End main -->

      @include('sidebar')
    </div><!-- End row -->
  </section><!-- End container -->
@endsection