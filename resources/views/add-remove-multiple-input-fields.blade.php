<!DOCTYPE html>
<html>

<head>
    <title>
        Laravel 8 - Adicionar / remover múltiplos campos de entrada dinamicamente usando Jquery</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                <h2>Adicionar / remover vários campos de entrada de tarefas dinamicamente usando Jquery no Laravel 8</h2>
            </div>
            <div class="card-body">
                <form action="{{url('add-remove-multiple-input-fields')}}" method="POST">
                    @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                    @endif
                    <table class="table table-bordered" id="dynamicAddRemove">
                        <tr>
                            <th>Titulo</th>
                            <th>Ação</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="moreFields[0][title]" placeholder="Informe o titulo" class="form-control" /></td>
                            <td><button type="button" name="add" id="add-btn" class="btn btn-success">Adicionar mais</button></td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var i = 0;
        $("#add-btn").click(function() {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="moreFields[' + i + '][title]" placeholder="Enter title" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remover</button></td></tr>');
        });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>
</body>

</html>