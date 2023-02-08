@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($results as $result)
            <div class="col-md-4 mt-4">
                <div class="card">
                    <div class="card-header"><a href="{{ route('show', ['id' => $result->id])  }}" alt="{{ $result->keyword }}" title="{{ $result->keyword }}" >{{ $result->keyword }}</a></div>

                    <div class="card-body">
                        Searched at {{ $result->created_at }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
