<div class="row">
    <div class="col-md-8 col-md-offset-2">
        @if ($errors->any())
            <div class="alert alert-warning alert-dismissible text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                @foreach ($errors->all() as $error)
                    <strong>{{$error}}</strong>.<br>
                @endforeach
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-dismissible text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ session('success') }}
            </div>

        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> {{ session('error') }}
            </div>

        @endif

    </div>
</div>