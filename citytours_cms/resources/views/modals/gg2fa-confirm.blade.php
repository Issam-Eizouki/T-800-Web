<div id="modal-confirm-gg2fa" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		<form id="form-confirm-gg2fa" method="post" action="{{ route('gg2fa.verify.action') }}">
		@method('PUT')
		@csrf
			<div class="modal-header">
				<h5 class="modal-title ml-2">{{ trans('text.gg_2fa.header') }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="{{ trans('button.close') }}">
					<span aria-hidden="true"><i class="fe fe-x"></i></span>
				</button>
			</div>
			<div class="modal-body pl-4 pr-4">
				<div class="text-center mb-4">
					<i class="fe fe-shield font-size-60 text-success"></i>
					<div class="bg-light text-success rounded-lg p-4 mt-4">{!! trans('text.gg_2fa.warning_confirm') !!}</div>
				</div>
				<div class="form-group mb-4">
					<input name="gg2fa_code"
						class="form-control input-gg2fa"
						type="text" maxlength="6"
						autocomplete="off" autofocus="autofocus"
						name-validation="{{ trans('label.gg2fa.vln') }}"
						data-validation="[NOTEMPTY,L==6]">
				</div>
			</div>
			<div class="modal-footer">
				<button id="btn-confirm-gg2fa" type="submit" data-style="slide-right"
					class="btn btn-success btn-block ladda-button">
					<span class="ladda-label">{{ trans('button.confirm') }}</span></button>
			</div>
		</form>
		</div>
	</div>
</div>