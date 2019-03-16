<div class="form-group">
    {!! Form::label('status', 'Status: ') !!} 
    <input type="checkbox" name="status" id="" {{ (isset($bankAccount) && $bankAccount->status) ? 'checked' : '' }}> Active
    <p><b>Note: </b><span style="color: #4F4F4F">Only active bank shown</span></p>
</div>