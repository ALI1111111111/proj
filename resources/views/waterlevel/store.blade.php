@include('dashboard.Header')

<div style="width:40%" class="container">

    <form method="GET" action="{{ URL::to('/water/store')}}" >

        {{-- @csrf --}}

    <div class="form-group">
        <label for="exampleInputPassword1">distance</label>
        <input name="distance" type="text" class="form-control" id="exampleInputPassword1" placeholder="distance">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

