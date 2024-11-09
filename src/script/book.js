function toggleAddBookModal() {
    const modal = document.getElementById('addBookModal');
    modal.classList.toggle('hidden');
}

function toggleEditBookModal() {
    const editModal = document.getElementById('editBookModal');
    editModal.classList.toggle('hidden');
}

function openEditBookModal(bookId, title, synopsis, sectionId, author, publishedAt) {
    document.getElementById('editBookId').value = bookId;
    document.getElementById('editBookTitle').value = title;
    document.getElementById('editBookSynopsis').value = synopsis;
    document.getElementById('editBookAuthor').value = author;
    document.getElementById('editBookPublishedAt').value = publishedAt;

    document.querySelectorAll('.editSectionId').forEach((radio) => {
        radio.checked = radio.value === sectionId;
    });

    toggleEditBookModal();
}s