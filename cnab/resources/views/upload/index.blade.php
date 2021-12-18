<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Upload de CNAB</title>
</head>
<body>
  <div class="menu">
    <ul class="elementos">
      <li class="elemento">
        <a href="{{ route('cnab.cadastrar') }}"><strong>Cadastrar</strong></a>
      </li>
      <li class="elemento">
        <a href="{{ route('transacoes.listar') }}"><strong>Listar</strong></a>
      </li>
    </ul>
  </div>
  <div class="formulario">
    <strong >Cadastrar CNAB</strong>
    <form action="{{ route('cnab.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="file" name="ficheiro" id="ficheiro" class="inputfile" required/>
      <label id="ff" for="ficheiro"><strong>Selecione um ficheiro</strong></label>
      <button>Salvar</button>
    </form>
  </div>

  <script>
    var input = document.getElementById('ficheiro');
	var label	 = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener( 'change', function( e )
	{
    console.log(e);
		var fileName = '';
		if( this.files ){
			fileName = 'Selecionado';

    }
		if( fileName )
			label.innerHTML = fileName;
		else
			label.innerHTML = labelVal;
	});
  </script>
</body>
</html>