@extends('usuario.template')

@section('titulo', 'CONTAS CADASTRADAS')

@section('conteudo')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Minhas Contas</h3>
            <a href="{{ Route('conta.create') }}" class="btn btn-success" role="button" title="Adicionar Conta">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="block-content">
            <table class="table table-vcenter">
                <thead>
                <tr class="bg-body-dark">
                    <th class="text-center" style="width: 50px;">-</th>
                    <th class="text-center" style="width: 100px;">Conta</th>
                    <th class="text-center" style="width: 100px;">Tipo</th>
                    <th class="text-center" style="width: 100px;">Saldo</th>
                    <th class="text-center" style="width: 100px;">Fechamento</th>
                    <th class="text-center" style="width: 100px;">Vencimento</th>
                    <th class="text-center" style="width: 100px;">Limite Total</th>
                    <th class="text-center" style="width: 100px;">Ações</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($contas as $k => $conta)
                        <tr>
                            <th class="text-center" scope="row">{{ $k+1 }}</th>
                            <td class="fw-semibold text-center">
                                <a href="#">{{$conta->nome_conta}}</a>
                            </td>
                            <th class="text-center">{{ $conta->tipo }}</th>
                            <th class="text-center">R$ {{ $conta->saldo }}</th>
                            <th class="text-center">{{ date_format($conta->dia_fechamento, 'd/m') }}</th>
                            <th class="text-center">{{ date_format($conta->dia_vencimento, 'd/m') }}</th>
                            <th class="text-center">R$ {{ $conta->limite }}</th>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Editar">
                                        <i class="fa fa-pencil-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Remover">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="8" class="text-center"> Ainda não há contas registradas </th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection