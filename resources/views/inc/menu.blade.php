<nav class="navbar navbar-expand-lg py-3 navbar-dark bg-dark shadow-sm">
  <div class="container">
    <a href="#" class="navbar-brand">
      <!-- Logo Image -->
      <!-- <img src="https://res.cloudinary.com/mhmd/image/upload/v1557368579/logo_iqjuay.png" width="45" alt="" class="d-inline-block align-middle mr-2"> -->
      <!-- Logo Text -->
      <span class="font-weight-bold"><h2>$implificando</h2></span>
    </a>

    <div class="menu-right">
      <ul class="navbar-nav mr-auto">
        <ul class="nav-item active"><a href="{{ route('manager') }}" class="nav-link">Gerenciador</a></ul>
        <ul class="nav-item active"><a href="{{ route('investment') }}" class="nav-link">Investimentos</a></ul>
        <ul class="nav-item active"><a href="{{ route('profile') }}" class="nav-link">Perfil</a></ul>
        <ul class="nav-item active"><a href="{{ route('logout') }}" class="nav-link">Logout </a></ul>
      </ul>
    </div>
  </div>
</nav>
