<div class="form-body">
    <div class="form-group hidden">
        <div class="col-md-8">
            {!! Form::text('id', $value = $data['br_bom']->id ?? null, array('id'=>'id', 'class' => 'form-control')) !!}
            @if($errors->has('id'))
                <span class="required">{{ $errors->first('id') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Employee</label>

        <div class="col-md-8">
            {!! Form::select('posting_employee_id',$data['posting_employee'], $value = $data['br_bom']->posting_id ?? null, array('id'=>'status','placeholder'=>'Please Select Employee', 'class' => 'form-control select2')) !!}
            @if($errors->has('posting_employee_id'))
                <span class="required">{{ $errors->first('posting_employee_id') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Branch</label>
        <div class="col-md-8">
            {!! Form::select('branch_id', $data['branch'], $value= $data['br_bom'] ?? null, ['id' => 'status',  'class' => 'form-control select2']) !!}
            @if($errors->has('branch_id'))
                <span class="required">{{ $errors->first('branch_id') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Effective Date</label>
        <div class="col-md-8">
            {!! Form::date('effective_date', isset($data['br_bom']->effective_date) ? date('Y-m-d', strtotime($data['br_bom']->effective_date)) : null, ['id'=>'effective_date', 'placeholder'=>'Effective date', 'class' => 'form-control']) !!}
            @if($errors->has('effective_date'))
                <span class="required">{{ $errors->first('effective_date') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Status</label>
        <div class="col-md-8">
            @php
                $data['status'] = [''=>'please select',1=>'Active',2=>'Inactive']
            @endphp
            {!! Form::select('status',$data['status'], $value = $data['br_bom']->status ?? null, array('id'=>'status','placeholder'=>'Status', 'class' => 'form-control')) !!}
            @if($errors->has('status'))
                <span class="required">{{ $errors->first('status') }}</span>
            @endif
        </div>
    </div>



    <div class="form-group">
        <div class="col-md-offset-4 col-md-8">
            @if(!empty($data['br_bom']))
                {!! Form::submit('Update', array('class' => "btn btn-primary")) !!}
            @else
                {!! Form::submit('Submit', array('class' => "btn btn-primary")) !!}
            @endif

            <a href="{{  route('BrBom.index') }}" class="btn btn-success">Back</a>
        </div>

    </div>
</div>

@section('script')
    <script src="{{ asset('assets/my_scripts/custom.js?n=1') }}" type="text/javascript"></script>

    <script src="{{asset('assets/pages/scripts/components-select2.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        let employee_id = $('#employee_id').val();
        getEmployeeBasicInfo(employee_id);
    </script>

    <script>
        $(document).ready(function () {
            updatePasswordField();
            $('#password-type-select').on('change', function () {
                updatePasswordField();
            });

            function updatePasswordField() {
                var passwordType = $('#password-type-select').val();
                var passwordField = $('#password');

                if (passwordType === '1') {
                    passwordField.val('12345678').prop('readonly', true);
                } else {
                    passwordField.val('').prop('readonly', false);
                    passwordField.val('');
                }
            }
        });
    </script>
@stop