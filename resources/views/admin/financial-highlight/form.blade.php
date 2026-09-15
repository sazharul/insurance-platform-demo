<div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
    <label for="en_title" class="control-label">{{ 'En Title' }}</label>
    <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($financialhighlight->en_title) ? $financialhighlight->en_title : ''}}" >
    {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
    <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
    <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($financialhighlight->bn_title) ? $financialhighlight->bn_title : ''}}" >
    {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_1" class="control-label">{{ 'En Breadcrumb 1' }}</label>
    <input class="form-control" name="en_breadcrumb_1" type="text" id="en_breadcrumb_1" value="{{ isset($financialhighlight->en_breadcrumb_1) ? $financialhighlight->en_breadcrumb_1 : ''}}" >
    {!! $errors->first('en_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_1" class="control-label">{{ 'Bn Breadcrumb 1' }}</label>
    <input class="form-control" name="bn_breadcrumb_1" type="text" id="bn_breadcrumb_1" value="{{ isset($financialhighlight->bn_breadcrumb_1) ? $financialhighlight->bn_breadcrumb_1 : ''}}" >
    {!! $errors->first('bn_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_2" class="control-label">{{ 'En Breadcrumb 2' }}</label>
    <input class="form-control" name="en_breadcrumb_2" type="text" id="en_breadcrumb_2" value="{{ isset($financialhighlight->en_breadcrumb_2) ? $financialhighlight->en_breadcrumb_2 : ''}}" >
    {!! $errors->first('en_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_2" class="control-label">{{ 'Bn Breadcrumb 2' }}</label>
    <input class="form-control" name="bn_breadcrumb_2" type="text" id="bn_breadcrumb_2" value="{{ isset($financialhighlight->bn_breadcrumb_2) ? $financialhighlight->bn_breadcrumb_2 : ''}}" >
    {!! $errors->first('bn_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_financial_highlights_title') ? 'has-error' : ''}}">
    <label for="en_financial_highlights_title" class="control-label">{{ 'En Financial Highlights Title' }}</label>
    <input class="form-control" name="en_financial_highlights_title" type="text" id="en_financial_highlights_title" value="{{ isset($financialhighlight->en_financial_highlights_title) ? $financialhighlight->en_financial_highlights_title : ''}}" >
    {!! $errors->first('en_financial_highlights_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_financial_highlights_title') ? 'has-error' : ''}}">
    <label for="bn_financial_highlights_title" class="control-label">{{ 'Bn Financial Highlights Title' }}</label>
    <input class="form-control" name="bn_financial_highlights_title" type="text" id="bn_financial_highlights_title" value="{{ isset($financialhighlight->bn_financial_highlights_title) ? $financialhighlight->bn_financial_highlights_title : ''}}" >
    {!! $errors->first('bn_financial_highlights_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_short_info') ? 'has-error' : ''}}">
    <label for="en_short_info" class="control-label">{{ 'En Short Info' }}</label>
    <input class="form-control" name="en_short_info" type="text" id="en_short_info" value="{{ isset($financialhighlight->en_short_info) ? $financialhighlight->en_short_info : ''}}" >
    {!! $errors->first('en_short_info', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_short_info') ? 'has-error' : ''}}">
    <label for="bn_short_info" class="control-label">{{ 'Bn Short Info' }}</label>
    <input class="form-control" name="bn_short_info" type="text" id="bn_short_info" value="{{ isset($financialhighlight->bn_short_info) ? $financialhighlight->bn_short_info : ''}}" >
    {!! $errors->first('bn_short_info', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_particulars') ? 'has-error' : ''}}">
    <label for="en_particulars" class="control-label">{{ 'En Particulars' }}</label>
    <input class="form-control" name="en_particulars" type="text" id="en_particulars" value="{{ isset($financialhighlight->en_particulars) ? $financialhighlight->en_particulars : ''}}" >
    {!! $errors->first('en_particulars', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_particulars') ? 'has-error' : ''}}">
    <label for="bn_particulars" class="control-label">{{ 'Bn Particulars' }}</label>
    <input class="form-control" name="bn_particulars" type="text" id="bn_particulars" value="{{ isset($financialhighlight->bn_particulars) ? $financialhighlight->bn_particulars : ''}}" >
    {!! $errors->first('bn_particulars', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
