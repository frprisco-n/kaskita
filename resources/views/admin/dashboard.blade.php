<h1>Admin Dashboard</h1>
<p>Selamat datang di KasKita, Admin!</p>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>