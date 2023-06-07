<form action="" method="POST" class="needs-validation sell-product" novalidate>
    @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- product stock -->
                <div class="col-md-6 mb-3">
                    <label for="amount-to-sell" class="text-md-end">{{ __('Cantidad a vender:') }}</label>
                    <input id="amount-to-sell" type="number"
                        class="form-control @error('amount-to-sell') is-invalid @enderror" name="amount-to-sell"
                        value="{{ old('amount-to-sell') }}" required autofocus>
                    <div class="invalid-feedback">
                        La cantidad a vender es requerida
                    </div>
                    @error('stock')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="show-error alert alert-danger" role="alert" style>
                    No posees la cantidad suficiente para vender
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary sell-btn">Vender producto</button>
            </div>
        </div>
    </div>
</form>