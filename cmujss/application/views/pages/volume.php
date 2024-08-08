<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $volume['vol_name']; ?> Articles</title>
    <style>
        .card-body {
            background-color: white !important;
        }
        * {
            color: black !important;
        }
        h3 {
            color: black !important;
        }
        h5 {
            color: black !important;
        }
        p {
            color: black !important;
        }
    </style>
</head>
<body>
<div style="background-color: white !important;" class="space-sm bg-light-subtle" id="home">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h3 style="color: black !important;" class="section-title mb-3" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    Latest Issues
                </h3>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-lg-20 col-md-20">
                                        <?php if (!empty($articles)): ?>
                                            <?php foreach ($articles as $article): ?>
                                                <div class="card mb-2">
                                                <div class="card-body">
                                                <h5 class="card-title fs-5"><?php echo $article['title']; ?></h5>
                                                <br>
                                                <p><strong>Author/s:</strong> <?php echo $article['author']; ?> <br>
                                                <strong>DOI:</strong> <a href="<?php echo $article['doi']; ?>" style="color: blue !important"><?php echo $article['doi']; ?></a> <br>
                                                <strong>Keywords: </strong> <?php echo $article['keywords']; ?></p>
                                                <p class="card-text text-justify" style="text-align: justify;">
                                                    <h6 style="color: black !important;">Abstract:</h6>
                                                    <?php
                                                    $abstract = $article['abstract'];
                                                    $max_length = 250; // Max length for the abstract
                                                    if (strlen($abstract) > $max_length) {
                                                        $abstract = substr($abstract, 0, $max_length) . '...';
                                                    }
                                                    echo $abstract;
                                                    ?><a href="<?= base_url('pages/article/' . $article['articleid']); ?>" style="color: blue !important;">Read more</a>
                                                </p>
                                            </div>
                                                    <div class="card-body button-group d-flex align-items-stretch p-10">
                                                        <div class="ms-auto">
                                                            <a href="<?php echo base_url('assets/articles/' . $article['filename']); ?>" target="_blank" class="btn bg-secondary-subtle text-secondary px-2 d-flex align-items-center flex-column flex-sm-row" style="color: black !important;">
                                                                <iconify-icon icon="bi:file-earmark-pdf" width="24" height="24"></iconify-icon>
                                                                &nbsp; PDF
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <p>No articles found in this volume.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 style="text-align: center;">ANNOUNCEMENTS</h3>
                        <br>
                        <ul style="text-align:justify;">
                            <li>Ut consequat, quam a lobortis elementum, mauris felis ultricies ante, sit amet dapibus quam tortor sit amet mi.</li>
                            <br>
                            <li>Pellentesque vel venenatis nisi. Ut scelerisque tortor ut maximus aliquam.</li>
                            <br>
                            <li>Ut consequat, quam a lobortis elementum, mauris felis ultricies ante, sit amet dapibus quam tortor sit amet mi.</li>
                            <br>
                            <li>Pellentesque vel venenatis nisi. Ut scelerisque tortor ut maximus aliquam.</li>
                        </ul>
                        <br>
                        <h3 style="text-align: center;">VOLUMES</h3>
                        <br>
                        <ul style="text-align: center;">
                            <?php if (!empty($volumes)): ?>
                                <?php foreach ($volumes as $volume): ?>
                                    <li>
                                        <a href="<?php echo site_url('pages/view_volume/' . $volume['volumeid']); ?>" style="color: black !important">
                                            <?php echo $volume['vol_name']; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li>No volumes found.</li>
                            <?php endif; ?>
                        </ul>
                        <br>
                        <h3 style="text-align: center;">NEWS</h3>
                        <br>
                        <ul style="text-align:justify;">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat, eros a sodales gravida, sem dui rutrum enim, vel vestibulum nunc nisl sed arcu. Proin a rutrum elit, id eleifend mauris. Nam ut urna pharetra eros congue aliquam. Quisque blandit augue eu quam rutrum, sed imperdiet augue euismod. Fusce eu augue eget lectus placerat aliquam vitae at dui. Sed nulla diam, imperdiet eu odio sit amet, auctor mollis massa.</p>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-justify {
        text-align: justify;
    }
</style>
</body>
</html>
