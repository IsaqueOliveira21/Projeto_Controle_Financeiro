@extends('usuario.template')

@section('titulo', 'MOVIMENTAÇÕES FINANCEIRAS')

@section('conteudo')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Pagamentos Recorrentes</h3>
            <a href="{{ Route('movimentacoes.create') }}" class="btn btn-success" role="button" title="Adicionar Movimentação">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="block-content">
            <table class="table table-vcenter">
                <thead>
                <tr class="bg-body-dark">
                    <th class="text-center">-</th>
                    <th class="text-center">Conta</th>
                    <th class="text-center">Descrição</th>
                    <th class="text-center">Tipo</th>
                    <th class="text-center">Pagamento</th>
                    <th class="text-center">Valor</th>
                </tr>
                </thead>
                <tbody>
                @forelse($movimentacoes as $k => $movimentacao)
                    <tr>
                        <th class="text-center" scope="row">{{ $k+1 }}</th>
                        <th class="text-center">{{ $movimentacao->conta->nome_conta }}</th>
                        <td class="text-center">{{ $movimentacao->descricao }}</td>
                        <th class="d-none d-sm-table-cell text-center">
                            <span class="badge bg-{{ $movimentacao->tipo === 'ENTRADA' ? 'success' : 'danger' }}">{{ $movimentacao->tipo }}</span>
                        </th>
                        <th class="text-center">{{ $movimentacao->forma_pagamento }}</th>
                        <th class="text-center">R$ {{ $movimentacao->valor_total }}</th>
                    </tr>
                @empty
                    <tr>
                        <th colspan="8" class="text-center"> Ainda não há movimentações registradas </th>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
