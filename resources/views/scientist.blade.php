@extends('master')

@section('title') Tasks List @endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 card-header text-center font-weight-bold">
                <h2>Scientist Contributions!</h2>
            </div>
            <div class="col-md-12 d-flex flex-row-reverse mt-1 mb-1">
                <button type="button" id="add-scientist" class="btn btn-success" data-toggle="modal" data-target="#scientistModal">Add Scientist</button>
            </div>
            <div class="col-md-12 mt-1">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Theories</th>
                        <th>Action</th>
                    </tr>

                    @forelse($scientists as $scientist)
                        <tr>
                            <td>{{ $scientist->getId() }}</td>
                            <td>{{ $scientist->getFirstname() }}</td>
                            <td>{{ $scientist->getLastname() }}</td>
                            <td> 
                                <table class="table table-sm table-borderless">
                                
                                @foreach($scientist->getTheories() as $theory)
                                    <tr>
                                        <td>{{ $theory->getTitle() }}
                                            <button class="btn btn-sm deletebtn float-right delete-theory" data-id="{{ $theory->getId() }}">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                
                                </table>
                                <a href="#" class="mt-2 col-md-12 add-theory" data-toggle="modal" data-target="#theoryModal" data-id="{{ $scientist->getId() }}">Add Theory</a>
                            </td>
                            <td>
                                <button class="btn btn-danger delete-scientist" data-id="{{ $scientist->getId() }}">
                                    <i class="fa fa-trash fa-sm"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No scientist in the list... for now!</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Add Scientist Start-->
    <div class="modal fade" id="scientistModal" tabindex="-1" role="dialog" aria-labelledby="scientistModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scientistModalLabel">Add Scientist</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Firstname</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="firstname" name="firstname" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Lastname</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="lastname" name="lastname" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Theory</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="theory" name="theory" value="" maxlength="50">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="save-scientist" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Add Scientist End-->

    <!-- Modal Add Theory Start-->
    <div class="modal fade" id="theoryModal" tabindex="-1" role="dialog" aria-labelledby="theoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="theoryModalLabel">Add Theory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Theory</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="theory1" name="theory" value="" maxlength="50" required="">
                            <span id="name-span" class="text-danger">
                                <label class="col-form-label-sm" id="name-error"></label>
                            </span>
                        </div>  
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="save-theory" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Add Theory End-->
    
    <script type="text/javascript">
        $(document).ready(function($){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                $("#success-alert").slideUp(500);
            });
        
            $('body').on('click', '.add-theory', function () {
                var id = $(this).data('id');
                var theory = $(this).data('theory');
                
                $.ajax({
                    type:"POST",
                    url: "{{ url('update') }}",
                    data: { id: id },
                    dataType: 'json',
                    success: function(res) {
                        $('#id').val(res.id);
                    }
                });
            });

            $('body').on('click', '.delete-theory', function () {
                if (confirm("Delete Record?") == true) {
                    var id = $(this).data('id');
                
                    $.ajax({
                        type:"POST",
                        url: "{{ url('deleteTheory') }}",
                        data: { id: id },
                        dataType: 'json',
                        success: function(res){
                            window.location.reload();
                        }
                    });
                }
            });

            $('body').on('click', '.delete-scientist', function () {
                if (confirm("Delete Record?") == true) {
                    var id = $(this).data('id');
                
                    $.ajax({
                        type:"POST",
                        url: "{{ url('deleteScientist') }}",
                        data: { id: id },
                        dataType: 'json',
                        success: function(res){
                            window.location.reload();
                        }
                    });
                }
            });

            $('body').on('click', '#save-theory', function (event) {
                var id = $("#id").val();
                var theory = $('#theory1').val();
                
                $.ajax({
                    type:"POST",
                    url: "{{ url('addTheory') }}",
                    data: {
                        id: id,
                        theory: theory
                    },
                    dataType: 'json',
                    success: function(res) {
                        console.log(res);
                        window.location.reload();
                        $("#save-theory").attr("disabled", false);
                    }
                });
            });

            $('body').on('click', '#save-scientist', function (event) {
                var firstname = $('#firstname').val();
                var lastname = $('#lastname').val();
                var theory = $('#theory').val();
                
                $.ajax({
                    type:"POST",
                    url: "{{ url('addScientist') }}",
                    data: {
                        firstname: firstname,
                        lastname: lastname,
                        theory: theory
                    },
                    dataType: 'json',
                    success: function(res) {
                        console.log(res);
                        window.location.reload();
                        $("#save-scientist").attr("disabled", false);
                    }
                });
            });
        });
    </script>
@endsection