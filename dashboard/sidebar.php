<?php include __DIR__ . '/../login-logic.php' ?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
  <a class="navbar-brand" href="#">Admin Panel</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="adminNavbar">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <a href="dashboard.php" class="nav-link text-white">📊 Dashboard</a>
      </li>
      <li class="nav-item">
        <a href="manage.php" class="nav-link text-white">🛠 Manage Services</a>
      </li>
      <li class="nav-item">
        <a href="orders.php" class="nav-link text-white">📦 Orders</a>
      </li>
      <li class="nav-item">
        <a href="mng-clients.php" class="nav-link text-white">👥 Manage Clients</a>
      </li>
      <li class="nav-item">
        <a href="../logout-logic.php" class="nav-link text-white">
          <b>LOGOUT 🚪</b> 
        </a>
      </li>
    </ul>
  </div>
</nav>

