<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Gracias por Registrarte! Antes de empezar, debes verificar tu dirección de email clicando en la dirección en el link que te hemos enviado. Si no has recibido el email, te enviaremos otro.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Un nuevo enlave de verificación ha sido enviado a ti durante el proceso de registro.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Reenviar Verificación de Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Salir') }}
            </button>
        </form>
    </div>
</x-guest-layout>
