<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js" > <!--<![endif]-->
    <head>
    	<!-- meta charec set -->
        <meta charset="utf-8">
		<!-- Always force latest IE rendering engine or request Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<!-- Page Title -->
        <title>ZooSpace</title>		
		<!-- Meta Description -->
        <meta name="description" content="Blue One Page Creative HTML5 Template">
        <meta name="keywords" content="one page, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
		<!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Google Font -->
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

		<!-- CSS
		================================================== -->
		<!-- Fontawesome Icon font -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Twitter Bootstrap css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- jquery.fancybox  -->
        <link rel="stylesheet" href="css/jquery.fancybox.css">
		<!-- animate -->
        <link rel="stylesheet" href="css/animate.css">
		<!-- Main Stylesheet -->
        <link rel="stylesheet" href="css/main.css">
		<!-- media-queries -->
        <link rel="stylesheet" href="css/media-queries.css">
		<!-- Over Stylesheet -->
        <link rel="stylesheet" href="css/over.css">

		<!-- Modernizer Script for old Browsers -->
        <script src="js/modernizr-2.6.2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </head>
	
    <body id="body">

        <!-- 
        Fixed Navigation
        ==================================== -->
        <header id="navigation" class="navbar-fixed-top navbar">
            <div class="container" style="flex-wrap: nowrap;">
                <div class="navbar-header">
                    <!-- responsive nav button -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-bars fa-2x"></i>
                    </button>
					<!-- /responsive nav button -->
					
					<!-- logo -->
                    <a class="navbar-brand" href="#body">
						<h1 id="logo">
							<img src="img/logo2.png" width=27% alt="Brandi">
						</h1>
					</a>
					<!-- /logo -->
                </div>

				<!-- main nav -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <ul id="nav" class="nav navbar-nav" style="display: flex; flex-direction: row; gap: 5px; margin-left: 35%; font-size: 16px;">
                        <li class="current"><a href="#body">Home</a></li>
                        <li><a href="#features">Animals</a></li>
                        <li><a href="#works">Families</a></li>
                        <li><a href="#team">Continents</a></li>
                        <li><a href="http://google.com">Contact</a></li>
                    </ul>
                </nav>
				<!-- /main nav -->
				
            </div>
        </header>
        
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

        @forelse($animals as $animal)

        <div class="card" style="width: 32rem;">
        <h5 class="card-title"> {{ $animal->id }} {{ $animal->name_animal }} </h5>
        <hr>
        <img src= "{{ Storage::url($animal->image) }}" class="animalpic" >  
        <div class="card-bod">
                <br>
                <p class="description"> {{ $animal->description }} </p>
                <br>
                <p class="card-text"> Family: {{ $animal->libelle }} </p>
                <br>
                <p class="card-text"> Continents:
                @foreach($animal->continents as $cont)
                 {{ $cont->continent_name}} 
                @endforeach
                </p>
                <div class="edit-del">
                <a href="#" class="btn btn-primary" id="edit"> EDIT </a>
                <form method="POST" action="{{ route('delete', $animal->id) }}" > 
                        @method('DELETE')
                        @csrf       
                <button type="submit" class="btn btn-primary" id="delete"> DELETE </button>
                </form>
                </div>
        </div>
        </div>
        @empty
                <tr>
                        No Animal created yet
                </tr>
        @endforelse
        </div>

        </section>
        {{ $animals->links() }}

    </body>
</html>


