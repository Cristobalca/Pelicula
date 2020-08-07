<div class="form-group {{ $errors->has('Portada') ? 'has-error' : ''}}">
    <label for="Portada" class="control-label">{{ 'Portada' }}</label>
    <input class="form-control" name="Portada" type="file" id="Portada" value="{{ isset($pelicula->Portada) ? $pelicula->Portada : ''}}" >
    {!! $errors->first('Portada', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Titulo') ? 'has-error' : ''}}">
    <label for="Titulo" class="control-label">{{ 'Titulo' }}</label>
    <input class="form-control" name="Titulo" type="text" id="Titulo" value="{{ isset($pelicula->Titulo) ? $pelicula->Titulo : ''}}" >
    {!! $errors->first('Titulo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Descripcion') ? 'has-error' : ''}}">
    <label for="Descripcion" class="control-label">{{ 'Descripcion' }}</label>
    <input class="form-control" name="Descripcion" type="text" id="Descripcion" value="{{ isset($pelicula->Descripcion) ? $pelicula->Descripcion : ''}}" >
    {!! $errors->first('Descripcion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Link') ? 'has-error' : ''}}">
    <label for="Link" class="control-label">{{ 'Link' }}</label>
    <input class="form-control" name="Link" type="text" id="Link" value="{{ isset($pelicula->Link) ? $pelicula->Link : ''}}" >
    {!! $errors->first('Link', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
