@extends('layouts.master')
@section('leaflet')
    <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        .leaflet-container {
            height: 100%;
            width: 100%;
            max-width: 100%;
            max-height: 100%;
        }
    </style>
@endsection
@section('title', 'Peta Lahan')
@section('content')

    <div id='map'></div>

    <script>
        const lahan = L.layerGroup();

        const mJanuar = L.marker([-7.461633, 112.675943]).bindPopup(
            '<table><tr><th>Code Mitra</th><th>:</th><th>MT001KL010TP002</th></tr><tr><th>Mitra Tani</th><th>:</th><th>Januar</th></tr><tr><th>Lokasi</th><th>:</th><th>-7.461633, 112.675943</th></tr><tr><th>Luas Lahan</th><th>:</th><th>250 M<sup>2</th></tr></table>'
        ).addTo(lahan);

        const crownHill = L.marker([-7.467769, 112.678113]).bindPopup(
            '<table><tr><th>Code Mitra</th><th>:</th><th>MT002KL010TP002</th></tr><tr><th>Mitra Tani</th><th>:</th><th>Kosim</th></tr><tr><th>Lokasi</th><th>:</th><th>-7.467769, 112.678113</th></tr><tr><th>Luas Lahan</th><th>:</th><th>250 M<sup>2</th></tr></table>'
        ).addTo(lahan);
        const rubyHill = L.marker([-7.464385, 112.669923]).bindPopup(
            '<table><tr><th>Code Mitra</th><th>:</th><th>MT003KL010TP002</th></tr><tr><th>Mitra Tani</th><th>:</th><th>Rohman</th></tr><tr><th>Lokasi</th><th>:</th><th>-7.464385, 112.669923</th></tr><tr><th>Luas Lahan</th><th>:</th><th>250 M<sup>2</th></tr></table>'
        ).addTo(lahan);


        const mbAttr =
            'Lunas Agro &copy; <a href="#">J-Dev Map</a>';
        const mbUrl =
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiamFudWFyMjIiLCJhIjoiY2xma25hbGhwMGNrdzN4cDdranBpanN1NCJ9.YYRJNJy27KxzbQ2ITE7CZA';

        const streets = L.tileLayer(mbUrl, {
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            attribution: mbAttr
        });

        const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 50,
            attribution: 'Lunas Agro &copy; <a href="#">J-Dev Map</a>'
        });

        const map = L.map('map', {
            center: [-7.461633, 112.675943],
            zoom: 12,
            layers: [osm, lahan]
        });

        const baseLayers = {
            'OpenStreetMap': osm,
            'Streets': streets
        };

        const overlays = {
            'Lahan': lahan
        };

        const layerControl = L.control.layers(baseLayers, overlays).addTo(map);
        // const crownHill = L.marker([-7.467769, 112.678113]).bindPopup(
        //     '<table><tr><th>Code Mitra</th><th>:</th><th>MT002KL010TP002</th></tr><tr><th>Mitra Tani</th><th>:</th><th>Kosim</th></tr><tr><th>Lokasi</th><th>:</th><th>-7.467769, 112.678113</th></tr><tr><th>Luas Lahan</th><th>:</th><th>250 M<sup>2</th></tr></table>'
        // );
        // const rubyHill = L.marker([-7.464385, 112.669923]).bindPopup(
        //     '<table><tr><th>Code Mitra</th><th>:</th><th>MT003KL010TP002</th></tr><tr><th>Mitra Tani</th><th>:</th><th>Rohman</th></tr><tr><th>Lokasi</th><th>:</th><th>-7.464385, 112.669923</th></tr><tr><th>Luas Lahan</th><th>:</th><th>250 M<sup>2</th></tr></table>'
        // );

        // const lahan2 = L.layerGroup([crownHill, rubyHill]);

        const satellite = L.tileLayer(mbUrl, {
            id: 'mapbox/satellite-v9',
            tileSize: 512,
            zoomOffset: -1,
            attribution: mbAttr
        });
        layerControl.addBaseLayer(satellite, 'Satellite');
        // layerControl.addOverlay(lahan2, 'Lahan 2');
    </script>
@endsection
