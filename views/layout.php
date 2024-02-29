<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EvoSport Nutrition</title>
    <link rel="stylesheet" href="/build/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <?php echo $content; ?>

    <?php
    // Conditional JS
    echo $script ?? '';
    
    ?>

</body>

</html>