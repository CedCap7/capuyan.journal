<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Articles</title>
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
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="font-weight-medium shadow-none position-relative overflow-hidden mb-4">
            <div class="d-sm-flex d-block justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold text-uppercase">Article Management</h5>
                <nav aria-label="breadcrumb" class="d-flex align-items-center">
                    <ol class="breadcrumb d-flex align-items-center">
                        <li class="breadcrumb-item">
                            <a class="text-decoration-none" href="home">Home</a>
                        </li>
                        <li class="breadcrumb-item text-primary" aria-current="page">
                            Articles
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="widget-content searchable-container list">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-4 col-xl-3">
                            <form class="position-relative">
                                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search Articles..." onkeyup="searchArticles()" />
                            </form>
                        </div>
                        <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                            <button class="btn bg-secondary-subtle text-secondary px-3 align-items-end" onclick="location.href='<?= base_url('articles/add'); ?>'" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Articles">
                                Add Article
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive mb-4">
                            <table class="table table-striped user-table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Volume</th>
                                        <th>Article</th>
                                        <th>Keywords</th>
                                        <th>Filename</th>
                                        <th>Author/s</th>
                                        <!-- <th>Abstract</th> -->
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="search-results">
                                    <?php foreach ($articles as $article): ?>
                                    <tr>
                                        <td style='vertical-align:middle; width: 15%;'>
                                            <?php echo $article['vol_name']; ?>
                                        </td>
                                        <td style='vertical-align:middle; width: 20%;'><?php echo $article['title']; ?></td>
                                        <td style='vertical-align:middle; width: 15%;'><?php echo $article['keywords']; ?></td>
                                        <td style='vertical-align:middle;' class="px-12 py-4">
                                            <a href="<?php echo base_url('assets/articles/' . $article['filename']); ?>" class="text-green-600 hover:underline"><?php echo $article['filename']; ?></a>
                                        </td>
                                        <td style='vertical-align:middle; width: 15%;'><?php echo $article['author']; ?></td>
                                        <!-- <td style='vertical-align:middle; width: 15%;'><?php
                                    $abstract = $article['abstract'];
                                    $max_length = 50; // Max length for the abstract
                                    if (strlen($abstract) > $max_length) {
                                        $abstract = substr($abstract, 0, $max_length) . '...';
                                    }
                                    echo $abstract;
                                    ?></td> -->
                                        <td style='vertical-align:middle; text-align: center;'>
                                            <?php if ($article['published'] == 0): ?>
                                                <span class="badge rounded-pill bg-primary-subtle text-warning fw-semibold fs-2">
                                                    Unpublished
                                                </span>
                                            <?php elseif ($article['published'] == 1): ?>
                                                <span class="badge rounded-pill bg-success-subtle text-success fw-semibold fs-2">
                                                    Published
                                                </span>
                                            <?php else: ?>
                                                <span class="badge rounded-pill bg-primary-subtle text-warning fw-semibold fs-2">
                                                    Archived
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td style='text-align: center; vertical-align:middle;'>
                                            <a href="<?= base_url('articles/view_article/' . $article['articleid']); ?>"><iconify-icon icon="solar:eye-linear" class="iconify-md"></iconify-icon></a>
                                            <a href="<?= base_url('articles/update_article/' .$article['articleid']); ?>" data-bs-tooltip="tooltip" data-bs-placement="top" title="Edit Article"><iconify-icon icon="tabler:edit" class="iconify-md"></iconify-icon></a>
                                            <a href="<?= base_url('articles/delete/' .$article['articleid']); ?>" class="btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" data-bs-tooltip="tooltip" data-bs-placement="top" title="Delete Article">
                                                <iconify-icon icon="solar:trash-bin-trash-outline" class="iconify-md"></iconify-icon>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php if (empty($articles)): ?>
                                <p class="text-center">No articles found matching your search criteria.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
