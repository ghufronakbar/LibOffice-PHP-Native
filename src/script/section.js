function toggleModal() {
    const modal = document.getElementById('modal');
    modal.classList.toggle('hidden');
}

function toggleEditModal() {
    const editModal = document.getElementById('editModal');
    editModal.classList.toggle('hidden');
}

function openEditModal(sectionId, sectionName) {
    document.getElementById('editSectionId').value = sectionId;
    document.getElementById('editSectionName').value = sectionName;
    toggleEditModal();
}