var platform = new H.service.Platform({
    apikey: 'AIzaSyBC648HzIDTSsl3XcArq2vvWeIPrl4WFWE'
});

var defaultLayers = platform.createDefaultLayers();

var map = new H.Map(
    document.getElementById('map-container'),
    defaultLayers.vector.normal.map,
    {
        center: { lat: 37.7749, lng: -122.4194 },
        zoom: 10,
        pixelRatio: window.devicePixelRatio || 1
    }
);

window.addEventListener('resize', () => map.getViewPort().resize());

var ui = H.ui.UI.createDefault(map, defaultLayers);

var locations = [
    { lat: 37.7749, lng: -122.4194, title: 'San Francisco' },
    { lat: 34.0522, lng: -118.2437, title: 'Los Angeles' },
    { lat: 41.8781, lng: -87.6298, title: 'Chicago' }
];

locations.forEach(function(location) {
    var marker = new H.map.Marker(location);
    map.addObject(marker);

    var ui = new H.ui.InfoBubble(location, {
        content: location.title
    });
    ui.open();
});
