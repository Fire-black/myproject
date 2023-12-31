<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
    <title>Блог</title>
</head>
    <body>
        <section>
            <div class="container">
                <!-- main block -->
                <?php include 'app/views/'.$content_view; ?>
                <!-- end main block -->
            </div>
        </section>
        <footer>
            <div class="row mt-5 fs-6">
                <div class="col-12 text-center">
                    &copy; Sergey Mousikhin, 2023
                </div>
            </div>
        </footer>
        <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    </body>
</html>