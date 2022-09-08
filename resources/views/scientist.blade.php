@extends('master')

@section('title') Scientist Contribution @endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 card-header text-center font-weight-bold">
                <h2>Scientist Contributions!</h2>
            </div>
            <div class="col-md-12 d-flex flex-row-reverse mt-1 mb-1">
                <button type="button" id="add-scientist" class="btn btn-success add-scientist" data-toggle="modal" data-target="#scientistModal">Add Scientist</button>
            </div>
            <div class="col-md-12 mt-1">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Theories</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($scientists as $scientist)
                        <tr>
                            <td>{{ $scientist->getId() }}</td>
                            <td>{{ $scientist->getFirstname() }}</td>
                            <td>{{ $scientist->getLastname() }}</td>
                            <td> 
                                <table class="table table-sm table-borderless">
                                
                                @foreach($scientist->getTheories() as $theory)
                                    <tr>
                                        <td>
                                            <a href="#" class="mt-2 col-md-12 text-secondary edit-theory" data-toggle="modal" data-target="#theoryModal" data-id="{{ $theory->getId() }}">{{ $theory->getTitle() }}</a>
                                            <button class="btn btn-sm deletebtn float-right delete-theory" data-id="{{ $theory->getId() }}">
                                                <span class="badge badge-grey"><i class="fas fa-close"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                
                                </table>
                                <a href="#" id="add-theory" class="mt-2 col-md-12 add-theory" data-toggle="modal" data-target="#theoryModal" data-id="{{ $scientist->getId() }}">Add Theory</a>
                            </td>
                            <td class="align-middle">
                                <button class="btn btn-success edit-scientist" data-toggle="modal" data-target="#scientistModal" data-id="{{ $scientist->getId() }}">
                                    <i class="fa fa-pen fa-sm"></i>
                                </button>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Add Scientist Start-->
    <div class="modal fade" id="scientistModal" tabindex="-1" role="dialog" aria-labelledby="scientistModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
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
                    <div id="theory-form" class="form-group theory-form">
                        <label for="name" class="col-sm-2 control-label">Theory</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="theory" name="theory" value="" maxlength="50">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="save-scientist" class="btn btn-primary">Save</button>
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
                    <input type="hidden" name="action" id="action">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Theory</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control theory" id="theory1" name="theory" value="" maxlength="50" required="">
                        </div>  
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="save-theory" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Add Theory End-->

    <script type="text/javascript" src="js/scientist/save.js"></script>
    <script type="text/javascript" src="js/scientist/edit.js"></script>
    <script type="text/javascript" src="js/scientist/create.js"></script>
    <script type="text/javascript" src="js/scientist/delete.js"></script>

    <script type="text/javascript" src="js/theory/save.js"></script>
    <script type="text/javascript" src="js/theory/edit.js"></script>
    <script type="text/javascript" src="js/theory/create.js"></script>
    <script type="text/javascript" src="js/theory/delete.js"></script>

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
        });
    </script>
@endsection