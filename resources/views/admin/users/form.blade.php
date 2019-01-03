<div class="row mB-40">
	<div class="col-sm-8">
		<div class="bgc-white p-20 bd">
			{!! Form::myInput('text', 'name', 'Username') !!}
		
				{!! Form::myInput('email', 'email', 'Email') !!}
		
				{!! Form::myInput('password', 'password', 'Password') !!}
		
				{!! Form::myInput('password', 'password_confirmation', 'Password again') !!}
		
				{!! Form::mySelect('role', 'Role', config('variables.role'), null, ['class' => 'form-control select2']) !!}
		
				{!! Form::myFile('avatar', 'Avatar') !!}
		
				{!! Form::myTextArea('bio', 'Bio') !!}
		</div>  
	</div>	
	<div class="col-sm-4">
		<div class="bgc-white p-40 bd">
		<h3>Roles</h3>
		<hr>
			<div class="form-group">
			<ul class="list-unstyled">
				@foreach($roles as $rol)
					<li>
						<label>
							{{ Form::checkbox('roles[]', $rol->id, null) }}
							{{ $rol->name }}
							<em>
								({{ $rol->description ?: 'Sin descripción' }})
							</em>
						</label>
					</li>
				@endforeach
			</ul>
			</div>
		</div>
	</div>
</div>
	
