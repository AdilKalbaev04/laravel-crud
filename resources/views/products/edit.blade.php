<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Редактировать продукт</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href="{{ route('products.index') }}">Магазин</a>
        </div>
    </nav>
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Редактировать продукт</h3>
                <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Название</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Цена</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                    </div>
                    <div class="form-group">
                        <label for="rating">Рейтинг (от 1 до 5)</label>
                        <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" value="{{ $product->rating }}" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Изображение</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>
                    @if ($product->image)
                        <div class="form-group mt-3">
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                        </div>
                    @endif
                    <br>
                    <button type="submit" class="btn btn-primary">Обновить продукт</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
