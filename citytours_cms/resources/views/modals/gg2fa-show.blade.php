<div id="modal-show-gg2fa" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title ml-2">{{ trans('text.gg_2fa.header') }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="{{ trans('button.close') }}">
					<span aria-hidden="true"><i class="fe fe-x"></i></span>
				</button>
			</div>
			<div class="modal-body text-center pt-4">
				{!! QrCode::size(200)->color(12, 12, 27)->backgroundColor(255, 255, 255)->style('square', 0.2)
					->margin(1)->generate(auth()->user()->getGG2FAUrl()); !!}
				<div class="pt-4 font-size-14 text-center">
					{{ trans('text.gg_2fa.label') }}
					<p class="font-size-16 font-weight-bold">{{ auth()->user()->google2fa_secret }}</p>
				</div>
				@if (!auth()->user()->activeGG2FA())
				<div class="mb-2">
					<p class="text-center font-size-12 font-italic bg-light rounded-lg pt-2 pb-2 pl-4 pr-4">
						{!! trans('text.gg_2fa.warning') !!}</p>
				</div>
				@endif
			</div>
			<div class="modal-footer">
				@if (auth()->user()->activeGG2FA())
				<button type="button" class="btn btn-primary btn-block" data-dismiss="modal">{{ trans('button.close') }}</button>
				@else
				<form id="form-active-gg2fa" method="post" action="{{ route('security.gg2fa.active') }}">
					@method('PUT')
					@csrf
				</form>
				<button id="btn-active-gg2fa" type="button" data-style="slide-right"
					class="btn btn-success font-size-14 btn-block ladda-button">
					<span class="ladda-label">
						<i class="fe fe-check-circle"></i> {{ trans('button.active') }}
					</span>
				</button>
				@endif
			</div>
		</div>
	</div>
</div>