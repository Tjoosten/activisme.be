@layout('layouts/backend')

@section('content')
    <div class="row">
        <div class="col-sm-9"> {{-- Content --}}
            <div class="panel panel-default">
                <div class="panel-body">
                    @if ((int) count($volunteers) === 0)
                        <div class="alert alert-info" role="alert">
                            Er zijn geen vrijwilligers in onze organisatie.
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th>#</th>
										<th>Naam:</th>
                                        <th>Email:</th>
										<th>Regio:</th>
                                        <th>Opties:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($volunteers as $volunteer)
                                        <tr>
                                            <td>#{{ $volunteer['id'] }}</td>
                                            <td>{{ $volunteer['name'] }}</td>
                                            <td><a href="mailto:{{ $volunteer['email'] }}">{{ $volunteer['email'] }}</a></td>
											<td>{{ $volunteer->cities->province->province_name_nl }} | {{ $volunteer->cities->postal_code }} {{ $volunteer->cities->city_name }}</td>

                                            <td> {{-- Options --}}
                                                <a href="#" class="label label-warning">Wijzig</a>
                                                <a href="{{ base_url('volunteer/delete/' . $volunteer->id) }}" class="label label-danger">Verwijder</a>
                                            </td> {{-- /Options --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div> {{-- /Content --}}

        <div class="col-sm-3"> {{-- Sidebar --}}
            <div class="panel panel-default">
                <div class="panel-heading">Menu:</div>

                <div class="list-group">
                    <a href="#" data-toggle="modal" data-target="#new-volunteer" class="list-group-item">Vrijwilliger toevoegen</a>
                </div>
            </div>
        </div> {{-- /Sidebar --}}
    </div>

	{{-- Modal includes --}}
		@include('volunteers/includes/create-volunteer')
	{{-- /Modal includes --}}
@endsection
