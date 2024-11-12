<?php
require_once 'layout/dashboard.php';
require_once 'services/book/getBooks.php';
require_once 'services/book/createBook.php';
require_once 'services/book/deleteBook.php';
require_once 'services/book/editBook.php';
require_once 'services/section/getSections.php';
require_once 'utils/formatDate.php';

$books = getBooks();
$sections = getSections();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['title']) && !isset($_POST['edit'])) {
        $title = $_POST['title'];
        $synopsis = $_POST['synopsis'];
        $sectionId = $_POST['sectionId'];
        $author = $_POST['author'] ?? null;
        $publishedAt = $_POST['publishedAt'] ?? null;

        $picture = $_FILES['picture']['name'] ? $_FILES['picture']['name'] : null;

        if ($picture) {
            $uploadPath = './src/uploads/' . $picture;
            move_uploaded_file($_FILES['picture']['tmp_name'], $uploadPath);
        }

        createBook($title, $synopsis, $picture, $sectionId, $author, $publishedAt);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['delete'])) {
        $bookId = (int)$_POST['delete'];
        deleteBook($bookId);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['edit'])) {
        $bookId = (int)$_POST['edit'];
        $title = $_POST['title'];
        $synopsis = $_POST['synopsis'];
        $sectionId = $_POST['sectionId'];
        $author = $_POST['author'] ?? null;
        $publishedAt = $_POST['publishedAt'] ?? null;

        $picture = $_FILES['picture']['name'] ? $_FILES['picture']['name'] : null;

        if ($picture) {
            $uploadPath = './src/uploads/' . $picture;
            move_uploaded_file($_FILES['picture']['tmp_name'], $uploadPath);
        } else {
            $picture = null;
        }

        editBook($bookId, $title, $synopsis, $picture, $sectionId, $author, $publishedAt);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

?>

<div class="ml-72 p-6">
    <div class="flex flex-row justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-accent mb-4">Data Buku</h1>
        <button class="bg-primary hover:bg-secondary text-white font-bold py-2 px-4 rounded" onclick="toggleAddBookModal()">Tambah Buku</button>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3">Judul</th>
                    <th scope="col" class="px-6 py-3">Jenis</th>
                    <th scope="col" class="px-6 py-3">Sinopsis</th>
                    <th scope="col" class="px-6 py-3">Penulis</th>
                    <th scope="col" class="px-6 py-3">Tanggal Terbit</th>
                    <th scope="col" class="px-6 py-3">Ditambahkan Pada</th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $index => $book): ?>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?php echo $index + 1; ?></th>
                        <td class="px-6 py-4">
                            <div class="min-w-16">
                                <img src="<?php echo $book['picture'] ? './src/uploads/' . $book['picture'] : './src/images/placeholder.jpg'; ?>" alt="Cover Buku" class="w-16 h-16 rounded-md object-cover">
                            </div>
                        </td>
                        <td class="px-6 py-4"><?php echo $book['title']; ?></td>
                        <td class="px-6 py-4"><?php echo $book['sectionName']; ?></td>
                        <td class="px-6 py-4 line-clamp-3"><?php echo $book['synopsis']; ?></td>
                        <td class="px-6 py-4"><?php echo $book['author'] ?: 'Belum ditambahkan'; ?></td>
                        <td class="px-6 py-4"><?php echo formatDate($book['publishedAt']); ?></td>
                        <td class="px-6 py-4"><?php echo formatDate($book['createdAt']); ?></td>
                        <td class="px-6 py-4">
                            <div class="flex">
                                <form action="" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                                    <input type="hidden" name="delete" value="<?php echo $book['bookId']; ?>">
                                    <button type="submit" class="text-red-500 hover:underline ml-2">Hapus</button>
                                </form>
                                <button onclick="openEditBookModal('<?php echo $book['bookId']; ?>', '<?php echo $book['title']; ?>', '<?php echo $book['synopsis']; ?>', '<?php echo $book['sectionId']; ?>', '<?php echo $book['author']; ?>', '<?php echo $book['publishedAt']; ?>')" class="text-blue-500 hover:underline ml-2">Edit</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Buku -->
<div id="addBookModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-1/3">
        <h2 class="text-xl font-bold mb-4">Tambah Buku</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Judul Buku" class="w-full p-2 border border-gray-300 rounded mb-4" required>
            <textarea name="synopsis" placeholder="Sinopsis" class="w-full p-2 border border-gray-300 rounded mb-4" required></textarea>
            <input type="file" name="picture" accept="image/*" class="w-full p-2 border border-gray-300 rounded mb-4" required>

            <h3 class="text-lg font-semibold mb-2">Pilih Jenis Buku</h3>
            <div class="mb-4">
                <?php foreach ($sections as $section): ?>
                    <label class="block">
                        <input type="radio" name="sectionId" value="<?php echo $section['sectionId']; ?>" required>
                        <?php echo $section['name']; ?>
                    </label>
                <?php endforeach; ?>
            </div>

            <input type="text" name="author" placeholder="Penulis" class="w-full p-2 border border-gray-300 rounded mb-4" required>
            <input type="date" name="publishedAt" placeholder="Tanggal Terbit" class="w-full p-2 border border-gray-300 rounded mb-4" required>

            <div class="flex justify-end">
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2" onclick="toggleAddBookModal()">Batal</button>
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Buku -->
<div id="editBookModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-1/3">
        <h2 class="text-xl font-bold mb-4">Edit Buku</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="edit" id="editBookId">
            <input type="text" name="title" id="editBookTitle" placeholder="Judul Buku" class="w-full p-2 border border-gray-300 rounded mb-4" required>
            <textarea name="synopsis" id="editBookSynopsis" placeholder="Sinopsis" class="w-full p-2 border border-gray-300 rounded mb-4" required></textarea>
            <input type="file" name="picture" accept="image/*" class="w-full p-2 border border-gray-300 rounded mb-4" required>

            <h3 class="text-lg font-semibold mb-2">Pilih Jenis Buku</h3>
            <div class="mb-4">
                <?php foreach ($sections as $section): ?>
                    <label class="block">
                        <input type="radio" name="sectionId" value="<?php echo $section['sectionId']; ?>" class="editSectionId">
                        <?php echo $section['name']; ?>
                    </label>
                <?php endforeach; ?>
            </div>

            <input type="text" name="author" id="editBookAuthor" placeholder="Penulis" class="w-full p-2 border border-gray-300 rounded mb-4" required>
            <input type="date" name="publishedAt" id="editBookPublishedAt" placeholder="Tanggal Terbit" class="w-full p-2 border border-gray-300 rounded mb-4" required>

            <div class="flex justify-end">
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2" onclick="toggleEditBookModal()">Batal</button>
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script src="./src/script/book.js">    
</script>

<?php include 'layout/endDashboard.php'; ?>