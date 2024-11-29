<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orvoskereső</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h1 class="mb-4">Orvoskereső</h1>

    <form method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Orvos neve..."
                   value="<?= htmlspecialchars($query ?? '') ?>">
            <button type="submit" class="btn btn-primary">Keresés</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Orvos neve</th>
            <th>Szakterület</th>
            <th>Klinikák</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($doctors)): ?>
          <?php foreach ($doctors as $doctor): ?>
                <tr>
                    <td><?= htmlspecialchars($doctor->getId()) ?></td>
                    <td><?= htmlspecialchars($doctor->getName()) ?></td>
                    <td><?= htmlspecialchars($doctor->getSpecialty()) ?></td>
                    <td><?= htmlspecialchars($doctor->getClinicsAsString()) ?></td>
                </tr>
          <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">Nincs találat</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
