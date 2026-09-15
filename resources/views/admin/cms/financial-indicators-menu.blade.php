<a class="{{ (request()->is('admin/financial-highlight')) ? 'menu_header_btn_active' : 'menu_header_btn' }}" href="{{ url('/admin/financial-highlight') }}">Financial highlight</a>
<a class="{{ (request()->is('admin/financial-list')) ? 'menu_header_btn_active' : 'menu_header_btn' }}" href="{{ url('/admin/financial-list') }}">Financial List</a>
<a class="{{ (request()->is('admin/annual-report')) ? 'menu_header_btn_active' : 'menu_header_btn' }}" href="{{ url('/admin/annual-report') }}">Annual Report</a>
<a class="{{ (request()->is('admin/annual-report-list')) ? 'menu_header_btn_active' : 'menu_header_btn' }}" href="{{ url('/admin/annual-report-list') }}">Annual Report List</a>
<a class="{{ (request()->is('admin/quarterly-report')) ? 'menu_header_btn_active' : 'menu_header_btn' }}" href="{{ url('/admin/quarterly-report') }}">Quarterly Report</a>
<button class="collapsible">All Pages</button>
<div class="content">
    <a class="{{ (request()->is('admin/quarterly-report-list')) ? 'menu_header_btn_active' : 'menu_header_btn' }}" href="{{ url('/admin/quarterly-report-list') }}">Quarterly Report List</a>
    <a class="{{ (request()->is('admin/value-added-statement')) ? 'menu_header_btn_active' : 'menu_header_btn' }}" href="{{ url('/admin/value-added-statement') }}">Value Added Statement</a>
    <a class="{{ (request()->is('admin/value-added-statement-list')) ? 'menu_header_btn_active' : 'menu_header_btn' }}" href="{{ url('/admin/value-added-statement-list') }}">Value Added Statement List</a>
</div>


