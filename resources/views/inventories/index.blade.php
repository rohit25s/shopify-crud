@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
                <h2>Shopify CRUD </h2>

        <form method="GET" action="{{route('inventories.create')}}"><div class="form-row row justify-content-center mb-2">
                        @csrf
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add Inventory') }}
                            </button>
                        </div>
                    </div>
                </form>
                <br />

                <form method="GET" action="{{url('/export')}}"><div class="form-group row justify-content-center mb-2">
                        @csrf
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Export Inventory') }}
                            </button>
                        </div>
                    </div>
                </form>        
                <hr />
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered mb-5">
    <thead>
        <tr class="table-success">
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Cost</th>
            <th>Quantity</th>
            <th>Date Created</th>
            <th width="280px">Action</th>
            </tr>
    </thead>
    <tbody>
        @foreach ($inventories as $inventory)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $inventory->name }}</td>
                <td>{{ $inventory->description }}</td>
                <td>{{ $inventory->cost }}</td>
                <td>{{ $inventory->quantity }}</td>
                <td>{{ date_format($inventory->created_at, 'jS M Y') }}</td>
                <td>
                <a href="{{ route('inventories.show', $inventory->id) }}" title="show"> Show
                            <i class="fas fa-eye text-success  fa-lg"></i>
</a>&nbsp&nbsp
                        <a href="{{ route('inventories.edit', $inventory->id) }}"> Edit
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>
                    <form action="{{ route('inventories.destroy', $inventory->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; text-decoration: underline; background-color:transparent;"> Delete
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>    
    </table>

    {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $inventories->links() !!}
        </div>
        </div>
@endsection     