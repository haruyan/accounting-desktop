<a class="nav-link" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
Logout
 </a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>


<a class="nav-link" href="{{ route('logout') }}" id="userDropdown" role="button" 
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
  <span class="mr-2 d-none d-lg-inline text-gray-600 small">
  Logout <i class="fas fa-arrow-right fa-sm fa-fw mr-2 text-gray"></i>
  </span>
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{-- {{ csrf_field() }} --}}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<meta name="csrf-token" content="{{ csrf_token() }}" />