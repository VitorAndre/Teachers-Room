<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
	
		<title>Teacher's Room</title>
	
		<!-- Scripts -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
		<script src="{{ asset('js/app.js') }}" defer></script>
		<script src="{{ asset('js/video.js') }}" defer></script>
		<script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
		<!-- Editor de Texto -->
		<script>
			var editor_config = {
				path_absolute: "/",
				selector: "textarea.my-editor",
				plugins: [
					"advlist autolink lists link image charmap print preview hr anchor pagebreak",
					"searchreplace wordcount visualblocks visualchars code fullscreen",
					"insertdatetime media nonbreaking save table contextmenu directionality",
					"emoticons template paste textcolor colorpicker textpattern"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist
				numlist outdent indent | link image media ",
				relative_urls: false,
				file_browser_callback: function(field_name, url, type, win) {
					var x = window.innerWidth || document.documentElement.clientWidth ||
						document.getElementsByTagName('body')[0].clientWidth;
					var y = window.innerHeight || document.documentElement.clientHeight ||
						document.getElementsByTagName('body')[0].clientHeight;
					var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
					if (type == 'image') {
						cmsURL = cmsURL + "&type=Images";
					} else {
						cmsURL = cmsURL + "&type=Files";
					}
					tinyMCE.activeEditor.windowManager.open({
						file: cmsURL,
						title: 'Filemanager',
						width: x * 0.8,
						height: y * 0.8,
						resizable: "yes",
						close_previous: "no"
					});
				}
			};
			tinymce.init(editor_config);
		</script>
		<!-- Tela de Carregamento -->
		<script>
			$(window).load(function() {
				$(".se-pre-con").fadeOut("slow");;
			});
		</script>
		@stack('script')
	
		<!-- Fonts -->
		<link rel="dns-prefetch" href="//fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
	
		<!-- Styles -->
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
		@yield('style')
	</head>
	<div class="se-pre-con"></div>
	<body>
		<div id="app">
			<nav class="navbar navbar-expand bg-nav">
				<div class="container">
	                <div class="collapse navbar-collapse" id="navbarSupportedContent">
	                    <ul class="nav navbar-nav">
							<li><a href="{{ url('/home') }}"><img id="img1" src="{{asset('images/icon.png')}}"></a></li>
							<li><a class="font-color font-navbar" href="{{ url('/home') }}">Teacher's Room</a></li>
						</ul>
						
						<ul class="nav navbar-nav nav-tabs">
							<li class="nav-item">
								<a class="font-color nav-link @stack('page')" id='buscar' onclick="mudaFoco('buscar')" href="{{ url('/home') }}">Buscar</a>
							</li>
							<li class="nav-item">
								<a class="font-color nav-link @stack('page_cadastrar')" id='cadastrar' onclick="mudaFoco('cadastrar')" href="{{ route('metodologia.create') }}">Cadastrar</a>
							</li>
						</ul>
						<ul class="nav navbar-nav">
							@guest
	                            <li class="nav-item">
	                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
	                            </li>
	                            @if (Route::has('register'))
	                                <li class="nav-item">
	                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Cadastre-se') }}</a>
	                                </li>
	                            @endif
	                        @else
	                            <li class="nav-item dropdown">
	                                <a id="navbarDropdown" class="font-navbar2 font-color nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	                                    {{ Auth::user()->nome }} <span class="caret"></span>
	                                </a>
	
	                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
										@if(Auth::user()->is_admin == 1)
											<a class="dropdown-item" href="{{ route('requisicao_metodologia.index') }}">Requisições de metodologia</a>
											<a class="dropdown-item" href="{{ route('requisicao_usuarios.index') }}">Requisições de usuários</a>
											<a class="dropdown-item" href="{{ route('novo_admin.index') }}">Definir Novos Administradores</a>
										@endif
	                                    <a class="dropdown-item" href="{{ route('logout') }}"
	                                       onclick="event.preventDefault();
	                                                     document.getElementById('logout-form').submit();">
	                                        {{ __('Logout') }}
	                                    </a>
	
	                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                                        @csrf
	                                    </form>
	                                </div>
	                            </li>
	                        @endguest
						</ul>
					</div>
	            </div>
	        </nav>
			<main class="py-4">
				@yield('content')
			</main>
		</div>
	</body>
</html>
