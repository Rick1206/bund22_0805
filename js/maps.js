define(function(require){
    var map;
    var directionDisplay;
    var directionsService;
    var stepDisplay;
    var markerArray = [];

    var eleStart = document.getElementById("start"),
        eleEnd = document.getElementById("end"),
        eleExcg = document.getElementById("excg"),
        sbmit = document.getElementById("startTo"),
        hidet = document.getElementById("travelMode");;
    var start,end,travelMode = google.maps.TravelMode.DRIVING;
    eleExcg.onclick = exchg;
    sbmit.onclick =  calcRoute;
    Mode();
    initialize();
    //载入运行
    function initialize() {
        // Instantiate a directions service.
        directionsService = new google.maps.DirectionsService();

        // Create a map and center it on Manhattan.
        var manhattan = new google.maps.LatLng(31.2309377, 121.4940573);
        var myOptions = {
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: manhattan
        }
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

        // Create a renderer for directions and bind it to the map.
        var rendererOptions = {
            map: map
        }
        directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions)

        // Instantiate an info window to hold step text.
        stepDisplay = new google.maps.InfoWindow();
    };
    //交换地址
    function exchg(){
        start = eleStart.value;
        end = eleEnd.value;
        eleStart.value = end;
        eleEnd.value = start;
    }
    //travelMode
    function Mode(){
        var jsPatternA = document.getElementById("jsPattern").getElementsByTagName("a");

        document.getElementById("p1").onclick = function(){
            hidet.value = "google.maps.TravelMode.DRIVING";
            travelsbm();
            for(var i=0;i<jsPatternA.length;i++){
                removeClass(jsPatternA[i],"on");
            }
            addClass(this,"on");
        }
        document.getElementById("p2").onclick = function(){
            hidet.value = "google.maps.TravelMode.WALKING";
            travelsbm();
            for(var i=0;i<jsPatternA.length;i++){
                removeClass(jsPatternA[i],"on");
            }
            addClass(this,"on");
        }
        document.getElementById("p3").onclick = function(){
            hidet.value = "google.maps.TravelMode.BICYCLING";
            travelsbm();
            for(var i=0;i<jsPatternA.length;i++){
                removeClass(jsPatternA[i],"on");
            }
            addClass(this,"on");
        }
    }
    function travelsbm(){
        if(start!=""&&end!=""){
            calcRoute();
        }
    }
    function addClass(obj,cls){
        obj.className += " " + cls;
    }
     function removeClass(obj,cls){
        var reg = new RegExp('(\\s|^)' + cls + '(\\s|$)');
        obj.className = obj.className.replace(reg, '');
    }
    //提交路线
    function calcRoute() {

        // First, clear out any existing markerArray
        // from previous calculations.
        for (i = 0; i < markerArray.length; i++) {
            markerArray[i].setMap(null);
        }

        // Retrieve the start and end locations and create
        // a DirectionsRequest using WALKING directions.

        start = eleStart.value;
        end = eleEnd.value;
        travelMode = hidet.value == ""?travelMode : eval(hidet.value);

        var request = {
            origin: start,
            destination: end,
            travelMode:travelMode
        };

        // Route the directions and pass the response to a
        // function to create markers for each step.
        directionsService.route(request, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
//                var warnings = document.getElementById("warnings_panel");
//                warnings.innerHTML = "" + response.routes[0].warnings + "";
                directionsDisplay.setDirections(response);
                showSteps(response);
            }
        });
    }

    function showSteps(directionResult) {
        // For each step, place a marker, and add the text to the marker's
        // info window. Also attach the marker to an array so we
        // can keep track of it and remove it when calculating new
        // routes.
        var myRoute = directionResult.routes[0].legs[0];

        for (var i = 0; i < myRoute.steps.length; i++) {
            var marker = new google.maps.Marker({
                position: myRoute.steps[i].start_point,
                map: map
            });
            attachInstructionText(marker, myRoute.steps[i].instructions);
            markerArray[i] = marker;
        }
    }

    function attachInstructionText(marker, text) {
        google.maps.event.addListener(marker, 'click', function() {
            stepDisplay.setContent(text);
            stepDisplay.open(map, marker);
        });
    }
});