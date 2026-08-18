@extends('layouts.app')

@section('titulo', 'Painel de Gestão — Centro de Formação')

@section('conteudo')
  @include('paginas.dashboard')
  @include('paginas.cursos')
  @include('paginas.turmas')
  @include('paginas.docentes')
  @include('paginas.inscricoes')
  @include('paginas.alunos')
  @include('paginas.financas')
  @include('paginas.relatorios')
@endsection
