<div class="row">
    <div class="input-field col s6">
        {!! Form::text('name', null, ['data-length' => 200, 'id' => 'name']) !!}
        <label for="name">Nombre</label>
    </div>
    <div class="input-field col s6">
        {!! Form::text('professor', null, ['data-length' => 200, 'id' => 'professor']) !!}
        <label for="professor">Profesor</label>
    </div>
</div>
<div class="row">
    <div class="input-field col s6">
        {!! Form::number('cupo', null, ['id' => 'cupo']) !!}
        <label for="cupo">Cupo</label>
    </div>
    <div class="col s6">
        <div class="chips chips-autocomplete"></div>
    </div>
    {!! Form::hidden('disponibility', null, ['id' => 'disponibility']) !!}
</div>
