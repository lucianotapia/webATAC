Teste

@section('content')    
    @forelse($colegiados as $colegiado)
        @include('colegiado.partials.fields') 
        Passou
        <br/>
    @empty
        <h3>Não há reuniões cadastradas!</h3>
    @endforelse    
@endsection