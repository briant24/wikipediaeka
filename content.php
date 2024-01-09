<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<style>
table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
}

td {
    border: 1px solid transparent;
    vertical-align: top;
}

td.left {
    width: 20%;
    margin: 0 auto;
}

td.right {
    width: 80%;
    padding: 10px;
    border-color: #ddd;
    border-style: solid;
    border-width: 1px;
    text-align: justify;
}

.img-content {
    max-width: 200px;
    max-height: 200px;
    object-fit: cover;
    display: block;
    margin: 0 auto;
}

h2 {
    color: #333;
    margin-bottom: 10px;
    font-weight: normal;
}

a {
    font-size: 17px;
}

p {
    font-size: 17px;
    margin: 0;
    font-weight: normal;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
    -webkit-line-clamp: 3;
}
</style>

<body>
    <div id="mw-content-text" class="mw-body-content">
        <div class="mw-content-ltr mw-parser-output" lang="id" dir="ltr">
            <div class="mp-footer">
                <div class="mp-footer&#95;_main">
                    <div class="mp-content-box-other">
                        <h2 class="mp-content-box-other&#95;_header">
                            <span class="mw-headline" id="Artikel_Terbaru">
                                <div class="mp-content-box-other&#95;_header-icon">
                                    <span typeof="mw:File">
                                        <span><img alt=""
                                                src="//upload.wikimedia.org/wikipedia/commons/thumb/1/14/Wikimedia-logo-circle.svg/38px-Wikimedia-logo-circle.svg.png"
                                                decoding="async" width="38" height="38" class="mw-file-element"
                                                srcset="//upload.wikimedia.org/wikipedia/commons/thumb/1/14/Wikimedia-logo-circle.svg/57px-Wikimedia-logo-circle.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/1/14/Wikimedia-logo-circle.svg/76px-Wikimedia-logo-circle.svg.png 2x"
                                                data-file-width="700" data-file-height="700" />
                                        </span>
                                    </span>
                                </div>
                                <div class="mp-content-box-other&#95;_header-text">Artikel Terbaru</div>
                            </span>
                        </h2>
                    </div>
                    <div class="mp-content-box-other&#95;_content">
                        <?php
                                    include 'api.php';
                                    $result = $conn->query("SELECT * FROM articles ORDER BY created_at DESC");
                                    if ($result->num_rows > 0) {
                                        echo "<ul>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo"<table>";
                                            echo "<tr>";
                                            echo "<td class='left'>";
                                            if (!empty($row['image_path'])) {
                                                echo '<img src="' . $row['image_path'] . '" class="img-content" alt="Article Image"">';
                                            }
                                            echo "</td>";
                                            echo "<td class='right'>";
                                            echo "<h2>" . $row['judul'] . "</h2>";
                                            echo "<p>" . $row['content'] . "</p>";
                                            echo "<p>Author: " . $row['penulis'] . "</p>";
                                            echo '<a href="edit-artikel-page.php?id=' . $row['id'] . '">Edit</a>';
                                            echo '<br>';
                                            echo '<a href="deletepost.php?id=' . $row['id'] . '">Hapus</a>';
                                            echo "</td>";
                                            echo "</tr>";
                                            echo "</table>";
                                        }
                                        echo "</ul>";
                                    } else {
                                        echo "No articles found.";
                                    }
                                    $conn->close();
                                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>