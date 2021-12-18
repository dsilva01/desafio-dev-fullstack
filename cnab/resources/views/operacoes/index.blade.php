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
    <div class="lista">
        <strong>Transacoes</strong>
        <strong id="loja_selecionada">TODAS AS TRANSAÇÕES</strong>
        <select name="loja" id="loja">
            <option value="">Todos</option>
            @foreach ($lojas as $item)
                <option value="{{ isset($item->id) ? $item->id : '' }}">{{ isset($item->nome) ? $item->nome : '' }}
                </option>
            @endforeach
        </select>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>TIPO</th>
                    <th>DATA</th>
                    <th>VALOR</th>
                    <th>BI</th>
                    <th>CARTÃO</th>
                    <th>HORA</th>
                    <th>DONO</th>
                    <th>LOJA</th>
                </tr>
            </thead>
            <tbody id="tabela">
                @foreach ($transacoes as $item)
                    <tr>
                        <td>{{ $item->tipo }}</td>
                        <td>{{ date('d-m-Y', strtotime($item->data)) }}</td>
                        @if ($item->sinal == '+')
                            <td class="positivo">+{{ number_format($item->valor, 2, ',', '.') }} Kz</td>
                        @else
                            <td class="negativo">-{{ number_format($item->valor, 2, ',', '.') }} Kz</td>
                        @endif
                        <td>{{ $item->bi }}</td>
                        <td>{{ $item->cartao }}</td>
                        <td>{{ date('H:i:s', strtotime($item->hora)) }}</td>
                        <td>{{ $item->dono }}</td>
                        <td>{{ $item->loja }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/moment.js"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('#loja').change(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: '{{ $url }}/api/transacoes',
                    data: {
                        loja_id: jQuery('#loja').val(),
                    },
                    success: function(data) {
                        console.log(data);
                        jQuery('#loja_selecionada').html(data.loja.nome);
                        $("#tabela").html(
                            data.transacoes.map((item) => (
                                `
                            <tr>
                        <td>${item.tipo}</td>
                        <td> ${moment(item.data).format('DD-MM-YYYY')}</td> </td>
                        ${item.sinal == '+' ?
                            `<td class="positivo">+${ new Intl.NumberFormat('pt-PT', { style: 'currency', currency: 'AOA', currencyDisplay: 'narrowSymbol' }).format(item.valor) }</td>`
                        :
                            `<td class="negativo">-${ Intl.NumberFormat('pt-PT', { style: 'currency', currency: 'AOA', currencyDisplay: 'narrowSymbol' }).format(item.valor) }</td>`
                      }
                        <td>${ item.bi }</td>
                        <td>${ item.cartao }</td>
                        
                        <td> ${moment(item.hora, "hmmss").format('HH:mm:ss')}</td> </td>
                        <td>${ item.dono }</td>
                        <td>${ item.loja }</td>
                    </tr>
                            `
                            ))
                            +
                              `
                              ${
                                data.total != "" &&
                                `
                                <tr>
                                <td>Total</td>
                                ${data.total > 0 ? 
                                    `<td colspan="7" class="positivo total">+${ new Intl.NumberFormat('pt-PT', { style: 'currency', currency: 'AOA', currencyDisplay: 'narrowSymbol' }).format(data.total) }</td>`
                                  :
                                  `<td colspan="7" class="negativo total">${ Intl.NumberFormat('pt-PT', { style: 'currency', currency: 'AOA', currencyDisplay: 'narrowSymbol' }).format(data.total) }</td>`
                                }
                                </tr>`
                                
                                }
                              `
                        );
                    }
                });
            });
        });
    </script>
</body>

</html>
