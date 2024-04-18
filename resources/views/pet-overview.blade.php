<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huisdieroverzicht</title>
</head>
<body>
    <h1>All Pets</h1>
    <div class="container">
        <div class="row">
            @foreach ($huisdiers as $huisdier)
                <div class="col-md-4 mb-3">
                    <x-huisdier.card :pet="$huisdier" />
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
