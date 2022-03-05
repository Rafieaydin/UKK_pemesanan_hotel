<h1>ini dashboard tamu {{ Auth::getDefaultDriver() }}</h1>

<form action="{{ route('auth.logout') }}" method="POST">
    @csrf
    <button class="btn btn-primary" type="submit">Logout</button>
</form>
