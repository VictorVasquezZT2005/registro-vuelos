@csrf

<div class="mb-3">
    <label class="form-label">Código</label>
    <input type="text" name="codigo" value="{{ old('codigo', $vuelo->codigo ?? '') }}" class="form-control @error('codigo') is-invalid @enderror">
    @error('codigo') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Origen</label>
        <input type="text" name="origen" value="{{ old('origen', $vuelo->origen ?? '') }}" class="form-control @error('origen') is-invalid @enderror">
        @error('origen') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Destino</label>
        <input type="text" name="destino" value="{{ old('destino', $vuelo->destino ?? '') }}" class="form-control @error('destino') is-invalid @enderror">
        @error('destino') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Fecha de salida</label>
        <input type="datetime-local" name="fecha_salida" value="{{ old('fecha_salida', isset($vuelo) ? $vuelo->fecha_salida->format('Y-m-d\TH:i') : '') }}" class="form-control @error('fecha_salida') is-invalid @enderror">
        @error('fecha_salida') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Fecha de llegada</label>
        <input type="datetime-local" name="fecha_llegada" value="{{ old('fecha_llegada', isset($vuelo) ? $vuelo->fecha_llegada->format('Y-m-d\TH:i') : '') }}" class="form-control @error('fecha_llegada') is-invalid @enderror">
        @error('fecha_llegada') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Precio ($)</label>
    <input type="number" name="precio" step="0.01" value="{{ old('precio', $vuelo->precio ?? '') }}" class="form-control @error('precio') is-invalid @enderror">
    @error('precio') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<button class="btn btn-primary" type="submit">{{ $buttonText ?? 'Guardar' }}</button>
<a href="{{ route('vuelos.index') }}" class="btn btn-secondary">Cancelar</a>
