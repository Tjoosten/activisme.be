@layout('layouts/backend')

@section('content')
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
			<div class="panel panel-default">
				<div class="panel-body">

					<ul class="nav nav-tabs" role="tablist"> {{-- tab navigation --}}
						<li role="presentation" class="active"><a href="#info" aria-controls="home" role="tab" data-toggle="tab">Account informatie</a></li>
						<li role="presentation"><a href="#security" aria-controls="profile" role="tab" data-toggle="tab">Account security</a></li>
					</ul> {{-- /Tab navigation --}}

					<div class="tab-content"> {{-- Tab content --}}
						<div role="tabpanel" class="tab-pane active fade in" id="info"> {{-- Informaion tab --}}
							<div class="row">
								<div class="col-sm-12 tab-padding">
									<form action="{{ base_url('account/updateAccount') }}" method="POST" class="form-horizontal"> {{-- Information update form --}}
										{{-- TODO: Implement csrf token --}}

										<div class="form-group">
											<label for="" class="control-label col-md-3">
												Naam: <span class="text-danger">*</span>
											</label>

											<div class="col-md-9">
												<input type="text" class="form-control" placeholder="Naam" value="{{ $user->name }}" disabled>
											</div>
										</div>

										<div class="form-group">
											<label for="" class="control-label col-md-3">
												Gebruikersnaam: <span class="text-danger">*</span>
											</label>

											<div class="col-md-9">
												<input type="text" class="form-control" name="username" placeholder="Gebruikersnaam" value="{{ $user->username }}">
											</div>
										</div>

										<div class="form-group">
											<label for="" class="control-label col-md-3">
												E-mail adres: <span class="text-danger">*</span>
											</label>

											<div class="col-md-9">
												<input type="text" class="form-control" name="email" placeholder="E-mail adres" value="{{ $user->email }}">
											</div>
										</div>

										<div class="form-group">
											<div class="col-md-offset-3 col-md-9">
												<button type="submit" class="btn btn-sm btn-success">Account informatie aanpassen</button>
												<button type="reset" class="btn btn-sm btn-danger">Reset formulier</button>
											</div>
										</div>
									</form> {{-- /Information update form --}}
								</div>
							</div>
						</div> {{-- /Information tab --}}

						<div role="tabpanel" class="tab-pane fade in" id="security"> {{-- Security tab --}}
							<div class="row">
								<div class="col-sm-12 tab-padding">
									<form action="{{ base_url('account/updateSecurity') }}" method="POST" class="form-horizontal"> {{-- Account security form --}}
										{{-- TODO: Implement CSRF token --}}

										<div class="form-group">
											<label for="password" class="control-label col-md-3">
												Wachtwoord: <span class="text-danger">*</span>
											</label>

											<div class="col-md-9">
												<input type="text" class="form-control" placeholder="Wachtwoord" name="password">
											</div>
										</div>

										<div class="form-group">
											<label for="confirmation" class="control-label col-md-3">
												Bevestiging: <span class="text-danger">*</span>
											</label>

											<div class="col-md-9">
												<input type="text" class="form-control" name="password_confirmation" placeholder="Wachtwoord bevestiging">
											</div>
										</div>

										<div class="form-group">
											<div class="col-md-offset-3 col-sm-9">
												<button type="submit" class="btn btn-sm btn-success">Wachtwoord wijzigen</button>
												<button type="reset" class="btn btn-sm btn-danger">Reset formulier</button>
											</div>
										</div>
									</form> {{-- /Account security form --}}
								</div>
							</div>
						</div> {{-- /Security tab --}}
					</div> {{-- /Tab content --}}

				</div>
			</div>
		</div>
	</div>
@endsection
