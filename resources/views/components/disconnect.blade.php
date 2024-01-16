<form action="{{ route('users.logout') }}" method="post">
    @csrf
    <input type="submit" value="Desconectar" id="disconnect"/>
</form>