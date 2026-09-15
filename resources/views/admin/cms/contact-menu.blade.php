<a class="{{ (request()->is('admin/contact-us')) ? 'menu_header_btn_active' : 'menu_header_btn' }}" href="{{ url('/admin/contact-us') }}">Contact Us</a>
<a class="{{ (request()->is('admin/contact-messages')) ? 'menu_header_btn_active' : 'menu_header_btn' }}" href="{{ url('/admin/contact-messages') }}">Contact Message</a>
<a class="{{ (request()->is('admin/complain-feedback')) ? 'menu_header_btn_active' : 'menu_header_btn' }}" href="{{ url('/admin/complain-feedback') }}">Report & Complains</a>
<a class="{{ (request()->is('admin/complain-feedback-page')) ? 'menu_header_btn_active' : 'menu_header_btn' }}" href="{{ url('/admin/complain-feedback-page') }}">Report & Complains Page</a>

