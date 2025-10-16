@csrf

<div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="form-control @error('name') is-invalid @enderror" required>
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Correo Electrónico</label>
    <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="form-control @error('email') is-invalid @enderror" required>
    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Rol</label>
    <select name="rol" class="form-select @error('rol') is-invalid @enderror" required>
        <option value="">Seleccione un rol</option>
        @foreach($roles as $role)
            <option value="{{ $role->name }}" 
                {{ (old('rol') == $role->name) || (isset($userRole) && $userRole == $role->name) || (old('rol', $user->rol ?? '') == $role->name) ? 'selected' : '' }}>
                {{ $role->name }}
            </option>
        @endforeach
    </select>
    @error('rol') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
        @if(isset($user))
            <div class="form-text">Dejar en blanco para no cambiar la contraseña.</div>
        @endif
        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>
</div>


<button class="btn btn-primary" type="submit">{{ $buttonText ?? 'Guardar' }}</button>
<a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>