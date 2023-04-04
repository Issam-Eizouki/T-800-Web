<div id="modal-disable-gg2fa" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body mt-4 pl-4 pr-4">
				<button type="button" class="close" data-dismiss="modal" aria-label="{{ trans('button.close') }}">
					<span aria-hidden="true"><i class="fe fe-x"></i></span>
				</button>
				<div class="text-center mb-4">
					<i class="fe fe-shield-off font-size-60 text-warning"></i>
					<div class="bg-light rounded-lg p-4 mt-4">{!! trans('text.gg_2fa.warning_disable') !!}</div>
				</div>
				<form id="form-disable-gg2fa" method="post" action="{{ route('security.gg2fa.disable') }}">
				@method('PUT')
				@csrf
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="disable-gg2fa-password">{{ trans('text.gg_2fa.re_enter_password_lbl') }}</label>
							<input id="disable-gg2fa-password" name="password"
								class="form-control"
								type="password" maxlength="255"
								autocomplete="false"
								placeholder="{{ trans('label.password.pld') }}"
								name-validation="{{ trans('label.password.vln') }}"
								data-validation="[NOTEMPTY,L>=8]">
						</div>
						<div class="form-group col-md-12 text-right">
							<button id="btn-disable-gg2fa" type="submit" data-style="slide-right"
								class="btn btn-warning px-4 mr-2 ladda-button">
								<span class="ladda-label">{{ trans('button.disable') }}</span></button>
							<button type="button" class="btn btn-secondary btn-cancel" data-dismiss="modal">{{ trans('button.cancel') }}</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>