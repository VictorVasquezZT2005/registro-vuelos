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
    <label class="form-label">Cantidad de Asientos</label>
    <input type="number" name="asientos" value="{{ old('asientos', $reservacion->asientos ?? 1) }}" min="1" class="form-control @error('asientos') is-invalid @enderror">
    @error('asientos') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Números de Asiento</label>
    <input type="text" name="numeros_asiento" value="{{ old('numeros_asiento', (isset($reservacion) && is_array($reservacion->numeros_asiento)) ? implode(', ', $reservacion->numeros_asiento) : ($reservacion->numeros_asiento ?? '')) }}" class="form-control @error('numeros_asiento') is-invalid @enderror">
    <div class="form-text">Separar con comas (ej: 1A, 2B, 3C)</div>
    @error('numeros_asiento') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Método de Pago</label>
        <select name="metodo_pago" class="form-select @error('metodo_pago') is-invalid @enderror">
            <option value="">Seleccione un método</option>
            <option value="tarjeta" {{ old('metodo_pago', $reservacion->metodo_pago ?? '') == 'tarjeta' ? 'selected' : '' }}>Tarjeta</option>
            <option value="paypal" {{ old('metodo_pago', $reservacion->metodo_pago ?? '') == 'paypal' ? 'selected' : '' }}>PayPal</option>
        </select>
        @error('metodo_pago') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Email de PayPal</label>
        <input type="email" name="paypal_email" value="{{ old('paypal_email', $reservacion->paypal_email ?? '') }}" class="form-control @error('paypal_email') is-invalid @enderror" placeholder="Requerido si paga con PayPal">
        @error('paypal_email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

{{-- Botones con margen superior e inferior para separar del footer --}}
<div class="mt-4 mb-5 d-flex gap-2">
    <button class="btn btn-primary" type="submit">{{ $buttonText ?? 'Guardar' }}</button>
    <a href="{{ route('reservaciones.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
