<div class="card-body">
    <div class="d-flex justify-content-end mt-3 mr-3">

        <form>
            <span class="input-group justify-content-lg-end">
                <div class="col-md-6">
                    <label for="from">From</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-success"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="datetime-local" name="from" id="datemask"
                            class="form-control @error('from') is-invalid @enderror" wire:model.debounce.500ms="from">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-start">
                        <label for="to">To</label>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-success"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="datetime-local" name="to" id="datemask"
                            class="form-control @error('to') is-invalid @enderror" wire:model.debounce.500ms="to">
                        <span class="input-group-append">
                            <button type="button" class="btn bg-success btn-sm"
                                wire:click.prevent="filterActivities">Filter</button>
                        </span>
                    </div>
                </div>
            </span>
        </form>
    </div>
</div>
