@extends('layouts.app')

@section('content')


<div class="container" style="margin:15px;">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Video</div>
        
            <div class="card-body">
                    
                <form action="/scenario" method="POST">
                
                    @csrf

                    <input type="text" name="name" class="form-control" >

                    <input type="submit" value="submit" name="submit">

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
