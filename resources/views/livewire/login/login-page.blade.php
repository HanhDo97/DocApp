<div class="">
    <div class="h-100 d-flex align-items-center justify-content-center mt-5">
        <h1>LOGIN</h1>
    </div>

    <div class="mt-3">
        <div class="text-center">
            <form wire:submit.prevent="checkLogin" class="d-inline-block text-left mx-auto col-8 col-md-6 col-lg-4" action="">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input wire:model.lazy="email" wire:dirty.class="is-dirty" type="email" class="form-control" id="email">
                    @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input wire:model.lazy="password" wire:dirty.class="is-dirty" type="password" class="form-control" id="password">
                    @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="text-right">
                    <div class="form-check">
                        <input wire:model.lazy="rememberMe" wire:dirty.class="is-dirty" type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>

    </div>
</div>