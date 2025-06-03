<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pesona Jepang</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #bfdbfe;
            padding: 12px 20px;
        }

        header .nav-links {
            display: flex;
            gap: 40px;
            font-size: 16px;
            font-weight: 500;
        }

        header .nav-links a {
            color: black;
            text-decoration: none;
        }

        header .nav-links a:hover {
            text-decoration: underline;
        }

        header nav {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        header img {
            height: 48px;
            width: 48px;
            object-fit: contain;
        }

        main {
            position: relative;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding-top: 40px;
            padding-left: 20px;
            padding-right: 20px;
            color: black;
            text-align: center;
            background-image: url('https://japanbite.com/cdn/shop/articles/jpg_ab0c83b3-a9dd-45b9-a7ed-7691818ab9f0.jpg?v=1746317154');
            background-size: cover;
            background-position: center;
        }

        main::before {
            content: "";
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 0;
        }

        .main-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            width: 100%;
        }

        .main-content h1 {
            color: #dc2626;
            font-weight: 800;
            font-size: 48px;
            margin-bottom: 20px;
        }

        .main-content p {
            padding: 20px;
            font-weight: 600;
            font-size: 18px;
            text-align: justify;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <header>
        <!-- Logo dan bendera di kiri -->
        <nav>
            <a href="index.php"><img src="logo.png" alt="Logo Jepang" /></a>
            <img src="https://pngimg.com/d/flags_PNG14639.png" alt="Bendera Jepang" />
        </nav>

        <!-- Menu navigasi di kanan -->
        <div class="nav-links">
            <a href="index2.php">Budaya</a>
            <a href="index3.php">Makanan</a>
            <a href="index4.php">Minuman</a>
            <a href="index5.php">Game</a>
        </div>
    </header>

    <main>
        <div class="main-content">
            <h1>Pesona Jepang</h1>
            <p>
                Selamat datang di Pesona Jepang – tempat di mana kamu bisa menjelajahi kekayaan budaya, cita rasa
                kuliner unik, dan keindahan alam Jepang yang memukau. Kami menghadirkan pengalaman virtual ke negeri
                sakura dalam satu halaman penuh warna dan informasi.
            </p>
        </div>
    </main>
</body>

</html>
