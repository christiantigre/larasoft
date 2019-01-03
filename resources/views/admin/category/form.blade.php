<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($category->name) ? $category->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('detall') ? 'has-error' : ''}}">
    <label for="detall" class="control-label">{{ 'Detall' }}</label>
    <input class="form-control" name="detall" type="text" id="detall" value="{{ isset($category->detall) ? $category->detall : ''}}" >
    {!! $errors->first('detall', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
    <label for="active" class="control-label">{{ 'Active' }}</label>
<div class="form-check">
    <label class="form-check-label">
        <input class="form-check-input" type="radio" name="active" id="active" value="1" {{ (isset($category) && 1 == $category->active) ? 'checked' : '' }} > Yes
    </label>
</div>
<div class="form-check">
    <label class="form-check-label">
        <input class="form-check-input" type="radio" name="active" id="active" value="0"  @if (isset($category)) {{ (0 == $category->active) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No
    </label>
</div>
{!! $errors->first('active', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
