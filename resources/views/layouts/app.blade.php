<!doctype html>
<html lang="en">
<head>
	@include('layouts.head')
</head>
<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		@include('layouts.nav')
		<!-- END NAVBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
                            @include('layouts.header')

                            @yield('content')

					</div>
					<!-- END OVERVIEW -->
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		@include('layouts.footer')
	</div>
	<!-- END WRAPPER -->
	@include('layouts.footer-scripts')
</body>
</html>
