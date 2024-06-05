<?php require_once "indexx.php";?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>База данных</title>

    <link rel="shortcut icon" href="img/SvxkgshX5Dk.jpg" type="image/jpg">
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div style="display: flex; padding: 40px;">
        <div style="flex: 1;">

            <div class="color_class">
                <div class="box">
                    <img id="img" class="displayed" src="img/no_picture.jpg" alt="img/no_picture.jpg">
                    <br />
                    <div class="about_part">
                        
                        <ul>
                            <li>
                                <div id="name" class="name_text">Name</div>
                            </li>
                            <li>
                                <div id="brand">Brand</div>
                            </li>
                            <li>
                                <div id="price">Price</div>
                            </li>
                            <li>
                                <div id="country">Country</div>
                            </li>
                            <li>
                                <div id="color">Color</div>
                            </li>
                            <li>
                                <div id="type" style="">Type</div>
                            </li>
                            <li>
                                <div id="url">URL</div>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div style="flex: 1;">
            <div class="container">
                <div class="box_el">
                    <ul>
                        <?php foreach($data as $d): ?>
                        <li>
                            <div id="<?= $d['id']?>" class="clickable">
                                <div class="little_color"></div>
                                <div style="white-space: pre; font-weight: bold;"><?= $d['name']?></div>
                                <div style="color: grey; white-space: pre;"> by <?= $d['brand']?></div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <script src="script.js" charset="UTF-8"></script>


</body>
</html>