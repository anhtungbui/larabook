<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
        }

        .wrapper {
            width: 80%;
        }

        /* Header */
        .header {
            border-bottom: 1px solid #e4e6eb;
        }

        .header__link {
            text-decoration: none;
            color: #0061f2;
        }

        /* Main */
        .main {
            padding-bottom: 50px;
        }

        .card {
            border: 1px solid #e4e6eb;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            padding: 20px 0;
        }

        .card__image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
        }

        .card__button {
            background: #0061f2;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            padding: 10px 20px;
        }

        .card__button:hover {
            background: #0061f2d7;
        }

        /* Footer */
        .footer {
            border-top: 1px solid #e4e6eb;
            text-align: center;
            padding: 10px 0;
        }

        .footer__text {
            font-size: 0.85rem;
        }

        .footer__link {
            color: #999898;
        }
    </style>

    <title>Larabook Notification</title>
</head>
<body class="container">
    <div class="wrapper">
        <header class="header">
            <nav>
                <a href="#" class="header__link">
                    <h2>Larabook</h2>
                </a>
            </nav>
        </header>
        <main class="main">
            </p><strong>{{ $follower->name }}</strong> started following you on Larabook 👀<p>
            <div class="card">
                <img src="http://larabook.test/storage/{{ $follower->profile->avatar_image }}" alt="user avatar" class="card__image">
                <h3>{{ $follower->name }}</h3>
                <a href="http://larabook.test/{{ $follower->username }}" class="card__button">See Profile</a>
            </div>
        </main>
        <footer class="footer">
            <p class="footer__text">Want to change how you receive these emails?<p>
            <p class="footer__text">You can update your nofication settings in <a href="#" class="footer__link">here</a></p>
            <a href="/" class="footer__link">Larabook &copy; 2020 </a>
            &middot;
            <a href="https://www.anhtungbui.com" class="footer__link">by Anh Tung Bui</a>
        </footer>
    </div>
   
</body>
</html>