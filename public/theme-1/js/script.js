document.querySelectorAll('.checklsit-input').forEach(input => {
  input.addEventListener('change', function () {
    // Remove the 'active' class from all .single-checklist elements
    document.querySelectorAll('.single-checklist').forEach(item => item.classList.remove('active'));

    // Add the 'active' class to the parent .single-checklist of the checked input
    if (this.checked) {
      this.closest('.single-checklist').classList.add('active');
    }
  });
});
