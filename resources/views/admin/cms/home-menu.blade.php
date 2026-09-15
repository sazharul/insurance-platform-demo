<a class="{{ (request()->is('admin/menu')) ? 'menu_header_btn_active' : 'menu_header_btn' }}" href="{{ url('/admin/menu') }}">Menu</a>
<a class="{{ (request()->is('admin/home-page')) ? 'menu_header_btn_active' : 'menu_header_btn' }}" href="{{ url('/admin/home-page') }}">Home Page</a>
<a class="{{ (request()->is('admin/home-notice')) ? 'menu_header_btn_active' : 'menu_header_btn' }}" href="{{ url('/admin/home-notice') }}">Home Page Popup</a>

