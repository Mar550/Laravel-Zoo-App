@extends('layouts.nav')

@section('contenu')

<section id="features" class="features">
			<div class="container">
				<div class="row">
				
					<div class="sec-title text-center mb50 wow bounceInDown animated" data-wow-duration="500ms">
						<h2>SPECIFIC FEATURES</h2>
						<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
					</div>

					<!-- service item -->
					<div class="col-md-4 wow fadeInLeft" data-wow-duration="500ms">
						<div class="service-item">
							<div class="service-icon">
                                <i class="fa fa-paw" aria-hidden="true"></i>
							</div>
							
							<div class="service-desc">
								<h3>Animals</h3>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore</p>
							</div>
						</div>
					</div>
					<!-- end service item -->
					
					<!-- service item -->
					<div class="col-md-4 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="500ms">
						<div class="service-item">
							<div class="service-icon">
                                <i class="fa fa-users" aria-hidden="true"></i>
							</div>
							
							<div class="service-desc">
								<h3>Families</h3>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore</p>
							</div>
						</div>
					</div>
					<!-- end service item -->
					
					<!-- service item -->
					<div class="col-md-4 wow fadeInRight" data-wow-duration="500ms"  data-wow-delay="900ms">
						<div class="service-item">
							<div class="service-icon">
                                <i class="fa fa-globe" aria-hidden="true"></i>
                            </div>
							
							<div class="service-desc">
								<h3>Continents</h3>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore</p>
							</div>
						</div>
					</div>
					<!-- end service item -->
						
				</div>
			</div>
		</section>

        <section>

        <div class="containercards">

        <div class="card" style="width: 28rem;">
        <h5 class="card-title">PUMA </h5>
        <hr>
        <img src="img/puma.png" class="animalpic" alt="">  
        <div class="card-body">
                <br>
                <p class="description"> Description: Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <br>
                <p class="card-text">Continents: Some quick example text </p>
                <br>
                <p class="card-text">Families: Some quick example text</p>

                <div class="edit-del">
                <a href="#" class="btn btn-primary" id="edit"> EDIT</a>
                <a href="#" class="btn btn-primary" id="delete"> DELETE</a>
                </div>
        </div>
        </div>

        

        </div>
        </section>

@endsection
