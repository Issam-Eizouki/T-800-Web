@extends('cms.layout.index')

@push('content')
    <div class="cui__layout__content">
        <div class="cui__breadcrumbs">
            <div class="cui__breadcrumbs__path">
                CMS
                <span>
                    <span class="cui__breadcrumbs__arrow"></span>
                    <strong class="cui__breadcrumbs__current">Restaurants</strong>
                </span>
            </div>
        </div>
        <div class="cui__utils__content">
            <form id="from-search" action="{{ route('restaurants') }}">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <div class="input-group">
                            <input type="text"
                                id="city" name="city"
                                class="form-control"
                                value="{{ \Request::get('city') }}"
                                name-validation="City"
                                data-validation="[NOTEMPTY]"
                                placeholder="City ...">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fe fe-search"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @if ($restaurants)
            <div class="table-responsive mt-4">
                <table class="table table-striped table-hover" id="tbl">
                    <thead>
                        <tr>
                            <th>Place Id</th>
                            <th>Name - Address</th>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($restaurants as $restaurant)
                        <tr>
                            <td><small>{{ $restaurant->place_id }}</small></td>
                            <td>
                                <strong>{{ $restaurant->name }}</strong>
                                <div class="font-size-12">{{ $restaurant->formatted_address }}</div>
                            </td>
                            <td>
                                <a class="btn btn-outline-success" href="{{ route('restaurant.view', ['id', $restaurant->place_id]) }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
@endpush


@push('js')
<script>
    $(function() {
        $('#city').focus();
        $('#tbl').DataTable({});
        $('#from-search').validate({
            submit: {
                settings: {
                    inputContainer: '.form-group',
                    errorListClass: 'form-control-error-list',
                    errorClass: 'has-danger',
                },
            }
        })
        $('#from-search .remove-error').on('click', function() {
            $('#from-search').removeError();
        })
    });
</script>
@endpush

