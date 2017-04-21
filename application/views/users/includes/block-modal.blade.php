<div id="block-user" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Blokkeer een gebruiker.</h4>
			</div>

			<div class="modal-body">
				<form action="{{ base_url('users/block') }}" class="form-horizontal" method="POST" id="form">
					{{-- TODO: Implement csrf token. --}}

					<input type="hidden" name="id" value="">

					<div class="form-group">
						<label class="control-label col-sm-3">
							Naam: {{-- <span class="text-danger">*</span> --}}
						</label>

						<div class="col-sm-9">
							<input type="text" name="name" class="form-control" disabled>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">
							Reden: <span class="text-danger">*</span>
						</label>

						<div class="col-sm-9">
							<textarea name="reason" placeholder="reden tot blokkering" rows="7" class="form-control"></textarea>
						</div>
					</div>

				</form>
			</div>

			<div class="modal-footer">
				<button type="submit" form="form" class="btn btn-success">Blokkeer</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Annuleer</button>
			</div>

		</div>
	</div>
</div>
