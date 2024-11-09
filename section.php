<?php
require_once 'layout/dashboard.php';
require_once 'services/section/getSections.php';
require_once 'services/section/createSection.php';
require_once 'services/section/deleteSection.php';
require_once 'services/section/editSection.php';
require_once 'utils/formatDate.php';

$sections = getSections();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && !isset($_POST['edit'])) {
        $name = $_POST['name'];
        createSection($name);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['delete'])) {
        $sectionId = (int)$_POST['delete'];
        deleteSection($sectionId);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['edit'])) {
        $sectionId = (int)$_POST['edit'];
        $name = $_POST['name'];
        editSection($sectionId, $name);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>
<div class="ml-72 p-6">
    <div class="flex flex-row justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-accent mb-4">Data Jenis Buku</h1>
        <button class="bg-primary hover:bg-secondary text-white font-bold py-2 px-4 rounded" onclick="toggleModal()">Tambah Jenis Buku</button>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Nama Jenis</th>
                    <th scope="col" class="px-6 py-3">Total Buku</th>
                    <th scope="col" class="px-6 py-3">Ditambahkan Pada</th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sections as $index => $section): ?>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <?php echo $index + 1; ?>
                        </th>
                        <td class="px-6 py-4">
                            <?php echo $section['name']; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $section['countBook']; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo formatDate($section['createdAt']); ?>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex">
                                <form action="" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    <input type="hidden" name="delete" value="<?php echo $section['sectionId']; ?>">
                                    <button type="submit" class="text-red-500 hover:underline ml-2">Hapus</button>
                                </form>
                                <button onclick="openEditModal('<?php echo $section['sectionId']; ?>', '<?php echo $section['name']; ?>')" class="text-blue-500 hover:underline ml-2">Edit</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-1/3">
        <h2 class="text-xl font-bold mb-4">Tambah Jenis Buku</h2>
        <form action="" method="POST">
            <input type="text" name="name" placeholder="Nama Jenis Buku" class="w-full p-2 border border-gray-300 rounded mb-4" required>
            <div class="flex justify-end">
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2" onclick="toggleModal()">Batal</button>
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-1/3">
        <h2 class="text-xl font-bold mb-4">Edit Jenis Buku</h2>
        <form action="" method="POST">
            <input type="hidden" name="edit" id="editSectionId">
            <input type="text" name="name" id="editSectionName" placeholder="Nama Jenis Buku" class="w-full p-2 border border-gray-300 rounded mb-4" required>
            <div class="flex justify-end">
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2" onclick="toggleEditModal()">Batal</button>
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script src="./src/script/section.js">    
</script>

<?php include 'layout/endDashboard.php'; ?>