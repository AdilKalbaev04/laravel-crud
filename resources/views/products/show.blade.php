<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Продукт</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href="{{ route('products.index') }}">Магазин</a>
        </div>
    </nav>
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ $product->name }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text">Цена: {{ $product->price }} руб.</p>
                    <p class="card-text">Рейтинг: {{ $product->rating }}</p>
                    <form action="{{ route('products.rate', $product->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="rating" class="form-label">Ваш рейтинг:</label>
                            <select name="rating" id="rating" class="form-select" required>
                                <option value="1">1 звезда</option>
                                <option value="2">2 звезды</option>
                                <option value="3">3 звезды</option>
                                <option value="4">4 звезды</option>
                                <option value="5">5 звезд</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Оценить</button>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Редактировать</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76A8fCgtSIsQltt+KY00Nv3G5r7bLeYem5vC3N0cpM5j7OcsgF1wtAby6pGFM90" crossorigin="anonymous"></script>
</body>
</html>
