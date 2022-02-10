@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{ Form::label('name', 'Название') }}
{{ Form::text('name') }}</br></br>
{{ Form::label('price', 'Цена') }}
{{ Form::text('price') }}</br></br>
