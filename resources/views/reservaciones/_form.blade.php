@csrf

<div class="mb-3">
    <label class="form-label">Cliente</label>
    <select name="cliente_id" class="form-select @error('cliente_id') is-invalid @enderror">
        <option value="">Seleccione un cliente</option>
        @foreach($clientes as $c)
            <option value="{{ $c->id }}" {{ old('cliente_id', $reservacion->cliente_id ?? '') == $c->id ? 'selected' : '' }}>
                {{ $c->nombre }}
            </option>
        @endforeach
    </select>
    @error('cliente_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Vuelo</label>
    <select name="vuelo_id" class="form-select @error('vuelo_id') is-invalid @enderror">
        <option value="">Seleccione un vuelo</option>
        @foreach($vuelos as $v)
            <option value="{{ $v->id }}" {{ old('vuelo_id', $reservacion->vuelo_id ?? '') == $v->id ? 'selected' : '' }}>
                {{ $v->codigo }} | {{ $v->origen }} → {{ $v->destino }}
            </option>
        @endforeach
    </select>
    @error('vuelo_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Fecha de reserva</label>
    <input type="datetime-local" name="fecha_reserva" value="{{ old('fecha_reserva', isset($reservacion) ? $reservacion->fecha_reserva->format('Y-m-d\TH:i') : '') }}" class="form-control @error('fecha_reserva') is-invalid @enderror">
    @error('fecha_reserva') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Asientos</label>
    <input type="number" name="asientos" value="{{ old('asientos', $reservacion->asientos ?? 1) }}" min="1" class="form-control @error('asientos') is-invalid @enderror">
    @error('asientos') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<button class="btn btn-primary" type="submit">{{ $buttonText ?? 'Guardar' }}</button>
<a href="{{ route('reservaciones.index') }}" class="btn btn-secondary">Cancelar</a>
