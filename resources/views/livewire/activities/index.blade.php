<div>


    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{ route('activities.create') }}"
                class="btn btn-success btn-sm mb-2">{{ __('Create Activity') }}</a>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-10">
            {{-- <x-alert-success /> --}}
            <div class="card">

                <div class="card-header">Inventory App </div>

                @include('activities.partials.filter')


                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Product Name') }}</th>
                                <th>{{ __('Quantity') }}</th>
                                <th>{{ __('Status') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($activities as $activity)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $activity->product->name }}</td>
                                    <td>{{ $activity->quantity }}</td>
                                    <td>{{ $activity->status }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">{{ __('Data is empty') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
