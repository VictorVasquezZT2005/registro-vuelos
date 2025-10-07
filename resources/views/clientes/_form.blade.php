@csrf

<div class="mb-3">
    <label class="form-label">Nombre</label>
    <input name="nombre" value="{{ old('nombre', $cliente->nombre ?? '') }}" class="form-control @error('nombre') is-invalid @enderror">
    @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Correo</label>
    <input name="correo" value="{{ old('correo', $cliente->correo ?? '') }}" class="form-control @error('correo') is-invalid @enderror">
    @error('correo') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Teléfono</label>
    <input name="telefono" value="{{ old('telefono', $cliente->telefono ?? '') }}" class="form-control @error('telefono') is-invalid @enderror">
    @error('telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<button class="btn btn-primary" type="submit">{{ $buttonText ?? 'Guardar' }}</button>
<a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
