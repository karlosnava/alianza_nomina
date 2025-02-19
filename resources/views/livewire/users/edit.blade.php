<div>
    <form wire:submit.prevent="submit" method="POST" enctype="multipart/form-data">
        @csrf

        @include('livewire.users.form')

        <div class="text-right">
            <button type="submit" class="bg-green-500 text-white font-semibold rounded-md px-5 py-2 hover:bg-green-600"><i class="fas fa-refresh"></i> Actualizar</button>
        </div>
    </form>
</div>
