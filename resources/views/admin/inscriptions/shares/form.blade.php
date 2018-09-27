<div class="row">
    <div class="input-field col s6">
        {!! Form::text('title', null, ['data-length' => 200, 'id' => 'title']) !!}
        <label for="title">Título</label>
    </div>
    <div class="input-field col s12">
        {!! Form::textarea('description', null, ['class' => 'materialize-textarea']) !!}
        <label for="textarea1">Descripción</label>
    </div>
</div>
<div class="row">
    <div class="col s6">
        <label>Edad mínima</label>
        <span id="min-age-span" class="new badge" data-badge-caption=""></span>
        <p class="range-field">
            {!! Form::range('min_age', isset($inscription) ? $inscription->min_age : 1 , ['id' => 'min-age-input', 'min' => 1, 'max' => 100]) !!}
        </p>
    </div>
    <div class="col s6">
        <label>Edad máxima</label>
        <span id="max-age-span" class="new badge" data-badge-caption=""></span>
        <p class="range-field">
            {!! Form::range('max_age', isset($inscription) ? $inscription->max_age : 100 , ['id' => 'max-age-input', 'min' => 1, 'max' => 100]) !!}
        </p>
    </div>
</div>
<div class="row">
    <div class="col s6">
        <label>Maximo de inscripciones por alumno:</label>
        {!! Form::number('max_subscriptions', null) !!}
    </div>
</div>
<div class="row">
    <div class="col s12">
        <label>Disponibilidad:</label>
        <div class="chips chips-autocomplete"></div>
    </div>
    {!! Form::hidden('disponibility', null, ['id' => 'disponibility']) !!}
</div>