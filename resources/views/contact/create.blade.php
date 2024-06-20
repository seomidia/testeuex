@extends('layout.app')
@section('content')
    <h1 class="h2">Criar contato</h1>
    @if (session('success'))
    <div class="alert alert-success" role="alert">
    {{ session('success') }}
    </div>
@endif

@if (session('errors'))
    <div class="alert alert-danger" role="alert">
    {{ session('errors') }}
    </div>
@endif

    <form action="{{route('admin.contact.store')}}" method="post" class="m-3">
        @csrf
        <div class="row">
            <div class="form-group col-md-10">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-10">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-10">
                <label for="Telefone">Telefone</label>
                <input type="text" class="form-control" id="Telefone" name="telefone">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-10">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-10">
                <label for="endcepereco">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" onchange="buscarenEndereco(this.value)">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-10">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-10">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-10">
                <input type="hidden" id="lat" name="lat">
                <input type="hidden" id="long" name="long">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_x04XIFj5euUv0x3TGKsGiLPVkoD4Pxc&libraries=places">
    </script>
    <script>
        function initAutocomplete() {
            // Cria o objeto autocomplete e liga ao campo de entrada
            const input = document.getElementById('endereco');
            const autocomplete = new google.maps.places.Autocomplete(input);

            // Opcional: Limita os resultados a um país específico
            autocomplete.setComponentRestrictions({
                'country': ['BR']
            });

            // Define os campos de detalhes que queremos (geometry para obter latitude e longitude)
            autocomplete.setFields(['geometry', 'formatted_address', 'address_components']);

            // Define o campo de detalhes para exibir o endereço completo
            autocomplete.addListener('place_changed', function() {
                const place = autocomplete.getPlace();

                if (!place.geometry) {
                    console.log('No details available for input: ' + input.value);
                    return;
                }

                // Obtendo latitude e longitude
                const latitude = place.geometry.location.lat();
                const longitude = place.geometry.location.lng();
                const cep = place.address_components[place.address_components.length - 1].long_name;

                jQuery('#lat').val(latitude);
                jQuery('#long').val(longitude);
                jQuery('#cep').val(cep).trigger('change');
            });
        }
        // Inicializa o autocomplete quando a página carrega
        window.onload = initAutocomplete;

        function buscarenEndereco(cep) {
            fetch('{{ route('admin.contact.viacepApi',['cep']) }}'.replace('cep',cep), {
                    method: 'GET'
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    document.getElementById('cidade').value=(data.contact.viacep.localidade);
                    document.getElementById('estado').value=(data.contact.viacep.uf);
                })
                .catch(error => {
                    console.error('Erro:', error);
                });
        }
    </script>
@endsection
