<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($role->name) ? $role->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
    <label for="slug" class="control-label">{{ 'Slug' }}</label>
    <input class="form-control" name="slug" type="text" id="slug" value="{{ isset($role->slug) ? $role->slug : ''}}" required>
    {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ isset($role->description) ? $role->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
    <label for="active" class="control-label">{{ 'Active' }}</label>

    @foreach (json_decode('{"all-access":"Acceso total","no-access":"Ningún acceso","custom":"Personalizado"}', true) as $optionKey => $optionValue)

    <div class="form-check">
        <label class="form-check-label">
            <input class="form-check-input" type="radio" name="special" id="special" value="{{ $optionKey }}"  
            {{ (isset($role->special) && $role->special == $optionKey) ? 'checked' : ''}}
            > {{ $optionValue }}
        </label>
    </div>

    @endforeach   
        
{!! $errors->first('active', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-sm-12">
        <hr>
        <h3>Permisos</h3>
        <div class="form-group">
            <ul class="list-unstyled">
                @foreach($permissions as $permission)
                    <li>
                        <label>
                            {{ Form::checkbox('permissions[]', $permission->id, null) }}
                            {{ $permission->name }}
                            <em>
                                ({{ $permission->description ?: 'Sin descripción' }})
                            </em>
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
