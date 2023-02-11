@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @if(count($results) > 0)
        @foreach ($results as $result)
            <div class="col-md-4 mt-4">
                <div class="card">
                    <div class="card-header">
                    <a href="{{ route('show', ['id' => $result->id])  }}" alt="{{ $result->keyword }}" title="{{ $result->keyword }}" >{{ $result->keyword }}</a></div>

                    <div class="card-body">
                        Searched at {{ $result->created_at }}
                        <br />
                        <a class="btn btn-danger" href="#"
                                       onclick="event.preventDefault();
                                       document.getElementById('delete-form-{{$result->id}}').submit();">
                                        {{ __('Delete') }}
                                    </a>
                                    <form id="delete-form-{{$result->id}}" action="{{ route('destroy', ['id' => $result->id]) }}" method="POST" class="d-none">
                                        <input type="hidden" name="_method" value="DELETE" />
                                        @csrf
                                    </form>
                    </div>
                </div>
            </div>
        @endforeach
    @else 
    <div class="col-md-4 mt-4">
        <div class="card">
            <div class="card-header">
            No search found,  <a href="{{ route('create')  }}" alt="Create Search" title="Create Search" >Create Search</a></div>
            </div>
        </div>
    </div>
    @endif
    </div>
</div>
@endsection
