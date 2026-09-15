<a class="{{ request()->is('admin/manage-underwriting') ? 'menu_header_btn_active' : 'menu_header_btn' }}"
    href="{{ url('/admin/manage-underwriting') }}">Underwriting</a>
<a class="{{ request()->is('admin/manage-reinsurance') ? 'menu_header_btn_active' : 'menu_header_btn' }}"
    href="{{ url('/admin/manage-reinsurance') }}">Re-insurance</a>
<a class="{{ request()->is('admin/manage-reinsurance-type') ? 'menu_header_btn_active' : 'menu_header_btn' }}"
    href="{{ url('/admin/manage-reinsurance-type') }}">Re-insurance Type</a>
<a class="{{ request()->is('admin/manage-reinsurance-coverage') ? 'menu_header_btn_active' : 'menu_header_btn' }}"
    href="{{ url('/admin/manage-reinsurance-coverage') }}">Re-insurance Coverage</a>
    <a class="{{ request()->is('admin/manage-reinsurance-broker') ? 'menu_header_btn_active' : 'menu_header_btn' }}"
        href="{{ url('/admin/manage-reinsurance-broker') }}">Re-insurance Broker</a>
<button class="collapsible">All Pages</button>
<div class="content">
    <a class="{{ request()->is('admin/manage-claim') ? 'menu_header_btn_active' : 'menu_header_btn' }}"
        href="{{ url('/admin/manage-claim') }}">Claim</a>
    <a class="{{ request()->is('admin/manage-claim-money') ? 'menu_header_btn_active' : 'menu_header_btn' }}"
        href="{{ url('/admin/manage-claim-money') }}">Claim Money</a>
    <a class="{{ request()->is('admin/it-infrastructure') ? 'menu_header_btn_active' : 'menu_header_btn' }}"
        href="{{ url('/admin/it-infrastructure') }}">It Infrastructure</a>
    <a class="{{ request()->is('admin/citizen-charter') ? 'menu_header_btn_active' : 'menu_header_btn' }}"
        href="{{ url('/admin/citizen-charter') }}">Citizen Charter</a>

</div>
