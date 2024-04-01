@inject('model', '\App\Models\User')

@extends('backend.layouts.app')

@section('title', __('Update Bill'))

@section('content')
    <x-forms.patch :action="route('admin.bill.update', $bill)">
        @php(html()->model($bill))
        <x-backend.card>
            <x-slot name="body">
                <div x-data="{ user_id : false }">
                    <div class="row mb-3">
                        <div class="col-6">
                            <h4 class="card-title">@lang('Edit Bill')</h4>
                            <p class="card-description">Fields marked with <span class="text-danger">*</span> are mendatory.</p>
                        </div>
                        <div class="col-6 text-end">
                            <x-utils.link class="btn btn-outline-primary btn-sm waves-effect waves-light" icon="fas fa-arrow-left" :href="route('admin.bill.index')" :text="__('Cancel')" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        {{ html()->label(__('Period').'<span class="text-danger">*</span>')->class('col-md-1 col-form-label')->for('start_date') }}
    
                        <div class="col-md-5">
                            {{ html()->input('date', 'start_date')
                                ->class('form-control')
                                ->placeholder(__('Start Date'))
                                ->required() }}
                        </div>
                        <div class="col-md-1 text-center col-form-label">TO</div>
                        <div class="col-md-5">
                            {{ html()->input('date', 'end_date')
                                ->class('form-control')
                                ->placeholder(__('End Date'))
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row mb-3">
                        {{ html()->label(__('Due Date').'<span class="text-danger">*</span>')->class('col-md-1 col-form-label')->for('due_date') }}
    
                        <div class="col-md-5">
                            {{ html()->input('date', 'due_date')
                                ->class('form-control')
                                ->placeholder(__('Due Date'))
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row mb-3">
                        {{ html()->label(__('DT Code').'<span class="text-danger">*</span>')->class('col-md-1 col-form-label')->for('user_id') }}
    
                        <div class="col-md-5">
                            {{ html()->select('user_id', $users->pluck('dt_code', 'id'))
                                ->class('form-control')
                                ->placeholder(__('Select DT Code'))
                                ->attribute('x-on:change', 'user_id = $event.target.value')
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row mb-3">
                        {{ html()->label(__('Name'))->class('col-md-1 col-form-label')->for('name') }}
    
                        <div class="col-md-5 col-form-label">
                            <span id="name"></span>
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row mb-3">
                        {{ html()->label(__('Account'))->class('col-md-1 col-form-label')->for('broker_id') }}
    
                        <div class="col-md-5">
                            {{ html()->select('broker_id')
                                ->class('form-control')
                                ->placeholder(__('Select Account'))
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row mb-3">
                        {{ html()->label(__('Bill'))->class('col-md-1 col-form-label')->for('amount') }}
                        <div class="col-md-5 d-flex">
                            <div class="col-md-1 col-form-label">IDR</div>
                            {{ html()->text('amount')
                                ->class('form-control')
                                ->placeholder(__('Bill'))
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row mb-3">
                        {{ html()->label(__('Details'))->class('col-md-1 col-form-label')->for('details') }}
                        <div class="col-md-5 d-flex">
                            {{ html()->textarea('details')
                                ->class('form-control')
                                ->placeholder(__('Details')) }}
                        </div>
                    </div><!--form-group-->
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Bill')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
@push('after-scripts')
    <script>
        $(document).ready(function(){
            var brokerId = '{{old('broker_id') ?? $bill->broker_id}}';
            $('#user_id').change(function(){
                $('#broker_id option:not(:first)').remove();
                if($('#user_id').val()) {
                    $.ajax({
                        url: '{{route('admin.member.broker.fetch', '##MEMBER_ID##')}}'.replace('##MEMBER_ID##', $('#user_id').val()),
                        dataType: 'json',
                        success: function(response) {
                            if(response.success) {
                                $('#broker_id').append(response.html);
                                $('#name').html(response.name);
                                $('#broker_id option[value="'+brokerId+'"]').prop('selected', true);
                            }
                        }
                    })
                }
            }).trigger('change')
        });
    </script>
@endpush
