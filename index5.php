<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Game Jepang</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      color: black;
    }

    header {
      display: flex;
      align-items: center;
      background-color: #bfdbfe;
      padding: 12px 20px;
    }

    .logo-container {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .logo-container img {
      height: 48px;
      width: 48px;
      object-fit: contain;
    }

    nav {
      margin-left: auto;
      display: flex;
      gap: 40px;
      font-size: 16px;
      font-weight: 500;
    }

    nav a {
      text-decoration: none;
      color: black;
    }

    nav a:hover {
      text-decoration: underline;
    }

    main {
      position: relative;
      min-height: 100vh;
      padding: 40px 20px;
      background-image: url('https://japanbite.com/cdn/shop/articles/jpg_ab0c83b3-a9dd-45b9-a7ed-7691818ab9f0.jpg?v=1746317154');
      background-size: cover;
      background-position: center;
    }

    main::before {
      content: "";
      position: absolute;
      inset: 0;
      background-color: rgba(255, 255, 255, 0.6);
      z-index: 0;
    }

    .main-content {
      position: relative;
      z-index: 1;
      max-width: 1200px;
      margin: 0 auto;
    }

    .tab-buttons {
      display: flex;
      gap: 24px;
      border-bottom: 1px solid #ccc;
      margin-bottom: 24px;
    }

    .tab-buttons button {
      padding: 10px;
      font-weight: bold;
      background: none;
      border: none;
      border-bottom: 2px solid transparent;
      cursor: pointer;
    }

    .tab-buttons button.active {
      border-bottom: 2px solid black;
    }

    .tab-content {
      display: none;
    }

    .tab-content.active {
      display: block;
      animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>
  <header>
    <div class="logo-container">
      <a href="index.php"><img src="logo.png" alt="Logo Jepang" /></a>
      <img src="https://pngimg.com/d/flags_PNG14639.png" alt="Bendera Jepang" />
    </div>
    <nav>
      <a href="index2.php">Budaya</a>
      <a href="index3.php">Makanan</a>
      <a href="index4.php">Minuman</a>
      <a href="index5.php">Game</a>
    </nav>
  </header>

  <main>
    <div class="main-content">
      <!-- Tab Navigation -->
      <div class="tab-buttons">
        <button class="tab-btn active" data-tab="game_pc">Game PC</button>
        <button class="tab-btn" data-tab="game_android">Game Android</button>
        <button class="tab-btn" data-tab="boardgame">BoardGame</button>
      </div>

      <!-- Tab Content Sections -->
      <div id="game_pc" class="tab-content active">
        <?php $_GET['kategori'] = 'game_pc'; include 'get_game.php'; ?>
      </div>

      <div id="game_android" class="tab-content">
        <?php $_GET['kategori'] = 'game_android'; include 'get_game.php'; ?>
      </div>

      <div id="boardgame" class="tab-content">
        <?php $_GET['kategori'] = 'boardgame'; include 'get_game.php'; ?>
      </div>
    </div>
  </main>

  <script>
    const buttons = document.querySelectorAll('.tab-btn');
    const tabs = document.querySelectorAll('.tab-content');

    buttons.forEach(button => {
      button.addEventListener('click', () => {
        const target = button.getAttribute('data-tab');

        buttons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        tabs.forEach(tab => {
          if (tab.id === target) {
            tab.classList.add('active');
          } else {
            tab.classList.remove('active');
          }
        });
      });
    });
  </script>
</body>

</html>
