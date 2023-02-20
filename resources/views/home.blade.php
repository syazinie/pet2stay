@extends('frontlayout')
@section('content')

	<!-- Slider Section Start -->
	<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
	  <div class="carousel-inner">
	  	@foreach($banners as $index => $banner)
	    <div class="carousel-item @if($index==0) active @endif">
	      <img src="{{asset('storage/app/'.$banner->banner_src)}}" class="d-block w-100" alt="{{$banner->alt_text}}">
	    </div>
	    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h3 class="text-white mb-3 d-none d-sm-block">Malaysians Best Pet Hotel</h3>
                            <h1 class="display-3 text-white mb-3">Pet Hotel & Boarding</h1>
                            <h5 class="text-white mb-3 d-none d-sm-block">Providing a Comfort and Luxury Accommodation and Services to Your Pets</h5>
                            <a href="{{url('booking')}}" class="btn btn-lg btn-primary mt-3 mt-md-4 px-4">Book Now</a>
                            <a href="{{url('page/about-us')}}" class="btn btn-lg btn-secondary mt-3 mt-md-4 px-4">Learn More</a>
                        </div>
                    </div>
	    @endforeach
	  </div>

	  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
	  	<div class="btn btn-primary rounded" style="width: 25%; height: 4.5%;">
	    <span class="carousel-control-prev-icon " aria-hidden="true"></span>
	    <span class="visually-hidden">Previous</span>
		</div>
	  </button>
	  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
	  		<div class="btn btn-primary rounded" style="width: 25%; height: 4.5%;">
	    		<span class="carousel-control-next-icon" aria-hidden="true"></span>
	    		<span class="visually-hidden">Previous</span>
			</div>
	  </button>
	</div>
	<!-- Slider Section End -->

	 <!-- About Start -->
    <div class="container pt-5" id="about">
        <div class="row py-5">
            <div class="col-lg-7 pb-5 pb-lg-0 px-3 px-lg-5">
                <h4 class="text-secondary mb-3">About Us</h4>
                <h1 class="display-4 mb-4"><span class="text-primary">Hotel</span> & <span class="text-secondary">Boarding</span></h1>
                <h5 class="text-muted mb-3">Pet2Stay provides luxurious accommodation facilities for your pets and provides various services that your pets can find. It Locate at Shah Alam, Selangor</h5>
                <p class="mb-4">Petowners can make a reservation and see room availability on pet2stay.com just by pressing the booking button. We hope our customers have a good and great day with your beloved pets</p>
                <ul class="list-inline">
                    <li><h5><i class="fa fa-check-double text-secondary mr-3"></i>Best In Industry</h5></li>
                    <li><h5><i class="fa fa-check-double text-secondary mr-3"></i>Emergency Services</h5></li>
                    <li><h5><i class="fa fa-check-double text-secondary mr-3"></i>24/7 Customer Support</h5></li>
                </ul>
                <a href="" class="btn btn-lg btn-primary mt-3 px-4">Our Room </a>
            </div>
            <div class="col-lg-5">
                <div class="row px-3">
                    <div class="col-12 p-0">
                        <img class="img-fluid w-100" src="{{asset('public/img/carousel-1.jpg')}}" alt="">

                    </div>
                    <div class="col-6 p-0">
                        <img class="img-fluid w-100" src="{{asset('public/img/about-1.jpg')}}" alt="">
                    </div>
                    <div class="col-6 p-0">
                        <img class="img-fluid w-100" src="{{asset('public/img/price-2.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

	<!-- Gallery Section Start -->
	<div class="container-fluid bg-light pt-5 pb-4" id="rooms">
        <div class="container py-5">
            <div class="d-flex flex-column text-center mb-5">
                <h4 class="text-secondary mb-3">Gellery</h4>
                <h1 class="display-4 m-0">Your Pet <span class="text-primary">Rooms</span></h1>
            </div>
		<div class="row my-3">
			@foreach($roomTypes as $rtype)
			<div class="col-md-4">
				<div class="card border-0">
					<div class="card-header position-relative border-0 p-0 mb-4">
						@foreach($rtype->roomtypeimgs as $index => $img)
                        	<a href="{{asset('storage/app/'.$img->img_src)}}" data-lightbox="rgallery{{$rtype->id}}">
                        		@if($index > 0)
                        		<img class= " img-fluid hide card-img-top" src="{{asset('storage/app/'.$img->img_src)}}" />
		            
                        		@else
                        		<img class="img-fluid card-img-top" src="{{asset('storage/app/'.$img->img_src)}}" />
                        		<div class="position-absolute d-flex flex-column align-items-center justify-content-center w-100 h-100" style="top: 0; left: 0; z-index: 1; background: rgba(0, 0, 0, .5);">
		                                <h3 class="text-primary mb-3">{{$rtype->title}}</h3>
		                                <h1 class="display-4 text-white mb-0">
                                    		<small class="align-top" style="font-size: 22px; line-height: 45px;">RM</small>{{$rtype->price}}<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Room</small>
                                		</h1>
		                            </div>
                        		@endif
                        	</a>
                        	
                        @endforeach
					</div>
				</div>
				<div class="card-footer border-0 p-0">
                            <a href="" class="btn btn-primary btn-block p-3" style="border-radius: 0;">Book Now</a>
                        </div>
			</div>

			@endforeach
		</div>
	</div>

