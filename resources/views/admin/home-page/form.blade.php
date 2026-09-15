
<div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
    <label for="en_title" class="control-label">{{ 'En Title' }}</label>
    <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($homepage->en_title) ? $homepage->en_title : ''}}" >
    {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
    <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
    <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($homepage->bn_title) ? $homepage->bn_title : ''}}" >
    {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_description') ? 'has-error' : ''}}">
    <label for="en_description" class="control-label">{{ 'En Description' }}</label>
    <input class="form-control" name="en_description" type="text" id="en_description" value="{{ isset($homepage->en_description) ? $homepage->en_description : ''}}" >
    {!! $errors->first('en_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_description') ? 'has-error' : ''}}">
    <label for="bn_description" class="control-label">{{ 'Bn Description' }}</label>
    <input class="form-control" name="bn_description" type="text" id="bn_description" value="{{ isset($homepage->bn_description) ? $homepage->bn_description : ''}}" >
    {!! $errors->first('bn_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('slider1') ? 'has-error' : ''}}">
    <label for="slider1" class="control-label">{{ 'Slider1' }}</label>
    <input class="form-control" name="slider1" type="file" id="slider1" value="{{ isset($homepage->slider1) ? $homepage->slider1 : ''}}" >
    {!! $errors->first('slider1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('slider2') ? 'has-error' : ''}}">
    <label for="slider2" class="control-label">{{ 'Slider2' }}</label>
    <input class="form-control" name="slider2" type="file" id="slider2" value="{{ isset($homepage->slider2) ? $homepage->slider2 : ''}}" >
    {!! $errors->first('slider2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('slider3') ? 'has-error' : ''}}">
    <label for="slider3" class="control-label">{{ 'Slider3' }}</label>
    <input class="form-control" name="slider3" type="file" id="slider3" value="{{ isset($homepage->slider3) ? $homepage->slider3 : ''}}" >
    {!! $errors->first('slider3', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_online_calculator_title') ? 'has-error' : ''}}">
    <label for="en_online_calculator_title" class="control-label">{{ 'En Online Calculator Title' }}</label>
    <input class="form-control" name="en_online_calculator_title" type="text" id="en_online_calculator_title" value="{{ isset($homepage->en_online_calculator_title) ? $homepage->en_online_calculator_title : ''}}" >
    {!! $errors->first('en_online_calculator_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_online_calculator_title') ? 'has-error' : ''}}">
    <label for="bn_online_calculator_title" class="control-label">{{ 'Bn Online Calculator Title' }}</label>
    <input class="form-control" name="bn_online_calculator_title" type="text" id="bn_online_calculator_title" value="{{ isset($homepage->bn_online_calculator_title) ? $homepage->bn_online_calculator_title : ''}}" >
    {!! $errors->first('bn_online_calculator_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_online_calculator_description') ? 'has-error' : ''}}">
    <label for="en_online_calculator_description" class="control-label">{{ 'En Online Calculator Description' }}</label>
    <input class="form-control" name="en_online_calculator_description" type="text" id="en_online_calculator_description" value="{{ isset($homepage->en_online_calculator_description) ? $homepage->en_online_calculator_description : ''}}" >
    {!! $errors->first('en_online_calculator_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_online_calculator_description') ? 'has-error' : ''}}">
    <label for="bn_online_calculator_description" class="control-label">{{ 'Bn Online Calculator Description' }}</label>
    <input class="form-control" name="bn_online_calculator_description" type="text" id="bn_online_calculator_description" value="{{ isset($homepage->bn_online_calculator_description) ? $homepage->bn_online_calculator_description : ''}}" >
    {!! $errors->first('bn_online_calculator_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_work_process_title') ? 'has-error' : ''}}">
    <label for="en_work_process_title" class="control-label">{{ 'En Work Process Title' }}</label>
    <input class="form-control" name="en_work_process_title" type="text" id="en_work_process_title" value="{{ isset($homepage->en_work_process_title) ? $homepage->en_work_process_title : ''}}" >
    {!! $errors->first('en_work_process_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_work_process_title') ? 'has-error' : ''}}">
    <label for="bn_work_process_title" class="control-label">{{ 'Bn Work Process Title' }}</label>
    <input class="form-control" name="bn_work_process_title" type="text" id="bn_work_process_title" value="{{ isset($homepage->bn_work_process_title) ? $homepage->bn_work_process_title : ''}}" >
    {!! $errors->first('bn_work_process_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_work_process_description') ? 'has-error' : ''}}">
    <label for="en_work_process_description" class="control-label">{{ 'En Work Process Description' }}</label>
    <input class="form-control" name="en_work_process_description" type="text" id="en_work_process_description" value="{{ isset($homepage->en_work_process_description) ? $homepage->en_work_process_description : ''}}" >
    {!! $errors->first('en_work_process_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_work_process_description') ? 'has-error' : ''}}">
    <label for="bn_work_process_description" class="control-label">{{ 'Bn Work Process Description' }}</label>
    <input class="form-control" name="bn_work_process_description" type="text" id="bn_work_process_description" value="{{ isset($homepage->bn_work_process_description) ? $homepage->bn_work_process_description : ''}}" >
    {!! $errors->first('bn_work_process_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_work_process_list') ? 'has-error' : ''}}">
    <label for="en_work_process_list" class="control-label">{{ 'En Work Process List' }}</label>
    <textarea class="form-control" rows="5" name="en_work_process_list" type="textarea" id="en_work_process_list" >{{ isset($homepage->en_work_process_list) ? $homepage->en_work_process_list : ''}}</textarea>
    {!! $errors->first('en_work_process_list', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_work_process_list') ? 'has-error' : ''}}">
    <label for="bn_work_process_list" class="control-label">{{ 'Bn Work Process List' }}</label>
    <textarea class="form-control" rows="5" name="bn_work_process_list" type="textarea" id="bn_work_process_list" >{{ isset($homepage->bn_work_process_list) ? $homepage->bn_work_process_list : ''}}</textarea>
    {!! $errors->first('bn_work_process_list', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_about_title') ? 'has-error' : ''}}">
    <label for="en_about_title" class="control-label">{{ 'En About Title' }}</label>
    <input class="form-control" name="en_about_title" type="text" id="en_about_title" value="{{ isset($homepage->en_about_title) ? $homepage->en_about_title : ''}}" >
    {!! $errors->first('en_about_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_about_title') ? 'has-error' : ''}}">
    <label for="bn_about_title" class="control-label">{{ 'Bn About Title' }}</label>
    <input class="form-control" name="bn_about_title" type="text" id="bn_about_title" value="{{ isset($homepage->bn_about_title) ? $homepage->bn_about_title : ''}}" >
    {!! $errors->first('bn_about_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_about_description') ? 'has-error' : ''}}">
    <label for="en_about_description" class="control-label">{{ 'En About Description' }}</label>
    <input class="form-control" name="en_about_description" type="text" id="en_about_description" value="{{ isset($homepage->en_about_description) ? $homepage->en_about_description : ''}}" >
    {!! $errors->first('en_about_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_about_description') ? 'has-error' : ''}}">
    <label for="bn_about_description" class="control-label">{{ 'Bn About Description' }}</label>
    <input class="form-control" name="bn_about_description" type="text" id="bn_about_description" value="{{ isset($homepage->bn_about_description) ? $homepage->bn_about_description : ''}}" >
    {!! $errors->first('bn_about_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_about_text') ? 'has-error' : ''}}">
    <label for="en_about_text" class="control-label">{{ 'En About Text' }}</label>
    <input class="form-control" name="en_about_text" type="text" id="en_about_text" value="{{ isset($homepage->en_about_text) ? $homepage->en_about_text : ''}}" >
    {!! $errors->first('en_about_text', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_about_text') ? 'has-error' : ''}}">
    <label for="bn_about_text" class="control-label">{{ 'Bn About Text' }}</label>
    <input class="form-control" name="bn_about_text" type="text" id="bn_about_text" value="{{ isset($homepage->bn_about_text) ? $homepage->bn_about_text : ''}}" >
    {!! $errors->first('bn_about_text', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_about_slider_list') ? 'has-error' : ''}}">
    <label for="en_about_slider_list" class="control-label">{{ 'En About Slider List' }}</label>
    <textarea class="form-control" rows="5" name="en_about_slider_list" type="textarea" id="en_about_slider_list" >{{ isset($homepage->en_about_slider_list) ? $homepage->en_about_slider_list : ''}}</textarea>
    {!! $errors->first('en_about_slider_list', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_about_slider_list') ? 'has-error' : ''}}">
    <label for="bn_about_slider_list" class="control-label">{{ 'Bn About Slider List' }}</label>
    <textarea class="form-control" rows="5" name="bn_about_slider_list" type="textarea" id="bn_about_slider_list" >{{ isset($homepage->bn_about_slider_list) ? $homepage->bn_about_slider_list : ''}}</textarea>
    {!! $errors->first('bn_about_slider_list', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_view_all_notice') ? 'has-error' : ''}}">
    <label for="en_view_all_notice" class="control-label">{{ 'En View All Notice' }}</label>
    <input class="form-control" name="en_view_all_notice" type="text" id="en_view_all_notice" value="{{ isset($homepage->en_view_all_notice) ? $homepage->en_view_all_notice : ''}}" >
    {!! $errors->first('en_view_all_notice', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_view_all_notice') ? 'has-error' : ''}}">
    <label for="bn_view_all_notice" class="control-label">{{ 'Bn View All Notice' }}</label>
    <input class="form-control" name="bn_view_all_notice" type="text" id="bn_view_all_notice" value="{{ isset($homepage->bn_view_all_notice) ? $homepage->bn_view_all_notice : ''}}" >
    {!! $errors->first('bn_view_all_notice', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('footer_logo') ? 'has-error' : ''}}">
    <label for="footer_logo" class="control-label">{{ 'Footer Logo' }}</label>
    <input class="form-control" name="footer_logo" type="file" id="footer_logo" value="{{ isset($homepage->footer_logo) ? $homepage->footer_logo : ''}}" >
    {!! $errors->first('footer_logo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_footer_logo_description') ? 'has-error' : ''}}">
    <label for="en_footer_logo_description" class="control-label">{{ 'En Footer Logo Description' }}</label>
    <input class="form-control" name="en_footer_logo_description" type="text" id="en_footer_logo_description" value="{{ isset($homepage->en_footer_logo_description) ? $homepage->en_footer_logo_description : ''}}" >
    {!! $errors->first('en_footer_logo_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_footer_logo_description') ? 'has-error' : ''}}">
    <label for="bn_footer_logo_description" class="control-label">{{ 'Bn Footer Logo Description' }}</label>
    <input class="form-control" name="bn_footer_logo_description" type="text" id="bn_footer_logo_description" value="{{ isset($homepage->bn_footer_logo_description) ? $homepage->bn_footer_logo_description : ''}}" >
    {!! $errors->first('bn_footer_logo_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('play_store_icon') ? 'has-error' : ''}}">
    <label for="play_store_icon" class="control-label">{{ 'Play Store Icon' }}</label>
    <input class="form-control" name="play_store_icon" type="file" id="play_store_icon" value="{{ isset($homepage->play_store_icon) ? $homepage->play_store_icon : ''}}" >
    {!! $errors->first('play_store_icon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('play_store_link') ? 'has-error' : ''}}">
    <label for="play_store_link" class="control-label">{{ 'Play Store Link' }}</label>
    <input class="form-control" name="play_store_link" type="text" id="play_store_link" value="{{ isset($homepage->play_store_link) ? $homepage->play_store_link : ''}}" >
    {!! $errors->first('play_store_link', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('footer_pabx') ? 'has-error' : ''}}">
    <label for="footer_pabx" class="control-label">{{ 'Footer Pabx' }}</label>
    <input class="form-control" name="footer_pabx" type="text" id="footer_pabx" value="{{ isset($homepage->footer_pabx) ? $homepage->footer_pabx : ''}}" >
    {!! $errors->first('footer_pabx', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('footer_hotline') ? 'has-error' : ''}}">
    <label for="footer_hotline" class="control-label">{{ 'Footer Hotline' }}</label>
    <input class="form-control" name="footer_hotline" type="text" id="footer_hotline" value="{{ isset($homepage->footer_hotline) ? $homepage->footer_hotline : ''}}" >
    {!! $errors->first('footer_hotline', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_foot_product') ? 'has-error' : ''}}">
    <label for="en_foot_product" class="control-label">{{ 'En Foot Product' }}</label>
    <input class="form-control" name="en_foot_product" type="text" id="en_foot_product" value="{{ isset($homepage->en_foot_product) ? $homepage->en_foot_product : ''}}" >
    {!! $errors->first('en_foot_product', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_foot_product') ? 'has-error' : ''}}">
    <label for="bn_foot_product" class="control-label">{{ 'Bn Foot Product' }}</label>
    <input class="form-control" name="bn_foot_product" type="text" id="bn_foot_product" value="{{ isset($homepage->bn_foot_product) ? $homepage->bn_foot_product : ''}}" >
    {!! $errors->first('bn_foot_product', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_foot_product_list') ? 'has-error' : ''}}">
    <label for="en_foot_product_list" class="control-label">{{ 'En Foot Product List' }}</label>
    <textarea class="form-control" rows="5" name="en_foot_product_list" type="textarea" id="en_foot_product_list" >{{ isset($homepage->en_foot_product_list) ? $homepage->en_foot_product_list : ''}}</textarea>
    {!! $errors->first('en_foot_product_list', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_foot_product_list') ? 'has-error' : ''}}">
    <label for="bn_foot_product_list" class="control-label">{{ 'Bn Foot Product List' }}</label>
    <textarea class="form-control" rows="5" name="bn_foot_product_list" type="textarea" id="bn_foot_product_list" >{{ isset($homepage->bn_foot_product_list) ? $homepage->bn_foot_product_list : ''}}</textarea>
    {!! $errors->first('bn_foot_product_list', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_foot_about') ? 'has-error' : ''}}">
    <label for="en_foot_about" class="control-label">{{ 'En Foot About' }}</label>
    <input class="form-control" name="en_foot_about" type="text" id="en_foot_about" value="{{ isset($homepage->en_foot_about) ? $homepage->en_foot_about : ''}}" >
    {!! $errors->first('en_foot_about', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_foot_about') ? 'has-error' : ''}}">
    <label for="bn_foot_about" class="control-label">{{ 'Bn Foot About' }}</label>
    <input class="form-control" name="bn_foot_about" type="text" id="bn_foot_about" value="{{ isset($homepage->bn_foot_about) ? $homepage->bn_foot_about : ''}}" >
    {!! $errors->first('bn_foot_about', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_foot_about_list') ? 'has-error' : ''}}">
    <label for="en_foot_about_list" class="control-label">{{ 'En Foot About List' }}</label>
    <textarea class="form-control" rows="5" name="en_foot_about_list" type="textarea" id="en_foot_about_list" >{{ isset($homepage->en_foot_about_list) ? $homepage->en_foot_about_list : ''}}</textarea>
    {!! $errors->first('en_foot_about_list', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_foot_about_list') ? 'has-error' : ''}}">
    <label for="bn_foot_about_list" class="control-label">{{ 'Bn Foot About List' }}</label>
    <textarea class="form-control" rows="5" name="bn_foot_about_list" type="textarea" id="bn_foot_about_list" >{{ isset($homepage->bn_foot_about_list) ? $homepage->bn_foot_about_list : ''}}</textarea>
    {!! $errors->first('bn_foot_about_list', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_foot_legal') ? 'has-error' : ''}}">
    <label for="en_foot_legal" class="control-label">{{ 'En Foot Legal' }}</label>
    <input class="form-control" name="en_foot_legal" type="text" id="en_foot_legal" value="{{ isset($homepage->en_foot_legal) ? $homepage->en_foot_legal : ''}}" >
    {!! $errors->first('en_foot_legal', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_foot_legal') ? 'has-error' : ''}}">
    <label for="bn_foot_legal" class="control-label">{{ 'Bn Foot Legal' }}</label>
    <input class="form-control" name="bn_foot_legal" type="text" id="bn_foot_legal" value="{{ isset($homepage->bn_foot_legal) ? $homepage->bn_foot_legal : ''}}" >
    {!! $errors->first('bn_foot_legal', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_foot_legal_list') ? 'has-error' : ''}}">
    <label for="en_foot_legal_list" class="control-label">{{ 'En Foot Legal List' }}</label>
    <textarea class="form-control" rows="5" name="en_foot_legal_list" type="textarea" id="en_foot_legal_list" >{{ isset($homepage->en_foot_legal_list) ? $homepage->en_foot_legal_list : ''}}</textarea>
    {!! $errors->first('en_foot_legal_list', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_foot_legal_list') ? 'has-error' : ''}}">
    <label for="bn_foot_legal_list" class="control-label">{{ 'Bn Foot Legal List' }}</label>
    <textarea class="form-control" rows="5" name="bn_foot_legal_list" type="textarea" id="bn_foot_legal_list" >{{ isset($homepage->bn_foot_legal_list) ? $homepage->bn_foot_legal_list : ''}}</textarea>
    {!! $errors->first('bn_foot_legal_list', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_all_rights_reserved') ? 'has-error' : ''}}">
    <label for="en_all_rights_reserved" class="control-label">{{ 'En All Rights Reserved' }}</label>
    <input class="form-control" name="en_all_rights_reserved" type="text" id="en_all_rights_reserved" value="{{ isset($homepage->en_all_rights_reserved) ? $homepage->en_all_rights_reserved : ''}}" >
    {!! $errors->first('en_all_rights_reserved', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_all_rights_reserved') ? 'has-error' : ''}}">
    <label for="bn_all_rights_reserved" class="control-label">{{ 'Bn All Rights Reserved' }}</label>
    <input class="form-control" name="bn_all_rights_reserved" type="text" id="bn_all_rights_reserved" value="{{ isset($homepage->bn_all_rights_reserved) ? $homepage->bn_all_rights_reserved : ''}}" >
    {!! $errors->first('bn_all_rights_reserved', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
