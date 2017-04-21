@layout('layouts/backend')

@section('content')
    <div class="row">
        <div class="col-md-9"> {{-- Content tab--}}
            <div class="panel panel-default">
                <div class="panel-body">
                    @if ((int) count($links) === 0)
                        <div class="alert alert-info" role="alert">
                            Er zijn geen links van acties of manifestaties in het systeem.
                        </div>
                    @else
                        <table class="table table-condensed table-hover table-striped"> {{-- Listing table --}}
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Naam:</th>
                                    <th>Type</th>
                                    <th>Datum creatie:</th>
                                    <th>Opties:</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($links as $link)
                                    <tr>
                                        <td><strong>#{{ $link->id }}</strong></td>
                                        <td><a target="_blank" href="{{ $link->link }}">{{ $link->name }}</a></td>
                                        <td>{{ $link->types->name }}</td>
                                        <td>{{ $link->created_at }}</td>

                                        <td> {{-- Options --}}
                                            <a href="#" class="label label-info">Wijzig</a>
                                            <a href="{{ base_url('links/delete/' . $link->id) }}" class="label label-danger">Verwijder</a>
                                        </td> {{-- /Options --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> {{-- /Listing table --}}
                    @endif
                </div>
            </div>
        </div> {{-- /Content tab --}}

        <div class="col-md-3"> {{-- Sidebar tab --}}
            <div class="panel panel-default">
                <div class="panel-heading">Menu:</div>

                <div class="list-group">
                    <a data-toggle="modal" data-target="#myModal" class="list-group-item" href="#">Link toevoegen</a>
                </div>
            </div>
        </div> {{-- /Sidebar tab --}}
    </div>

    {{-- Modal includes --}}
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Maak een nieuwe manifestatie of actie.</h4>
                    </div>

                    <div class="modal-body">
                        <form class="form-horizontal" id="link" action="{{ base_url('links/insert') }}" method="post">
                            {{-- TODO: Implement CSRF token --}}

                            <div class="form-group">
                                <label for="type" class="col-md-3 control-label">
                                    Type: <span class="text-danger">*</span>
                                </label>

                                <div class="col-md-9">
                                    <select class="form-control" name="type_id">
                                        <option value="">-- Selecteer het type van de link --</option>

                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}"> {{ $type->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="naam" class="col-md-3 control-label">
                                    Naam: <span class="text-danger">*</span>
                                </label>

                                <div class="col-md-9">
                                    <input type="text" name="name" placeholder="De naam voor de link" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="link" class="col-md-3 control-label">
                                    Link: <span class="text-danger">*</span>
                                </label>

                                <div class="col-md-9">
                                    <input type="text" name="link" placeholder="Link naar actie of organisatie" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" form="link" class="btn btn-success">Invoegen</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    {{-- /Modal includes --}}
@endsection
