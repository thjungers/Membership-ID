<x-facing-layout>
    <div class="text-center" x-data="{ loading: false }">
        <form action="" method="POST" x-on:submit="loading = true" x-show="!loading">
            @csrf
            <div>
                <input type="password" name="pin" autofocus required
                    class="form-control mx-auto @error('pin') is-invalid @enderror"
                    style="width: 3em; font-size: 36px; height: 42px; text-align: center" />
            </div>
            @error('pin')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <input type="submit" class="btn btn-primary mt-3" value="Afficher" />
        </form>
        <div x-show="loading" class="spinner-border text-primary">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</x-facing-layout>
