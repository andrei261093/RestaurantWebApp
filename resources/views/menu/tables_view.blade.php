@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h2>Tables</h2>

                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <a data-zones="{{$zones}}" type="button" class="btn btn-default pull-left" id="add-table-btn">Add
                            table</a>

                    </div>
                </div>

                <br>

                @foreach($tables->chunk(3) as $tableChunk)
                    <div class="row">
                        <div class="col-sm-12">
                            @foreach($tableChunk as $table)
                                <div class="col-sm-4">
                                    <div class="thumbnail">
                                        <img src="https://vitakfarmfresh.co.za/wp-content/uploads/2017/06/image-9.jpg" alt="...">
                                        <div class="caption">
                                            <h3>Table no: {{$table->tableNo}}</h3>
                                            <p>Table zone: {{$table->zone}}</p>
                                            <p>
                                                <a data-table="{{$table}}" data-zones="{{$zones}}" class="btn btn-primary edit-table-button" role="button">Edit</a>
                                                <a onclick="getConfirmation('{{Route('getTableDelete', $table->id)}}');" class="btn btn-danger delete-table-button pull-right" role="button">Delete</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <div class="modal fade" id="table-edit-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Table</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Table no:</label>
                        <input class="form-control" type="number" id="modal-table-number" name="name"/>
                    </div>

                    <div class="form-group">
                        <label for="name">Pin</label>
                        <input class="form-control" type="number" id="modal-table-password" name="password"
                        />
                    </div>

                    <div>
                        <label for="category">Zone</label>
                        <select class="pull-right" id="modal-zone-select" name="zone">

                        </select>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="modal-tables-save-btn" class="btn btn-primary">Save changes</button>
                    <button type="button" id="modal-tables-hide-btn" class="btn btn-secondary">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="table-add-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Table</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Table no:</label>
                        <input class="form-control" type="number" id="modal-add-table-number" name="name"/>
                    </div>

                    <div class="form-group">
                        <label for="name">Pin</label>
                        <input class="form-control" type="number" id="modal-add-table-password" name="password"
                        />
                    </div>

                    <div>
                        <label for="category">Zone</label>
                        <select class="pull-right" id="modal-add-table-zone-select" name="zone">
                        </select>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="modal-add-tables-save-btn" class="btn btn-primary">Add Table</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getConfirmation(url) {
            if (window.confirm('Sigur vrei sa stergi?')) {
                window.location = url
            }
            else {
            }
        }
    </script>
@endsection
