<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Teacher's Room</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="{{ asset('images/icone.png') }}" rel="icon">
        <style>
            html, body {
                background-color: #76323f;
                color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100%;
                margin: 0;
            }

            .full-height {
                height: 100%;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .links > a {
                color: #fff;
                padding: 0 12px;
                font-size: 80%;
                font-weight: 600;
                letter-spacing: 0.085rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            
            @media screen and (max-width: 767px){
				.top-right {
					position: absolute;
					right: 0.5%;
					top: 1.8%;
				}
				
				.title {
					font-size: 355%;
				}
				
				.m-b-md {
					margin-bottom: 2%;
				}
				
				img{
					width: 33.5%;
				}
			}
			
			@media screen and (min-width: 768px){
				.top-right {
					position: absolute;
					right: 0.5%;
					top: 1.8%;
				}
				
				.links > a {
					color: #fff;
					padding: 0 20px;
					font-size: 100%;
					font-weight: 600;
					letter-spacing: .1rem;
					text-decoration: none;
					text-transform: uppercase;
				}
				
				.title {
					font-size: 500%;
				}
				
				.m-b-md {
					margin-bottom: 2%;
				}
				
				img{
					width: 20%;
				}
			}
			
			@media screen and (min-width: 1024px){
				.top-right {
					position: absolute;
					right: 0.5%;
					top: 1.8%;
				}
				
				.links > a {
					color: #fff;
					padding: 0 25px;
					font-size: 100%;
					font-weight: 600;
					letter-spacing: .1rem;
					text-decoration: none;
					text-transform: uppercase;
				}
				
				.title {
					font-size: 500%;
				}
				
				.m-b-md {
					margin-bottom: 2%;
				}
				
				img{
					width: 20%;
				}
			}

			.bem-vindo{
				font-size: 250%;
				justify-content: center;
			}
			.bem-vindo2{
				position: absolute;
  				left: 0;
  				top: 50%;
  				width: 100%;
  				font-size: 250%;
			}

            .scale-in-center {
				-webkit-animation: scale-in-center 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
				animation: scale-in-center 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
			}

			@-webkit-keyframes scale-in-center {
				0% {
					-webkit-transform: scale(0);
							transform: scale(0);
					opacity: 1;
				}
				100% {
					-webkit-transform: scale(1);
							transform: scale(1);
					opacity: 1;
				}
			}
			
			@keyframes scale-in-center {
				0% {
					-webkit-transform: scale(0);
							transform: scale(0);
					opacity: 1;
				}
				100% {
					-webkit-transform: scale(1);
							transform: scale(1);
					opacity: 1;
				}
			}
			
			.tracking-in-expand {
				-webkit-animation: tracking-in-expand 1.5s cubic-bezier(0.215, 0.610, 0.355, 1.000) 0.7s both;
				animation: tracking-in-expand 1.5s cubic-bezier(0.215, 0.610, 0.355, 1.000) 0.7s both;
			}

			@-webkit-keyframes tracking-in-expand {
				0% {
					letter-spacing: -0.5em;
					opacity: 0;
				}
				40% {
					opacity: 0.6;
				}
				100% {
					opacity: 1;
				}
			}
			
			@keyframes tracking-in-expand {
				0% {
					letter-spacing: -0.5em;
					opacity: 0;
				}
				40% {
					opacity: 0.6;
				}
				100% {
					opacity: 1;
				}
			}

			.fade-in {
				-webkit-animation: fade-in 1.2s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
				animation: fade-in 1.2s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
			}

			@-webkit-keyframes fade-in {
				0% {
					opacity: 0;
				}
				100% {
					opacity: 1;
				}
			}
			
			@keyframes fade-in {
				0% {
					opacity: 0;
				}
				100% {
					opacity: 1;
				}
			}
			
			.fade-out {
				-webkit-animation: fade-out 1s ease-out 0.4s both;
				animation: fade-out 1s ease-out 0.4s both;
			}
			
			@-webkit-keyframes fade-out {
				0% {
					opacity: 1;
				}
				100% {
					opacity: 0;
				}
			}
			@keyframes fade-out {
				0% {
					opacity: 1;
				}
				100% {
					opacity: 0;
				}
			}

			.fade-in2 {
				-webkit-animation: fade-in 1.2s cubic-bezier(0.390, 0.575, 0.565, 1.000) 1s both;
				animation: fade-in 1.2s cubic-bezier(0.390, 0.575, 0.565, 1.000) 1s both;
				font-size: 250%;
			}

			@-webkit-keyframes fade-in {
				0% {
					opacity: 0;
				}
				100% {
					opacity: 1;
				}
			}
			@keyframes fade-in {
				0% {
					opacity: 0;
				}
				100% {
					opacity: 1;
				}
			}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
											document.getElementById('logout-form').submit();" id="logout2">
								{{ __('Logout') }}
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Cadastro</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
				@if(session()->get('success'))
					<style>
						.logo {
							display:none;
							visibility: hidden;
						}
	
						.title {
							display:none;
							visibility: hidden;
						}
					</style>
	
					<div class="fade-in fade-out bem-vindo">
						Bem vindo
					</div>
	            	<div class="fade-in2 bem-vindo2">
	            	    {{ session()->get('success') }}
					</div>
            	@endif
                <div>
                	<div class="m-b-md scale-in-center logo">
						<img src="{{asset('images/icone.png')}}">  
					</div>
				
					<div class="title m-b-md tracking-in-expand">
						TEACHER'S ROOM
					</div>
				</div>
            </div>

        </div>
    </body>
</html>
