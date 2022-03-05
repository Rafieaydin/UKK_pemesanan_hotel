<h1>ini resepsionis {{ Auth::getDefaultDriver() }}</h1>

<form action="{{ route('auth.logout') }}" method="POST">
    @csrf
    <button class="btn btn-primary" type="submit">Logout</button>
</form>
