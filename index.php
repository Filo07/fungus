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
        <div class="frontknappar">
            <button type="submit" formaction="merch.php">Shop Merch</button>
            <button type="submit" formaction="story.php">Explore The Story</button>
        </div>
    </main>
    <footer>
        <h2>© 2026 <a href="https://github.com/Filo07">Filip Bäckman</a></h2>
    </footer>
</body>
</html>