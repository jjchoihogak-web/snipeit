@extends('layouts/default')

{{-- Page title --}}
@section('title')
    {{ trans('admin/consumables/general.update_stock') }}
    @parent
@stop

{{-- Page content --}}
@section('content')

    <div class="row">
        <div class="col-md-9">

            <form class="form-horizontal" id="update_stock_form" method="POST" action="{{ route('consumables.update_stock.post', $consumable->id) }}" autocomplete="off">
                @csrf

                <div class="box box-default">
                    @if ($consumable->id)
                        <div class="box-header with-border">
                            <div class="box-heading">
                                <h2 class="box-title">{{ $consumable->name }}</h2>
                            </div>
                        </div>
                    @endif

                    <div class="box-body">

                        <!-- Name -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{ trans('admin/consumables/general.consumable_name') }}</label>
                            <div class="col-md-6">
                                <p class="form-control-static">{{ $consumable->name }}</p>
                            </div>
                        </div>

                        <!-- Category -->
                        @if ($consumable->category)
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ trans('general.category') }}</label>
                                <div class="col-md-6">
                                    <p class="form-control-static">{{ $consumable->category->name }}</p>
                                </div>
                            </div>
                        @endif

                        <!-- Current Total -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{ trans('admin/components/general.total') }}</label>
                            <div class="col-md-6">
                                <p class="form-control-static">{{ $consumable->qty }}</p>
                            </div>
                        </div>

                        <!-- Quantity Change -->
                        <div class="form-group {{ $errors->has('quantity_changed') ? 'error' : '' }}">
                            <label for="quantity_changed" class="col-md-3 control-label">
                                {{ trans('admin/consumables/general.quantity_change') }}
                            </label>
                            <div class="col-md-7 col-sm-12 required">
                                <div class="col-md-3" style="padding-left:0px">
                                    <input class="form-control" type="number" name="quantity_changed" id="quantity_changed" value="0" required>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <p>{{ trans('admin/consumables/general.quantity_change_info') }}</p>
                                </div>
                            </div>
                            {!! $errors->first('quantity_changed', '<div class="col-md-8 col-md-offset-3"><span class="alert-msg"><i class="fas fa-times"></i> :message</span></div>') !!}
                        </div>

                        <!-- Note -->
                        <div class="form-group {{ $errors->has('note') ? 'error' : '' }}">
                            <label for="note" class="col-md-3 control-label">{{ trans('admin/hardware/form.notes') }}</label>
                            <div class="col-md-7">
                                <textarea class="form-control" name="note" id="note">{{ old('note') }}</textarea>
                                {!! $errors->first('note', '<span class="alert-msg"><i class="fas fa-times"></i> :message</span>') !!}
                            </div>
                        </div>

                    </div> <!-- /.box-body -->

                    <x-redirect_submit_options
                            index_route="consumables.index"
                            :button_label="trans('admin/consumables/general.update_stock')"
                            :options="[
                'index' => trans('admin/hardware/form.redirect_to_all', ['type' => trans('general.consumables')]),
                'item' => trans('admin/hardware/form.redirect_to_type', ['type' => trans('general.consumable')]),
            ]" />

                </div> <!-- /.box -->
            </form>

        </div>
    </div>

@stop
