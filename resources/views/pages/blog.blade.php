@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/blog_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/blog_responsive.css') }}">

<div class="home">
	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('public/frontend/images/shop_background.jpg') }}"></div>
	<div class="home_overlay"></div>
	<div class="home_content d-flex flex-column align-items-center justify-content-center">
		<h2 class="home_title">
            @if(session()->get('lang') == 'bangla')
                ইকমার্স ব্লগ
            @else
            Ecommerce Blog
            @endif
        </h2>
	</div>
</div>

<!-- Blog -->

<div class="blog">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="blog_posts d-flex flex-row align-items-start justify-content-between">

					@foreach($post as $row)
					<!-- Blog post -->
					<div class="blog_post">
						<div class="blog_image" style="background-image:url({{ asset($row->post_image) }})"></div>
						<div class="blog_text">
                                @if(session()->get('lang') == 'bangla')
                                    {{ $row->post_title_bn }}
                                @else
                                    {{ $row->post_title_en }}
                                @endif
						</div>
						<div class="blog_button"><a href="#">
							 @if(session()->get('lang') == 'bangla')
						    	বিস্তারিত পড়ুন...
							@else
						        Continue Reading...
						    @endif
					</a></div>
					</div>
                    @endforeach

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
