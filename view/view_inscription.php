<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/style/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <h3>Ajouter un utilisateur:</h3>
    <form action="" method="post">
        <p><input type="text" name="name_util" placeholder="LAITIER"></p>
        <p><input type="text" name="first_name_util" placeholder="fabieng"></p>
        <p><input type="email" name="mail_util" placeholder="fabien@hotmail.com" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" 
        name="email" required></p>
        <p><input type="password" name="pwd_util" required placeholder="12345"></p>
        <p><input type="submit" value="Ajouter" name="addUser"></p>
        <label for="admin">Administrateur ?</label>
        <input type="checkbox" name="Admin">
    </form>
</body>
</html>