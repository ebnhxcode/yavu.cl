<html>
<head>
	<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?key=[yourKey]&sensor=false&signed_in=true&libraries=geometry,places"></script>
	<script src="https://google-maps-utility-library-v3.googlecode.com/svn-history/r287/trunk/markerclusterer/src/markerclusterer.js"></script>
	<script src="{{asset('js/maperizer/List.js')}}"></script>
	<script src="{{asset('js/maperizer/Maperizer.js')}}"></script>
	<script src="{{asset('js/maperizer/map-options.js')}}"></script>
	<script src="{{asset('js/maperizer/jqueryui.maperizer.js')}}"></script>
	<script type="text/javascript">var centreGot = false;</script>{!!$map['js']!!}
	</head>
<body>
    {!!$map['html']!!}
</body>
</html>

