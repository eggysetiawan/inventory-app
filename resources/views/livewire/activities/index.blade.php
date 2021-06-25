<div>


    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{ route('activities.create') }}"
                class="btn btn-success btn-sm mb-2">{{ __('Create Activity') }}</a>
            @if ($export)
                <button class="btn btn-info btn-sm mb-2" wire:click="exportExcel">Export excel</button>
            @endif

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
                                <th>{{ __('Action') }}</th>
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
                                    <td>
                                        <x-dropdown>
                                            <a href="{{ route('activities.edit', $activity->id) }}"
                                                class="dropdown-item" title="{{ __('Edit this Activity') }}"><i
                                                    class="fas fa-edit nav-icon"></i>
                                                {{ __('Edit') }}
                                            </a>

                                            <form action="{{ route('activities.destroy', $activity->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')

                                                <button type="submit"
                                                    onclick="return confirm('{{ __('Are you sure you want to delete this resource?') }}')"
                                                    class="dropdown-item"
                                                    title="{{ __('Delete activity from table') }}"><i
                                                        class="far fa-trash-alt nav-icon"></i>
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </x-dropdown>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">{{ __('Data is empty') }}</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>


                    <div class="mt-3">

                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('Total In') }}</th>
                            <th>{{ __('Total Out') }}</th>
                            <th>{{ __('Total (In-Out)') }}</th>
                        </tr>
                    <tbody>
                        <tr>
                            <td>{{ $totalIn }}</td>
                            <td>{{ $totalOut }}</td>
                            <td>{{ $totalIn - $totalOut }}</td>
                        </tr>
                    </tbody>
                    </thead>
                </table>
                <!-- /.card-body -->
            </div>
        </div>
    </div>


</div>
