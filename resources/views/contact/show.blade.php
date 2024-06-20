@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <table class="table">
                <thead>
                </thead>
                <tbody style="overflow: scroll;background: #f8f8f8;max-height: 350px;">
                        <tr>
                            <td>{{ $contatos->nome }}</td>
                            <td>{{ $contatos->cpf }}</td>
                        </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-8">
            <div id="map" style="height: 500px; width: 100%;"></div>
        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_x04XIFj5euUv0x3TGKsGiLPVkoD4Pxc&libraries=places">
    </script>
    <script>
        function initMap() {
            // Coordenadas dos contatos passadas pelo controlador
            var locations = @json($coordenadas);
            // Cria o mapa e centraliza na primeira localização fornecida
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: new google.maps.LatLng(locations[0].lat, locations[0].lng)
            });

            // Itera sobre as coordenadas e adiciona um marcador para cada uma
            locations.forEach(function(location) {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(location.lat, location.lng),
                    map: map,
                    title: location.title
                });
            });
        }

        window.onload = initMap;
    </script>
@endsection