</div>

<!-- Gallery Section End -->

<!-- Service Section Start -->
	<div class="container pt-5" id="services">
        <div class="d-flex flex-column text-center mb-5">
            <h4 class="text-secondary mb-3">Pet Services</h4>
            <h1 class="display-4 m-0"><span class="text-primary">Choose</span> Your Services</h1>
        </div>
        <div class="row my-3">
		@foreach($services as $service)
            <div class="col-md-4">
                <div class="card border-0 mb-2">
					<a href="{{url('service/'.$service->id)}}"><img class="card-img-top" src="{{asset('storage/app/'.$service->photo)}}" />
					</a>
						<div class="card-body bg-light p-4">
							<h4 class="card-title text-truncate">{{$service->title}}</h4>
							<p>{{$service->small_desc}}</p>
							<p><a  href="{{url('service/'.$service->id)}}" class="btn btn-primary">Read More</a></p>
						</div>
				</div>
			</div>
		@endforeach
		</div>
	</div>
	<!-- Service Section End -->


<!-- Slider Section Start -->
	<div class="container p-0 pt-5" id="review" >
            <div class="d-flex flex-column text-center mb-5">
                <h4 class="text-secondary mb-3">Customer Review</h4>
                <h1 class="display-4 m-0">Our Client <span class="text-primary">Says</span></h1>
            </div>
	<div id="testimonials" class="carousel slide p-5 bg-secondary text-white border mb-5" data-bs-ride="carousel">
	  <div class="carousel-inner">
	  	@foreach($testimonials as $index => $testi)
	    <div class="carousel-item @if($index==0) active @endif">
	      	<figure class="text-center">
			  <blockquote class="blockquote">
			    <p>{{$testi->testi_cont}}</p>
			  </blockquote>
			  <figcaption class="blockquote-footer text-white">
			    {{$testi->customer->full_name}}
			  </figcaption>
			</figure>
	    </div>
	    @endforeach
	  </div>
	  <button class="carousel-control-prev" type="button" data-bs-target="#testimonials" data-bs-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Previous</span>
	  </button>
	  <button class="carousel-control-next" type="button" data-bs-target="#testimonials" data-bs-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Next</span>
	  </button>

	</div>            

</div>

	<!-- Slider Section End -->

	


<!-- LightBox css -->
<link rel="stylesheet" type="text/css" href="{{asset('public/vendor')}}/lightbox2-2.11.3/dist/css/lightbox.min.css" />
<!-- LightBox Js -->
<script type="text/javascript" src="{{asset('public/vendor')}}/lightbox2-2.11.3/dist/js/lightbox.min.js"></script>
<style type="text/css">
	.hide{
		display: none;
	}
</style>
@endsection
</body>
</html>