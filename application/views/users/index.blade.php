@layout('layouts/backend')

@section('content')
	<div class="row row-padding">
		<div class="col-sm-12"> {{-- Menu --}}
			<span class="pull-left">
				<form class="form-inline" action="{{ base_url('users/search') }}" method="GET">
					<input placeholder="Naam of gebruikersnaam" class="form-control" type="text" name="term">
					<button type="submit" class="btn btn-danger">Zoek</button>
				</form>
			</span>

			<span class="pull-right">
				<a href="#" data-toggle="modal" data-target="#new-user" class="btn btn-default">Nieuwe gebruiker</a>
			</span>
		</div> {{-- Menu --}}
	</div>

    <div class="row">
		<div class="col-md-12"> {{-- Main content --}}
			<div class="panel panel-default">
				<div class="panel-body"> {{-- Data --}}
					@if ((int) count($users) === 0)
						<div class="alert alert-info" role="alert">
							<p @if (strpos(current_url(), 'search') !== false) style="margin-bottom: 10px;" @endif>
								Er zijn geen gebruikers gevonden in het systeem.
							</p>

							@if (strpos(current_url(), 'search') !== false)
								<p>
									<a href="{{ base_url('users/index') }}" class="btn btn-sm btn-info">Ga terug</a>
								</p>
							@endif
						</div>
					@else
						<div class="table-responsive">
							<table class="table table-hover table-condensed table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Status:</th>
										<th>Naam:</th>
										<th>Gebruikersnaam:</th>
										<th>Email:</th>
										<th>Opties:</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($users as $user)
										<tr>
											<td>#{{ $user->id }}</td>

											<td> {{-- status --}}
												@if ((string) $user->blocked === 'N')
													<span class="label label-success">Actief</span>
												@elseif ((string) $user->blocked === 'Y')
													<span class="label label-danger">Geblokkeerd</span>
												@endif
											</td> {{-- /status --}}

											<td>{{ $user->name }}</td>
											<td>{{ $user->username }}</td>
											<td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>

											<td> {{-- /Options --}}
												<a href="" class="label label-success">Bekijk</a>
												<a href="" class="label label-warning">Wijzig</a>

												@if ((string) $user->blocked === 'N')
													{{-- Href tag not needed to fill in because onclick="" function --}}
													<a href="#" class="label label-danger" onclick="getDataById('{{ base_url('users/getById/' . $user->id) }}', '#block-user')">Blokkeer</a>
												@elseif ((string) $user->blocked === 'Y')
													<a href="" class="label label-info">Activeer</a>
												@endif

												<a href="{{ base_url('users/delete/' . $user->id) }}" class="label label-danger">Verwijder</a>
											</td> {{-- /Options --}}
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					@endif
				</div> {{-- /Data --}}
			</div>
		</div> {{-- />Main content --}}
    </div>

	{{-- Modal includes --}}
		@include('users/includes/block-modal')
		@include('users/includes/create-modal')
	{{-- /Modal includes --}}
@endsection
