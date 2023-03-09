<div>
    <form method="post" action="{{ url('/admin/users/' . $users->id . '/edit') }}">
        @csrf
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Aquí el nombre" wire:model="name"
                    value="{{ old('name', $users->name) }}">
            </div>
            <div class="form-group col-sm-6">
                <label for="price">Apellidos</label>
                <input type="text" class="form-control" id="apell" name="apell" wire:model="apell"
                    placeholder="Apellidos del usuario" value="{{ old('apell', $users->apell) }}">
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="address">Dirección</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Dirección del Usuario"
                value="{{ old('address', $users->address) }}">
        </div>

        <div class="row">
            <div class="form-group col-sm-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    placeholder="Email de autentificación del Usuario" value="{{ old('email', $users->email) }}">
            </div>

            <div class="form-group col-sm-6">
                <label for="admin">Admin</label><br>
                <select id="admin" name="admin">
                    @if (old('admin', $users->admin) === 1)
                        <option selected value="{{ old('admin', $users->admin) }}">Administrador</option>
                        <option value="0">Usuario</option>
                    @elseif (old('admin', $users->admin) === 0)
                        <option selected value="{{ old('admin', $users->admin) }}">Usuario</option>
                        <option value="1">Administrador</option>
                    @endif
                </select>
            </div>
        </div>

        <button class="btn btn-primary">Guardar cambios</button>
        <a href="{{ url('/admin/users') }}" class="btn btn-danger">Cancelar</a>

        @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600">{{ __('Guardado.') }}</p>
        @endif

    </form>
</div>
