<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php require_once 'nav.php'; ?>
    </header>
    <main>
        <div class="frontbild">
            <h1>Endure and Survive</h1>
            <img src="bilder/frontpage.jpg" alt="Ellie hiding behind a tree">
        </div>
        <section class="fronttext">
            <p>Welcome to our website dedicated to The Last of Us, a critically acclaimed action-adventure game 
                developed by Naughty Dog.<br><br>Here, you can explore the rich story, meet the unforgettable characters, 
                and discover the unique world of The Last of Us. Whether you're a longtime fan or new to the series, 
                we invite you to dive into the post-apocalyptic universe where survival is a daily struggle and every decision matters.
                <br><br>
                Join us as we delve into the heart of this unforgettable journey.
            </p>
        </section>
        <div class="frontknappar">
            <a href="story.php" class="buttON">The Story</a>
            <a href="char.php" class="buttON">The Characters</a>
        </div>
    </main>
    <footer>
        <h2>© 2026 <a href="https://github.com/Filo07">Filip Bäckman</a></h2>
    </footer>
</body>
</html>