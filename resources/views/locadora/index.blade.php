<!DOCTYPE html>
<html lang="pt-br">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="_token" content="{{csrf_token()}}" />

    <title>Locadora</title>
    <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <style>
        h1 { font-family: Lato }
    </style>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Filmes disponíveis</h1>

        <ul class="list-group">
            @foreach($dvdsListados as $key=>$val)
            <li class="list-group-item id_dvd" data-id="{{$val->id_dvd}}">
                <h5>{{$val->titulo}}</h5>
                <p>Ano: {{$val->ano}}</p>
                <p>{{$val->sinopse}}</p>
            </li>
            @endforeach
        </ul>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Legendas Diponíveis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="lista">

                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(function() {

            'use strict'

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });


            $(document).ready(function() {

                $(".id_dvd").click(function(e) {
                    e.preventDefault();
                    console.log("Consultando dvd id: " + $(this).data("id"));
                    $('.lista').empty();

                    $.ajax({
                        type: 'POST',
                        url: '/locadora/listar',
                        data: {
                            id_dvd: $(this).data("id")
                        },
                        success: function(data) {
                            if (data.success) {
                                var lista = "";
                                console.log(data.legenda);

                                $.each(data.legenda, function(key, item) {
                                    $.each(item, function(a, b) {
                                        $(".lista").append("<li>" + b + "</li>");
                                    });

                                });

                                $('#exampleModalCenter').modal('show'); 

                            }
                        },
                        error: function() {
                            alert('Erro no Ajax !');
                        }
                    });

                });
            });

        });
    </script>
</body>

</html>