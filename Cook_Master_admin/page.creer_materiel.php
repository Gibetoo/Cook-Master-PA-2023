<?php
session_start();

require_once 'entities/users/verif_connecter.php';

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>

    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="row">
                <form action="entities/users/new_materiel.php" method="POST" enctype="multipart/form-data">
                    <h1 class="text-center">Créé un matériel</h1>
                    <div class="mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Nom du matériel</label>
                        <input type="text" name="nom_ma" class="form-control" id="exampleFormControlInput1" placeholder="Name">
                    </div>
                    <div class="mt-3">
                        <label for="Image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="Image" accept="image/jpg, image/gif, image/png, image/jpeg">
                    </div>
                    <div class="mt-3">
                        <label for="inputPassword5" class="form-label">Prix</label>
                        <input type="number" step="0.25" value="0" min="0" name="prix" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
                    </div>
                    <div class="mt-3">
                        <label for="inputPassword5" class="form-label">Description</label>
                        <textarea type="text" size="30px" maxlength="400" onkeyup="countCharacters(this)" name="description" id="inputPassword5" class="form-control" placeholder="Description" aria-labelledby="passwordHelpBlock"></textarea>
                        <span id="characterCount">400</span> caractères restants
                    </div>
                    <div class="mt-5 text-center">
                        <button type="submit" class="btn-menu animated fadeInUp scrollto" style="background-color: #cda45e;border-color: #cda45e;">Créé</button>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

<script>
    function countCharacters(textarea) {
        var maxLength = parseInt(textarea.getAttribute("maxlength"));
        var currentLength = textarea.value.length;
        var charactersRemaining = maxLength - currentLength;
        document.getElementById("characterCount").textContent = charactersRemaining;
    }
</script>

</html>