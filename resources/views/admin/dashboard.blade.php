<h1>ini dashboard admin email = {{ Auth()->guard('admin')->user()->email }}</h1>

<form action="{{ route('auth.logout') }}" method="POST">
    @csrf
    <button class="btn btn-primary" type="submit">Logout</button>
</form>
