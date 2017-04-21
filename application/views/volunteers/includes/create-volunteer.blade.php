<div id="new-volunteer" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Nieuwe vrijwilliger</h4>
			</div>

			<div class="modal-body">
				<form action="{{ base_url('volunteer/store') }}" class="form-horizontal" method="POST" id="volunteer">
					{{-- TODO: Implement csrf token --}}

					<div class="form-group">
						<label class="control-label col-sm-3">
							Naam: <span class="text-danger">*</span>
						</label>
						<div class="col-sm-9">
							<input type="text" name="name" class="form-control" placeholder="Naam">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">
							E-mail: <span class="text-danger">*</span>
						</label>
						<div class="col-sm-9">
							<input type="text" name="email" class="form-control" placeholder="Email">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">
							Regio: <span class="text-danger">*</span>
						</label>
						<div class="col-sm-9">
							<select name="city_id" class="form-control">
								<option value="">-- Selecteer de stad -- </option>

								@foreach ($cities as $city)
									<option value="{{ $city->id }}">{{ $city->postal_code }} - {{ $city->city_name }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</form>
			</div>

			<div class="modal-footer">
				<button type="submit" form="volunteer" class="btn btn-success">Aanmaken</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Sluiten</button>
			</div>
		</div>

	</div>
</div>
