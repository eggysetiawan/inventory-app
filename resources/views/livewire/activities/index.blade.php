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


                @include('activities.partials.filter')




                <div class="card-header">
                    <h3 class="card-title">Inventory App</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search"
                                wire:model.debounce.500ms="query" autocomplete="off">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 500px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Product Name') }}</th>
                                <th>{{ __('Quantity') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Activity Date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($activities as $activity)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $activity->product->name }}</td>
                                    <td>{{ $activity->quantity }}</td>
                                    <td>{{ $activity->status }}</td>
                                    <td>{{ $activity->created_at }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">{{ __('Data is empty') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <footer>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>{{ $totalQuantity }}</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </footer>
                        </tfoot>
                    </table>
                    <div class="mt-3">
                        {{-- @if (@$activities->hasMorePages())
                            <button class="btn btn-success btn-block" wire:click.prevent="loadMore">
                                {{ __('Load more..') }}
                            </button>
                        @endif --}}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>


</div>
