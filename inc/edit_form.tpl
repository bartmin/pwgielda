<form action="./my_content.php" method="post" class="ui form">
    <h3 class="ui header">Dodaj ogłoszenie</h3>

    <div class="required field">
        <label for="title">Tytuł:</label>
        <input type="text" name="title" id="title" required value="{$title}">
    </div>

    <div class="required field">
        <label for="content">Treść:</label>
        <textarea name="content" id="content" required>{$content}</textarea>
    </div>

    <input type="hidden" name="csrf" value="{$csrf}" />
    <input type="hidden" name="post_id" value="{$id}" />
    <input type="submit" name="edit" value="Dodaj" class="ui button">
</form>