<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Pontuação</title>
</head>
<body>
<h1>Atualizar Pontuação</h1>
<form method="post" action="/users/update-score">
    <label for="user-id">ID do Usuário:</label>
    <input type="text" id="user-id" name="user_id">
    <br>
    <label for="points">Pontos a Adicionar:</label>
    <input type="text" id="points" name="points">
    <br>
    <button type="submit">Atualizar</button>
</form>
</body>
</html>
