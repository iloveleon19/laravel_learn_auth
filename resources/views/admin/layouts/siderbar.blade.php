<ul class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin') ? __('active'):'' }} text-muted" href="{{ route('admin') }}">{{ __('Home') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link dropdown-toggle text-muted" data-toggle="collapse" href="#product-submenu" role="button" aria-haspopup="true" aria-expanded="{{ Request::segment(2)=='product' ? _('true'):__('false') }}">
            {{ __('Product') }}
        </a>
        <div class="collapse {{ Request::segment(2)=='product' ? __('show'):'' }}" id="product-submenu">
            <a class="dropdown-item {{ Request::is('admin/product/create') ? __('active'):'' }}" href="{{ route('product.create') }}">{{ __('add Product') }}</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link dropdown-toggle text-muted" data-toggle="collapse" href="#discount-submenu" role="button" aria-haspopup="true" aria-expanded="{{ Request::segment(2)=='discount' ? __('true'):__('false') }}">
            {{ __('Discount') }}
        </a>
        <div class="collapse {{ Request::segment(2)=='discount' ? __("show"):'' }}" id="discount-submenu">
            <a class="dropdown-item {{ Request::is('admin/discount') ? __('active'):'' }}" href="{{ route('discount.index') }}">{{ __('discount list') }}</a>
            <a class="dropdown-item {{ Request::is('admin/discount/create') ? __('active'):'' }}" href="{{ route('discount.create') }}">{{ __('add discount') }}</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link dropdown-toggle text-muted" data-toggle="collapse" href="#order-submenu" role="button" aria-haspopup="true" aria-expanded="{{ Request::segment(2)=='order' ? __('true'):__('false') }}">
            {{ __('Order') }}
        </a>
        <div class="collapse {{ Request::segment(2)=='order' ? __("show"):'' }}" id="order-submenu">
            <a class="dropdown-item {{ Request::is('admin/order') ? __('active'):'' }}" href="{{ route('order.index') }}">{{ __('order list') }}</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link dropdown-toggle text-muted" data-toggle="collapse" href="#member-submenu" role="button" aria-haspopup="true" aria-expanded="{{ Request::segment(2)=='member' ? __('true'):__('false') }}">
            {{ __('Member') }}
        </a>
        <div class="collapse {{ Request::segment(2)=='member' ? __('show'):'' }}" id="member-submenu">
            <a class="dropdown-item {{ Request::is('admin/member') ? __('active'):'' }}" href="{{ route('member.index') }}">{{ __('Member list') }}</a>
        </div>
    </li>
</ul>
