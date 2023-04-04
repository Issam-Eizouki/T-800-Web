@extends('cms.layout.index')

@push('content')
    <div class="cui__layout__content">
        <div class="cui__breadcrumbs">
            <div class="cui__breadcrumbs__path">
                CMS
                <span>
                    <span class="cui__breadcrumbs__arrow"></span>
                    <a href="{{ route('bars') }}">Bars</a>
                </span>
                <span>
                    <span class="cui__breadcrumbs__arrow"></span>
                    <strong class="cui__breadcrumbs__current">{{ $bar->name }}</strong>
                </span>
            </div>
        </div>
        <div class="cui__utils__content">
            <form method="post" action="{{ route('bar.update', ['id' => $bar->place_id]) }}">
            @csrf
            <div class="card">
                <div class="card-header"><strong>Information</strong></div>
                <div class="card-body">
                    <div class="row">
                    @foreach (array_keys(get_object_vars($bar)) as $key)
                        @if (is_array($bar->$key))
                        <div class="form-group col-md-12">
                            <label class="text-capitalize">{{ $key }}</label>
                            @foreach($bar->$key as $skey=>$sub)
                                <div class="form-group col-md-12">
                                    <textarea name="{{ $key }}[]" class="form-control autosize" rows="1">{{ $sub }}</textarea>
                                </div>
                            @endforeach
                        </div>
                        @else
                        <div class="form-group col-md-6">
                            <label class="text-capitalize" for="{{ $key }}">{{ $key }}</label>
                            <textarea id="{{ $key }}" name="{{ $key }}" class="form-control autosize" rows="1">{!! $bar->$key !!}</textarea>
                        </div>
                        @endif
                    @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning px-2">Update</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endpush

@push('js')
<script>
    $(function() {
        autosize($('.autosize'));
    });
</script>
@endpush
