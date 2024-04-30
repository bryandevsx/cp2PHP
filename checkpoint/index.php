<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Motos</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center my-5">Cadastre sua moto:</h1>
        <form action="incluir.php" method="POST">
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo:</label>
                <input type="text" class="form-control" id="modelo" name="modelo">
            </div>
            <div class="mb-3">
                <label for="cc" class="form-label">CC:</label>
                <input type="text" class="form-control" id="cc" name="cc">
            </div>
            <div class="mb-3">
                <label for="cv" class="form-label">CV:</label>
                <input type="text" class="form-control" id="cv" name="cv">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Gravar</button>
            </div>

        </form>

        <?php
        if (isset($_GET["mensagem"])) {
            switch ($_GET["mensagem"]) {
                case 1:
                    echo "<div class='alert alert-success mt-3'>Moto cadastrada com sucesso!</div>";
                    break;
                case 2:
                    echo "<div class='alert alert-danger mt-3'>Não foi possível cadastrar sua moto!.</div>";
                    break;
            }
        }
        ?>

        <h1 class="text-center my-5">Motos cadastradas:</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Modelo</th>
                    <th>CC</th>
                    <th>CV</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include ("conexao.php");
                $sql = "SELECT id, modelo, cc, cv FROM moto";
                $seleciona = mysqli_query($conexao, $sql);
                while ($campo = mysqli_fetch_array($seleciona)) {
                    ?>
                    <tr>
                        <td><?= $campo["id"] ?></td>
                        <td><?= $campo["modelo"] ?></td>
                        <td><?= $campo["cc"] ?></td>
                        <td><?= $campo["cv"] ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>