<div class="card-body">
    <div class="d-flex justify-content-end mt-3 mr-3">
        <form>
            <span class="input-group justify-content-lg-end">
                <div class="col-md-5">
                    <label for="from">From</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-success"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" value="{{ $fromDate ?? date('Y-m-d') }}" name="from" id="datemask"
                            class="form-control @error('date') is-invalid @enderror">
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
                        <input type="date" name="to" value="{{ date('Y-m-d') }}" id="datemask"
                            class="form-control @error('date') is-invalid @enderror">
                        <span class="input-group-append">
                            <button type="submit" class="btn bg-success btn-sm">Filter</button>
                        </span>
                    </div>
                </div>
            </span>
        </form>
    </div>
</div>
