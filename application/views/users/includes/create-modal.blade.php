<div id="new-user" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Nieuwe login</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" action="{{ site_url('users/store') }}" method="POST" id="user">
					{{-- TODO: Implement csrf token --}}

					<fieldset>
						<legend>Acount informatie:</legend>

						<div class="form-group">
							<label class="col-sm-4 control-label">
								Naam: <span class="text-danger">*</span>
							</label>

							<div class="col-sm-8">
								<input type="text" name="name" class="form-control" placeholder="De naam van de gebruiker">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-4">
								Gebruikersnaam: <span class="text-danger">*</span>
							</label>

							<div class="col-sm-8">
								<input type="text" name="username" class="form-control" placeholder="De gebruikersnaam">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-4">
								E-mail: <span class="text-danger">*</span>
							</label>

							<div class="col-sm-8">
								<input type="email" class="form-control" name="email" placeholder="E-mail adres">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-4">
								Wachtwoord: <span class="text-danger">*</span>
							</label>

							<div class="col-sm-8">
								<input type="password" name="password" placeholder="Wachtwoord" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-4">
								Bevestiging: <span class="text-danger">*</span>
							</label>

							<div class="col-sm-8">
								<input type="password" name="password_confirmation" placeholder="Wachtwoord bevestiging" class="form-control">
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend>ACL (Access Control List)</legend>

						<div class="form-group">
							<label class="control-label col-sm-4">
								Permissies: <span class="text-danger">*</span>
							</label>

							<div class="col-sm-8">
								<select name="permissions" class="form-control">
									<option value="">-- Selecteer de permissies --</option>

									@foreach ($permissions as $permission)
										<option value="{{ $permission->id }}">{{ $permission->name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-4">
								Rechten: <span class="text-danger">*</span>
							</label>

							<div class="col-sm-8">
								<select name="abilities" class="form-control">
									<option value="">-- Selecteer de rechten --</option>

									@foreach ($abilities as $ability)
										<option value="{{ $ability->id }}">{{ $ability->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</fieldset>

				</form>
			</div>

			<div class="modal-footer">
				<button type="submit" form="user" class="btn btn-success">Aanmaken</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Annuleer</button>
			</div>

		</div>
	</div>
</div>
