@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">New Study</div>

            <div class="panel-body">

                <form method="post" action="{{route('study.store')}}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Practise Book </label>
                        <div class="col-md-10">
                            <input class="form-control" required placeholder="Practise Book" name="practise_book" type="text">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Book Details</label>
                        <div class="col-md-10">
                            <input class="form-control" required placeholder="Details ex: Book Number " name="book_details"  type="text">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Test No</label>
                        <div class="col-md-10">
                            <select class="form-control" name="test_no" required>
                                <option>Select Test No</option>
                                <option value="1">Test One</option>
                                <option value="2">Test Two</option>
                                <option value="3">Test Three</option>
                                <option value="4">Test Four</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Part</label>
                        <div class="col-md-10">
                            <select class="form-control" name="part_no" required>
                                <option>Select Part No</option>
                                @foreach($parts as $part)
                                    <option value="{{$part->id}}">{{$part->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Full Marks</label>
                        <div class="col-md-5">
                            <input class="form-control" placeholder="Test Full Marks" name="full_marks" type="text">
                        </div>
                        <label class="col-md-1 col-form-label">Score</label>
                        <div class="col-md-4">
                            <input class="form-control" placeholder="Your Test Score" name="score" type="number">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="section_1">
                            <label class="col-md-2 col-form-label">Section One</label>
                            <div class="col-md-10">
                                <input class="form-control" placeholder="Section Of Part" name="section[]" type="number">
                            </div>
                        </div>
                        <div class="section_2">
                            <label class="col-md-2 col-form-label">Section Two</label>
                            <div class="col-md-10">
                                <input class="form-control" placeholder="Section Of Part" name="section[]" type="number">
                            </div>
                        </div>
                        <div class="section_3">
                            <label class="col-md-2 col-form-label">Section Three</label>
                            <div class="col-md-10">
                                <input class="form-control" placeholder="Section Of Part" name="section[]" type="number">
                            </div>
                        </div>
                        <div class="section_3">
                            <label class="col-md-2 col-form-label">Section Three</label>
                            <div class="col-md-10">
                                <input class="form-control" placeholder="Section Of Part" name="section[]" type="number">
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Completed</label>
                        <div class="col-md-10">
                            <input class="form-control datepicker" required name="completed_at"  type="text">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Comments</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="comments"></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>

        $(function () {
            $(".datepicker").datepicker({
                format: "dd-mm-yyyyy"
            });
        });
    </script>
@endsection


