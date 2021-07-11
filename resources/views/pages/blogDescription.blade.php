@extends('layouts.app')
@section('content')

{{--------------Start CSS ---------------------}}
<style>
#homeBlog {
    position: relative;
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    min-height: 500px;
  }

#homeBlog .primary-overlay {
    background: rgba(87, 87, 87, 0.5);
    min-height: 500px;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>
{{--------------End CSS ---------------------}}



<section id="homeBlog" class="text-left" style="background-image:url({{ asset($post->post_image) }});">
    <div class="primary-overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-12" style="margin-top:390px; color:white">
            @if(session()->get('lang') == 'bangla')
                <span class="badge badge-danger mb-2 p-2" style="font-size: 12px;">{{$post->category_name_bn}}</span>
                <h3 class=" font-weight-bolder " style="font-size: 28px;">{{$post->post_title_bn}}</h3>
            @else
                <span class="badge badge-danger mb-2 p-2" style="font-size: 12px;">{{$post->category_name_en}}</span>
                <h3 class=" font-weight-bolder " style="font-size: 28px;">{{$post->post_title_en}}</h3>
            @endif
          </div>
        </div>
      </div>
    </div>
</section>

<section class="m-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="blog_text">
                    @if(session()->get('lang') == 'bangla')
                        {!! $post->details_bn !!}
                    @else
                        {!! $post->details_en !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</section> <hr>


@endsection
